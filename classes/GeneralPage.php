<?php
    class GeneralPage
    {
        public $config;
        public $template;
        public $title;
        public $header_content;
        public $main_content;
        public $sidebar_content;
        public $footer_content;
        public $vars;
        
        public function __construct(
                $config             = "config.php",
                $template           = "templates/pages/general_page.php",
                $title              = "E2E4 TEST ASSIGNMENT",
                $header_content     = null,
                $main_content       = null,
                $sidebar_content    = null,
                $footer_content     = null) 
        {
            $this->config           = $config;
            $this->template         = $template;
            $this->title            = $title;
            $this->header_content   = $header_content;
            $this->main_content     = $main_content;
            $this->sidebar_content  = $sidebar_content;
            $this->footer_content   = $footer_content;
            $this->vars             = array();
        }
        
        public function AddElement($template)
        {
            $path = "templates/elements/" . $template . ".php";
            $this->LoadFile($path);
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

