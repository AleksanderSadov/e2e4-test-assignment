<?php
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    // display title and header
    $title = "E2E4 TEST";
    $header_content = "<p>Всего сообщений: " . CountMessages() . "</p>";
    
    // display messages
    $messages = GetMessages(0, true, true, false);
    $main_content = "<div>" . DisplayMessages($messages, true, true, false) . "</div>";
    
    require_once (ROOT_DIR . "templates/pages/main_page.php");
?>
