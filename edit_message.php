<?php
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    // display title
    $title = "Создание сообщения";
    
    $message_id = filter_input(INPUT_GET, "edited_message", 
            FILTER_SANITIZE_NUMBER_INT);
    $messages = GetMessages($message_id, true, true, true);
    
    // variables for template
    $formhandler = ROOT_URL . "formhandler_edit.php";
    $input_fieldset_legend = "Редактирование сообщения";
    $submit_legend = "Редактировать сообщение";
    require_once (ROOT_DIR . "templates/pages/editor_page.php");
?>