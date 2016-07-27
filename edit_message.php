<?php
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    // display title
    $title = "Создание сообщения";
    
    // variables for template
    $input_fieldset_legend = "Редактирование сообщения";
    $input_header_legend = "Введите заголовок";
    $input_brief_legend = "Введите краткое содеражние";
    $input_text_legend = "Введите основной текст";
    $submit_legend = "Редактировать сообщение";
    require_once (ROOT_DIR . "templates/pages/editor_page.php");
?>