<?php
    require_once ("config.php");
    require_once (ROOT_DIR . "/models/messages.php");
    require_once (ROOT_DIR . "/controllers/messages_controller.php");
    
    // get id of selected message
    $message_id = filter_input(INPUT_POST, "hidden_input_id_message", 
            FILTER_SANITIZE_NUMBER_INT);
    $message = GetWholeMessage($message_id);
    // display title and header
    $title = $message->header;
    $header_content = "<p>" . $message->header . "</p>";
    
    // display message content
    $main_content = DisplayWholeMessage($message);
    
    require_once (ROOT_DIR . "/templates/message_page.php");
?>

