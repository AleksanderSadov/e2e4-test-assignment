<?php
    // Автозагрузка классов
    function my_autoloader($class_name)
    {
        // Директории поиска классов
        $directories = [
            'core/controller/',
            'core/model/database/',
            'core/model/entity/',
            'core/model/table/',
            'core/view/',
            
            'app/controller/',
            'app/model/database/',
            'app/model/entity/',
            'app/model/table/',
            'app/view/',
        ];
       
        try {
            foreach($directories as $directory)
            {
                $path = $directory . $class_name . ".php";
                if(file_exists($path))
                {
                    require_once($path);
                    // Если класс найден прекращаем поиск
                    return;
                }
            }
            $message = "Не удалось загрузить класс: {$class_name}" . PHP_EOL . 
                    "Путь к файлу: {$path}" . PHP_EOL;
            throw new Exception($message);
        } catch (Exception $ex) {
            echo "<pre>{$ex}</pre>";
            exit;
        }
    }
    spl_autoload_register("my_autoloader");
    
    require "app/public/index.php";

