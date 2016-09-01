<?php
    // Автозагрузка классов
    function my_autoloader($class_name)
    {
        // Директории поиска классов
        $directories = array(
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
        );
       
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
    }
    spl_autoload_register("my_autoloader");
    
    require "app/public/index.php";

