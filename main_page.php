<?php
    $this->setMain_template("main_page");
    $this->title = "E2E4 TEST ASSIGNMENT";
    
    $message_data = new ObjectData("messages", "Message");
    $message_count = $message_data->Count();
    $this->templates["main_section_header"]["content"] = "Всего сообщений: " . 
            $message_count;
    
    $this->templates["add_button"]["content"]   = "Добавить <br /> сообщение";
    $this->templates["add_button"]["method"]    = "GET";
    $this->templates["add_button"]["action"]    = "index.php";
    $this->templates["add_button"]["name"]      = "navigation";
    $this->templates["add_button"]["value"]     = "add_message";
    
    $all_messages = $message_data->Select("id, header, brief", null, "id", "DESC");
    $this->requests["all_messages"] = $all_messages;
?>

