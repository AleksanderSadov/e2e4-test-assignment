<?php
    abstract class View
    {
        public $main_template;
        public $title;
        public $templates = [];
        
        protected function __construct() 
        {
            
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
    }
?>

