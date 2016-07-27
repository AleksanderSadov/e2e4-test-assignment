<?php
    require_once ("config.php");
    require_once (ROOT_DIR . "/models/messages.php");
    require_once (ROOT_DIR . "/controllers/messages_controller.php");
    
    $message_id = filter_input(INPUT_GET, "selected_message", 
            FILTER_SANITIZE_NUMBER_INT);
    
    $messages = GetMessages($message_id, true, false, true);
    $title = $messages[0]->header;
    $main_content = "<div>" . DisplayMessages($messages, true, false, true) . "</div>";
    
    require_once (ROOT_DIR . "/templates/pages/whole_page.php");
?>

