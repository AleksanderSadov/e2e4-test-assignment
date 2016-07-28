<?php
    class FormHandler
    {
        public function AddMessage()
        {
            $message_data = new MessageData();
    
            $header = filter_input(INPUT_POST, "input_header", 
                    FILTER_SANITIZE_STRING);
            $brief = filter_input(INPUT_POST, "input_brief", 
                    FILTER_SANITIZE_STRING);
            $text = filter_input(INPUT_POST, "input_text", 
                    FILTER_SANITIZE_STRING);
            $message_data->InsertMessages(
                    array("header", "brief", "text"),
                    array($header, $brief, $text));
            
            header("Location: index.php");
        }
    }
?>
