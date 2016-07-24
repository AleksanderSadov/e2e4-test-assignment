<?php
    $app_root_path = getenv('APP_ROOT_PATH');
    $title = "Title";
    $messages_count = 0;
    $headerContent = "<p>Всего сообщений: " . $messages_count . "</p>";
    
    include ($app_root_path . "models/credentials.php");
    $sqli = new mysqli($host, $user, $password, $database);
    if ($sqli->connect_error)
    {
        $mainContent = "Connection error: " . $sqli->connect_error;
    }
    else
    {
        $mainContent = "Connection established";
    }
    
    require_once ($app_root_path . "templates/template.php");
?>
