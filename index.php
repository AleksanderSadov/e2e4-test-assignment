<?php
    require_once ("config.php");
    //require_once(ROOT_DIR . "models/messages.php");
    //require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    function my_autoloader($class)
    {
        include ROOT_DIR . "/classes/" . $class . ".php";
    }
    spl_autoload_register("my_autoloader");
    
    $message_data = new MessageData();
    var_dump($message_data->SelectMessages(array ("*")));
    /*$header_content = "<p>Всего сообщений: " . $message_data->CountMessages() . "</p>";
    
    $messages = GetMessages(0, true, true, false);
    $main_content = "<div>" . DisplayMessages($messages, true, true, false) . "</div>";
    
    require_once (ROOT_DIR . "templates/pages/main_page.php");*/
?>
