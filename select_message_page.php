<?php
    $this->setMain_template("select_message_page");
    $this->title = "E2E4 TEST ASSIGNMENT";
    
    $message_data = new ObjectData("messages", "Message");
    $id = $this->forms['select_message']['id'];
    $message = $message_data->Select("id, header, text",
            "id='" . $id . "'");
    
    $this->templates["add_button"]["content"]   = "Добавить <br /> сообщение";
    $this->templates["add_button"]["method"]    = "GET";
    $this->templates["add_button"]["action"]    = "index.php";
    $this->templates["add_button"]["name"]      = "navigation";
    $this->templates["add_button"]["value"]     = "add_message";
    
    $all_messages = $message_data->Select("id, header, text", "id='" . $id . "'");
    $this->requests["selected_message"] = $all_messages;
?>

