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
        }
        
        public function DeleteMessage()
        {
            $message_data = new MessageData();
            
            $message_id = filter_input(INPUT_POST, "delete_message", 
                FILTER_SANITIZE_NUMBER_INT);
            $message_data->DeleteMessages("id", $message_id);
        }
        
        public function EditMessage()
        {
            $message_data = new MessageData();
    
            $header = filter_input(INPUT_POST, "input_header", 
                    FILTER_SANITIZE_STRING);
            $brief = filter_input(INPUT_POST, "input_brief", 
                    FILTER_SANITIZE_STRING);
            $text = filter_input(INPUT_POST, "input_text", 
                    FILTER_SANITIZE_STRING);
            $id = filter_input(INPUT_POST, "edit_message", 
                FILTER_SANITIZE_NUMBER_INT);
            $message_data->UpdateMessages(
                    array("header" => $header, "brief" => $brief, "text" => $text),
                    array("id='" . $id . "'"));
        }
        
        public function CheckPOST()
        {
            if($_SERVER['REQUEST_METHOD'] == "POST")  
            {
                if (isset($_POST["delete_message"]))
                {
                    $this->DeleteMessage();
                }
                if (isset($_POST["add_message"]))
                {
                    $this->AddMessage();
                }
                if (isset($_POST["edit_message"]))
                {
                    $this->EditMessage();
                }
            }
        }
    }
?>
