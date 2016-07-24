<?php
    $app_root_path = getenv('APP_ROOT_PATH');
    require_once ($app_root_path . "models/messages.php");
    
    // display title and header
    $title = "Messages";
    $headerContent = "<p>Всего сообщений: " . CountMessages() . "</p>";
    
    // display messages
    $messages = GetAllMessages();
    foreach ($messages as $message)
    {
        $header = "<h2 class='message_header'>" . $message->header . "</h2>";
        $brief = "<div class='message_brief'>" . $message->brief . "</div>";
        //$content = "<div class='message_content'>" . $message->content . "</div>";
        $mainContent .= "<div class='message'>" . $header . $brief . "</div>";
    }
    
    require_once ($app_root_path . "templates/template.php");
?>
