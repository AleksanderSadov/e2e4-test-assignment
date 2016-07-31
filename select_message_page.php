<?php
    $this->setMain_template("select_message_page");
    $this->title = "E2E4 TEST ASSIGNMENT";
    
    $message_data = new ObjectData("messages", "Message");
    $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
    
    $this->templates["edit_button"]["message_id"] = $id;
    $this->templates["delete_button"]["message_id"] = $id;
    
    $messages = $message_data->Select("id, header, text", "id='" . $id . "'");
    $selected_message = $messages[0];
    $this->requests["selected_message"] = $selected_message;
?>

