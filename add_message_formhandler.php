<?php
    require_once ("config.php");
    require_once (ROOT_DIR . "/models/messages.php");
    require_once (ROOT_DIR . "/controllers/messages_controller.php");
    
    $message = new Message();
    $message->header = filter_input(INPUT_GET, "input_header", 
            FILTER_SANITIZE_STRING);
    $message->brief = filter_input(INPUT_GET, "input_brief", 
            FILTER_SANITIZE_STRING);
    $message->text = filter_input(INPUT_GET, "input_text", 
            FILTER_SANITIZE_STRING);
    
    echo "Заголовок: " . $message->header . "<br />";
    echo "Краткое содержание: " . $message->brief . "<br />";
    echo "Текст: " . $message->text . "<br />";
?>

