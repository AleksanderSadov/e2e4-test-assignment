<?php
    require_once "config.php";
    
    function my_autoloader($class)
    {
        include ROOT_DIR . "/classes/" . $class . ".php";
    }
    spl_autoload_register("my_autoloader");
    
    $page = new GeneralPage();
    $message_data = new MessageData();
    $messages = $message_data->SelectMessages(array("id, header", "brief"));
    
    $page->vars["main_section_header"] = "Всего сообщений: " .
            $message_data->CountMessages();
    
    $page->Render();
?>
