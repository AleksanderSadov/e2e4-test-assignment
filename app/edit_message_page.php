<?php 
    $this->main_template = "editor_page";
    $this->title = "E2E4 TEST ASSIGNMENT";
    
    $message_data = new MessagesTable();
    $id = filter_input(INPUT_GET, "id", 
        FILTER_SANITIZE_NUMBER_INT);
    $messages = $message_data->Select(
            "id, header, brief, text",
            "id='" . $id . "'");
    $selected_message = $messages[0];
    
    $this->templates['main_section_header']['content'] = "Редактор сообщений";
    
    $this->templates['editor']['legend'] = "Редактирование сообщения";
    $this->templates['editor']['header'] = $selected_message->header;
    $this->templates['editor']['brief'] = $selected_message->brief;
    $this->templates['editor']['text'] = $selected_message->text;
    $this->templates['editor']['submit_name'] = "edit_message";
    $this->templates['editor']['submit_legend'] = "Редактировать сообщение";
    $this->templates['editor']['submit_value'] = $selected_message->id;
?>