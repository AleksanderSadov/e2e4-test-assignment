<?php
    // Загрузка конфига
    if (file_exists("app/config.php"))
    {
        require_once ("app/config.php");
    }
    else
    {
        die ("Не удалось загрузисть конфиг файл");
    }
    
    // Автозагрузка классов
    function my_autoloader($class_name)
    {
        // Директории поиска классов
        $directories = array(
            '../core/controller/',
            '../core/model/database/',
            '../core/model/entity/',
            '../core/model/table/',
            '../core/utility/',
            '../core/view/',
            
            'controller/',
            'model/database/',
            'model/entity/',
            'model/table/',
            'view/',
        );
       
        foreach($directories as $directory)
        {
            $path = ROOT_DIR . $directory . $class_name . ".php";
            if(file_exists($path))
            {
                require_once($path);
                // Если класс найден прекращаем поиск
                return;
            }
        }
    }
    spl_autoload_register("my_autoloader");
    
    // Определение url запроса
    $controller_front = new FrontController("MessagesController", "Index");
    $controller_front->Dispatch();

