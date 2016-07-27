<?php
    ob_start();
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    // get id of selected message
    $message = new Message();
    $message->id = filter_input(INPUT_POST, "message_id", 
            FILTER_SANITIZE_NUMBER_INT);
    $message->header = filter_input(INPUT_POST, "input_header", 
            FILTER_SANITIZE_STRING);
    $message->brief = filter_input(INPUT_POST, "input_brief", 
            FILTER_SANITIZE_STRING);
    $message->text = filter_input(INPUT_POST, "input_text", 
            FILTER_SANITIZE_STRING);
    EditMessage($message);
    
    while(@ob_end_clean());
    header("Location: " . ROOT_URL . "index.php");
?>
