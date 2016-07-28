<?php
    $message_data = new MessageData();
    $this->vars["hidden_form"] = true;
    $this->vars["main_section_header"] = "Всего сообщений: " . 
            $message_data->CountMessages();
    $messages = $message_data->SelectMessages(array("id, header", "brief"));
    foreach ($messages as $message)
    {
       $this->main_content .= $message_data->ConstructHtml($message); 
    }
?>

