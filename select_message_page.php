<?php
    $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
    
    $message_data = new MessageData();
    $messages = $message_data->SelectMessages(
            array("id", "brief", "text"),
            array("id"=>$id));
    $message = $messages[0];
    $this->vars["main_section_header"] = $message->header;
    $this->main_content .= $message_data->ConstructHtml($message); 
?>

