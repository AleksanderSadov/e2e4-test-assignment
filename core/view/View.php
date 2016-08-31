<?php
    abstract class View
    {
        public $main_template;
        public $title;
        public $vars = [];
        
        protected function __construct() 
        {
            
        }
        
        /**
         * Загрузка шаблона
         * 
         * @param string $template название шаблона
         */
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
        
        /**
         * Загрузка файла layout.php
         */
        public function Render()
        {
            $layout_path = ROOT_DIR . "templates/layout.php";
            require_once($layout_path);
        }
        
        /**
         * Загрузка отображения, соответствующего экшену контроллера
         */
        public function LoadContent()
        {
            $content_view_path = ROOT_DIR . "templates/" . $this->main_template . ".php";
            require_once($content_view_path);
        }
        
        /**
         * Загрузка файла стилей
         * 
         * @param string $stylesheet название файла стилей [optional]
         */
        public function LoadStylesheet($stylesheet = "main")
        {
            $html = "<link type='text/css' rel='stylesheet'
                href='" . ROOT_URL . "styles/" . $stylesheet . ".css' />";
            echo $html;
        }
        
        /**
         * Загрузка файла скрипта
         * 
         * @param string $script название файла скриптов
         */
        public function LoadScript($script = "main")
        {
            $html = "<script src='" . ROOT_URL . "scripts/" . 
                    $script . ".js'></script>";
            echo $html;
        }
    }

