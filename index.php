<?php
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    $message_data = new MessageData();
    $title = "E2E4 TEST";
    var_dump($message_data->GetMessages(array("header", "brief", "id"),
            array("id='2'")));
    /*$header_content = "<p>Всего сообщений: " .
            $message_data->database->CountRows($message_data->table_name) . "</p>";
    
    $messages = GetMessages(0, true, true, false);
    $main_content = "<div>" . DisplayMessages($messages, true, true, false) . "</div>";
    
    require_once (ROOT_DIR . "templates/pages/main_page.php");*/
?>
