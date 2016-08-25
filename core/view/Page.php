<?php
    abstract class Page
    {
        public $main_template;
        public $title;
        public $templates;
        public $requests;
        
        public function __construct() 
        {
            $this->templates        = array();
            $this->requests         = array();
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
            if (file_exists($path))
            {
                require ($path);
            }
            else
            {
                die("Не удалось загрузить элемент: " . $path);
            }
        }
        
        public function Render()
        {
            $layout_path = ROOT_DIR . "templates/layout.php";
            require_once($layout_path);
        }
        
        public function LoadContent()
        {
            $content_view_path = ROOT_DIR . "templates/" . $this->main_template . ".php";
            require_once($content_view_path);
        }
        
        public function LoadStylesheet($stylesheet = "main")
        {
            $html = "<link type='text/css' rel='stylesheet'
                href='" . ROOT_URL . "styles/" . $stylesheet . ".css' />";
            echo $html;
        }
        
        public function LoadScript($script = "main")
        {
            $html = "<script src='" . ROOT_URL . "scripts/" . 
                    $script . ".js'></script>";
            echo $html;
        }
        
        public function LoadPage($path)
        {
            if (file_exists($path))
            {
                require_once ($path);
            }
            else
            {
                die ("Не удалось перейти на страницу: " . $path);
            }
        }
    }
?>

