<?php
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    // display title and header
    $title = "Messages";
    $headerContent = "<p>Всего сообщений: " . CountMessages() . "</p>";
    
    // display messages
    $messages = GetAllMessages();
    $mainContent = "<div>" . DisplayMessages($messages) . "</div>";
    
    require_once (ROOT_DIR . "templates/main_page.php");
?>
