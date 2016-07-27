<?php
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    $title = "Создание сообщения";
    
    // variables for template
    $formhandler = ROOT_URL . "formhandler_add.php";
    $input_fieldset_legend = "Добавление сообщения";
    $submit_legend = "Добавить сообщение";
    require_once (ROOT_DIR . "templates/pages/editor_page.php");
?>
