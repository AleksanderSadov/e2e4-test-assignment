<?php
    $this->setMain_template("main_page");
    $this->title = "E2E4 TEST ASSIGNMENT";
    $message_data = new ObjectData("messages", "Message");
    
    $this->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
    
    $message_count = $message_data->Count();
    $this->templates["main_section_header"]["content"] = "Всего сообщений: " . 
            $message_count;
    
    $all_messages = $message_data->Select("id, header, brief", null, "id", "DESC");
    $this->requests["all_messages"] = $all_messages;
?>

