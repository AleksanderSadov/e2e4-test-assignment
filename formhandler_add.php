<?php
    ob_start();
    require_once ("config.php");
    require_once (ROOT_DIR . "/models/messages.php");
    require_once (ROOT_DIR . "/controllers/messages_controller.php");
    
    $message = new Message();
    $message->header = filter_input(INPUT_POST, "input_header", 
            FILTER_SANITIZE_STRING);
    $message->brief = filter_input(INPUT_POST, "input_brief", 
            FILTER_SANITIZE_STRING);
    $message->text = filter_input(INPUT_POST, "input_text", 
            FILTER_SANITIZE_STRING);
    InsertMessage($message);
    
    while(@ob_end_clean());
    
    header("Location: " . ROOT_URL . "index.php");
?>

