<?php
    class GeneralPage
    {
        public $config;
        public $template;
        public $title;
        public $header_content;
        public $footer_content;
        public $vars;
        
        public function __construct(
                $config             = "config.php",
                $template           = "templates/pages/main_page.php",
                $title              = "E2E4 TEST ASSIGNMENT",
                $header_content     = null,
                $footer_content     = null) 
        {
            $this->config           = $config;
            $this->template         = $template;
            $this->title            = $title;
            $this->header_content   = $header_content;
            $this->footer_content   = $footer_content;
            $this->vars             = array();
        }
        
        public function RequestItem($request)
        {
            if (isset($this->vars[$request]) && !empty($this->vars[$request]))
            {
                $element = $this->vars[$request];
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
        }
        
        protected function AddObjectElement($element)
        {
            $object_name = strtolower(get_class($element));
            if (file_exists(ROOT_DIR . "templates/elements/" . $object_name . ".php"))
            {
                $this->vars[$object_name] = $element;
                $this->AddTemplate($object_name);
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
        
        public function AddTemplate($template)
        {
            $path = ROOT_DIR . "templates/elements/" . $template . ".php";
            if (!$this->LoadFile($path))
            {
                die("Не удалось загрузить элемент: " . $template);
            }
        }
        
        public function Render()
        {
            $this->LoadFile($this->template);
        }
        
        public function LoadStylesheet($stylesheet = "main")
        {
            $html = "<link type='text/css' rel='stylesheet'
                href='styles/" . $stylesheet . ".css' />";
            echo $html;
        }
        
        public function LoadScript($script = "main_page")
        {
            $html = "<script src='scripts/" . $script . ".js'></script>";
            echo $html;
        }
        
        public function NavigateToNewPage($page_name)
        {
            $file_path = ROOT_DIR . $page_name . ".php";
            file_exists($file_path) ?
                require_once ($file_path) :
                die("Данной страницы не существует: " . $page_name);
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

