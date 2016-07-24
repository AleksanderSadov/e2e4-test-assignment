<?php
    $app_root_path = getenv('APP_ROOT_PATH');
    require_once ($app_root_path . "models/messages.php");
    require_once ($app_root_path . "controllers/messages_controller.php");
    
    // display title and header
    $title = "Messages";
    $headerContent = "<p>Всего сообщений: " . CountMessages() . "</p>";
    
    // display messages
    $messages = GetAllMessages();
    $mainContent = "<div>" . DisplayMessages($messages) . "</div>";
    
    require_once ($app_root_path . "templates/template.php");
?>
