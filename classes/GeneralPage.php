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
                $template           = "templates/pages/general_page.php",
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
        
        public function AddRequestedElement($request)
        {
            isset($this->vars[$request]) ? 
                $element = $this->vars[$request] :
                die("Элемента по данному запросу не существует: " . $request);
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
            }
        }
        
        protected function AddObjectElement($element)
        {
            $object_name = strtolower(get_class($element));
            if (file_exists(ROOT_DIR . "templates/elements/" . $object_name . ".php"))
            {
                $this->vars[$object_name] = $element;
                $this->AddElement($object_name);
            }
            else
            {
                var_dump($object_name);
                die("Отображение данного элемента не реализовано");
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
        
        public function AddAllElements($object_name)
        {
            if (isset($this->vars[$object_name])) 
            {
                $objects = $this->vars[$object_name . "s"];
                foreach ($objects as $object)
                {
                    $this->vars[$object_name] = $object;
                    $this->AddElement(($object_name));
                }
            }
            else
            {
                die("Данные элементы недоступны: " . $object_name);
            }
        }
        
        public function AddElement($template)
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
        
        public function LoadStylesheet($stylesheet = "main.css")
        {
            $html = "<link type='text/css' rel='stylesheet'
                href='styles/" . $stylesheet . "' />";
            echo $html;
        }
        
        public function LoadScript($script = "main.js")
        {
            $html = "<script src='scripts/" . $script . "'></script>";
            echo $html;
        }
        
        public function NavigateToNewPage($page_name)
        {
            $file_path = ROOT_DIR . $page_name . ".php";
            file_exists($file_path) ?
                require_once ($file_path) :
                require_once (ROOT_DIR . "page_not_found.php"); 
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

