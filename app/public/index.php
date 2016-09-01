<?php
    // Загрузка конфига
    if (file_exists("app/config/config.php"))
    {
        include_once ("app/config/config.php");
    }
    else
    {
        die ("Не удалось загрузисть конфиг файл");
    }
    
    // Определение url запроса
    $controller_front = new FrontController("MessagesController", "Index");
    $controller_front->dispatch();

