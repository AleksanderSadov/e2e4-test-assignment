<?php
    ob_start();
    require_once ("config.php");
    require_once (ROOT_DIR . "/models/messages.php");
    require_once (ROOT_DIR . "/controllers/messages_controller.php");
    
    $message_id = filter_input(INPUT_GET, "deleted_message", 
            FILTER_SANITIZE_NUMBER_INT);
    DeleteMessage($message_id);
    while(@ob_end_clean());
    
    header("Location: " . ROOT_URL . "index.php"); 
?>

