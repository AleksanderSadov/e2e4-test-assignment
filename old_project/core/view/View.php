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
        final public function loadTemplate($template)
        {
            try {
                $path = ROOT_DIR . "templates/elements/" . $template . ".php";
                if (file_exists($path)) {
                    include($path);
                } else {
                    $message = "Не удалось загрузить шаблон элемента: {$template}" . PHP_EOL .
                            "Путь к файлу: {$path}" . PHP_EOL;
                    throw new Exception($message);
                }
            } catch (Exception $ex) {
                echo "<pre>{$ex}</pre>";
                exit;
            }
        }
        
        /**
         * Загрузка файла layout.php
         */
        final public function render()
        {
            try {
                $path = ROOT_DIR . "templates/layout.php";
                if (file_exists($path)) {
                    include_once($path);
                } else {
                    $message = "Не удалось загрузить шаблон страницы" . PHP_EOL .
                            "Путь к файлу: {$path}" . PHP_EOL;
                    throw new Exception($message);
                }
            } catch (Exception $ex) {
                echo "<pre>{$ex}</pre>";
                exit;
            }
        }
        
        /**
         * Загрузка отображения, соответствующего экшену контроллера
         */
        final public function loadContent()
        {
            try {
                $path = ROOT_DIR . "templates/" . $this->main_template . ".php";
                if (file_exists($path)) {
                    include_once($path);
                } else {
                    $message = "Не удалось загрузить контент страницы: {$this->main_template}" . PHP_EOL .
                            "Путь к файлу: {$path}" . PHP_EOL;
                    throw new Exception($message);
                }
            } catch (Exception $ex) {
                echo "<pre>{$ex}</pre>";
                exit;
            }            
        }
        
        /**
         * Загрузка файла стилей
         * 
         * @param string $stylesheet название файла стилей [optional]
         */
        final public function loadStylesheet($stylesheet = "main")
        {
            try {
                $path = ROOT_DIR . "public/styles/main.css";
                if (file_exists($path)) {
                    $html = "<link type='text/css' rel='stylesheet'
                        href='" . ROOT_URL . "styles/" . $stylesheet . ".css' />";
                    echo $html;
                } else {
                    $message = "Не удалось загрузить css стили" . PHP_EOL .
                            "Путь к файлу: {$path}" . PHP_EOL;
                    throw new Exception($message);
                }
            } catch (Exception $ex) {
                echo "<pre>{$ex}</pre>";
                exit;
            }            
        }
        
        /**
         * Загрузка файла скрипта
         * 
         * @param string $script название файла скриптов
         */
        final public function loadScript($script = "main")
        {
            try {
                $path = ROOT_DIR . "public/scripts/main.js";
                if (file_exists($path)) {
                    $html = "<script src='" . ROOT_URL . "scripts/" . 
                        $script . ".js'></script>";
                    echo $html;
                } else {
                    $message = "Не удалось загрузить js скрипты" . PHP_EOL .
                            "Путь к файлу: {$path}" . PHP_EOL;
                    throw new Exception($message);
                }
            } catch (Exception $ex) {
                echo "<pre>{$ex}</pre>";
                exit;
            }    
        }
    }

