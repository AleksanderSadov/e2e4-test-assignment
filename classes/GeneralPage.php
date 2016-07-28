<?php
    class GeneralPage
    {
        public $config;
        public $template;
        public $title;
        public $header_section;
        public $main_content;
        public $content_section;
        public $sidebar_right;
        public $footer;
        
        public function __construct(
                $config             = "config.php",
                $template           = "templates/pages/general_page.php",
                $title              = "E2E4 TEST ASSIGNMENT",
                $header_content     = "templates/header_content.php",
                $main_content       = "templates/main_content.php",
                $sidebar_content    = "templates/sidebar_right.php",
                $footer_content     = "templates/footer_section.php") 
        {
            $this->config           = $config;
            $this->template         = $template;
            $this->title            = $title;
             $this->header_content   = $header_content;
            $this->main_content     = $main_content;
            $this->sidebar_content  = $sidebar_content;
            $this->footer_content   = $footer_content;
        }
        
        public function AddElement($template_path)
        {
            $this->LoadFile($template_path);
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
        
        protected function LoadFile($file_path)
        {
            if (file_exists($file_path) )
            {
                include $file_path;
            } 
            else 
            {
            throw new Exception(
                    'no file at' . 
                    $file_path);
            }
        }
    }
?>

