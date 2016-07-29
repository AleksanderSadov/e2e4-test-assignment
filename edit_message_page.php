<?php 
    $this->template = ROOT_DIR . "templates/pages/editor_page.php";
    $this->vars["main_section_header"] = "Редактор сообщений";
    $this->vars["editor_legend"] = "Редактирование сообщения";
    $this->vars["editor_submit_legend"] = "Редактировать сообщение";
    $this->vars["editor_submit_name"] = "edit_message";
    
    $id = filter_input(INPUT_GET, "id", 
        FILTER_SANITIZE_NUMBER_INT);
    $messageData = new MessageData();
    $message = $messageData->SelectMessages(
            array("id", "header", "brief", "text"),
            array("id='" . $id . "'"));
    $this->vars["editor_header"] = $message[0]->header;
    $this->vars["editor_brief"] = $message[0]->brief;
    $this->vars["editor_text"] = $message[0]->text;
    $this->vars["editor_submit_value"] = $message[0]->id;
?>