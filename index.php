<?php
    require_once "config.php";
    
    function my_autoloader($class)
    {
        include ROOT_DIR . "/classes/" . $class . ".php";
    }
    spl_autoload_register("my_autoloader");
    
    $page = new GeneralPage();
    $message_data = new MessageData();
    
    $page->Render();
?>
