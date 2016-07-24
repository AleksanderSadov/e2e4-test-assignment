<?php
    define("ROOT", __DIR__);
    define("APP_ROOT", __DIR__);
    require_once (ROOT . "/models/messages.php");
    require_once (ROOT . "/controllers/messages_controller.php");
    
    // display title and header
    $title = "Messages";
    $headerContent = "<p>Всего сообщений: " . CountMessages() . "</p>";
    
    // display messages
    $messages = GetAllMessages();
    $mainContent = "<div>" . DisplayMessages($messages) . "</div>";
    
    require_once (ROOT . "/templates/main_page.php");
?>
