<?php
    class Page
    {
        public $config;
        public $main_template;
        public $title;
        public $templates;
        public $requests;
        public $forms;
        
        public function __construct(
                $config             = "config.php",
                $template           = "main_page",
                $title              = "E2E4 TEST ASSIGNMENT") 
        {
            $this->config           = $config;
            $this->LoadFile($config);
            $this->SetMain_template($template);
            $this->title            = $title;
            $this->templates        = array();
            $this->requests         = array();
            $this->forms            = array();
        }
        
        function SetMain_template($main_template) {
            $this->main_template = ROOT_DIR . "templates/pages/" . $main_template . ".php";
        }

                
        public function RequestItem($request)
        {
            if (isset($this->requests[$request]) && !empty($this->requests[$request]))
            {
                $element = $this->requests[$request];
                switch(gettype($element))
                {
                    case "array":
                        $this->AddArrayOfElements($element);
                        break;
                    case "object":
                        $this->AddObjectElement($element);
                        break;
                    case "boolean":
                    case "integer":
                    case "string":
                        echo $element;
                        break;
                    case "NULL":
                        die("Ошибка запроса RequestItem");
                        break; 
                }
            }
            else
            {
                echo "Данные ещё не добавлены";
            }
        }
        
        protected function AddObjectElement($element)
        {
            $object_name = strtolower(get_class($element));
            if (file_exists(ROOT_DIR . "templates/elements/" . $object_name . ".php"))
            {
                foreach ($element as $property => $value)
                {
                    $this->templates[$object_name][$property] = $value;
                }
                $this->LoadTemplate($object_name);
            }
            else
            {
                die("Отображение данного элемента не реализовано: " . $object_name);
            }
        }
        
        protected function AddArrayOfElements(array $element)
        {
            if (is_object($element[0]))
            {
                foreach($element as $object)
                {
                    $this->AddObjectElement($object);
                }
            }
            else
            {
                foreach($element as $object)
                {
                    echo $object;
                }
            }
        }
        
        public function LoadTemplate($template)
        {
            $path = ROOT_DIR . "templates/elements/" . $template . ".php";
            if (!$this->LoadFile($path))
            {
                die("Не удалось загрузить элемент: " . $template);
            }
        }
        
        public function Render()
        {
            $this->LoadFile($this->main_template);
        }
        
        public function LoadStylesheet($stylesheet = "main")
        {
            $html = "<link type='text/css' rel='stylesheet'
                href='styles/" . $stylesheet . ".css' />";
            echo $html;
        }
        
        public function LoadScript($script = "main_page")
        {
            $html = "<script src='" . ROOT_URL . "scripts/" . 
                    $script . ".js'></script>";
            echo $html;
        }
        
        public function GoToNewPage($page_name)
        {
            $path = ROOT_DIR . $page_name . "_page.php";
            file_exists($path) ?
                require_once ($path) :
                die("Данной страницы не существует: " . $path);
        }
        
        protected function LoadFile($file_path)
        {
            if (file_exists($file_path) )
            {
                include $file_path;
                return true;
            } 
            else 
            {
                die("Файл недоступен: " . $file_path);
                return false;
            }
        }
    }
?>

