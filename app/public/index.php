<?php
    // Загрузка конфига
    try {
        $config_path = "app/config/config.php";
        if (file_exists($config_path)) {
            include_once($config_path);
        } else {
            $message = "Не удалось загрузить config.php" . PHP_EOL .
                        "Путь к файлу: {$config_path}" . PHP_EOL;
            throw new Exception($message);
        }
    } catch (Exception $ex) {
        echo "<pre>$ex</pre>";
    }
    
    // Определение url запроса
    $controller_front = new FrontController("MessagesController", "Index");
    $controller_front->dispatch();

