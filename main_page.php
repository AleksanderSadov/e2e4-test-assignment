<?php
    $message_data = new MessageData();
    $this->vars["header"] = "E2E4 TEST ASSIGNMENT";
    $this->vars["main_section_header"] = "Всего сообщений: " . 
            $message_data->CountMessages();
    $this->vars["all_messages"] = $message_data->SelectMessages(
            array("id, header", "brief"));
?>

