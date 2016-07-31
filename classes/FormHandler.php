<?php
    class FormHandler
    {
        private $page_forms_buffer;
        
        public function __construct(& $page_forms_buffer)
        {
            $this->page_forms_buffer = &$page_forms_buffer;
        }
        
        public function CheckServerPost()
        {
            $form_names = array(
                "delete_message",
                "add_message",
                "edit_message",
                "post_comment",
                "select_message");
            
            foreach ($form_names as $action)
            {
                if ($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    if (isset($_POST[$action]))
                    {
                        $this->$action();
                    }
                }
                if ($_SERVER['REQUEST_METHOD'] == "GET")
                {
                    if (isset($_GET[$action]))
                    {
                        $this->$action();
                    }  
                }
            }
        }
        
        private function add_message()
        {
            $message_data = new ObjectData("messages", "Message");
    
            $header = filter_input(INPUT_POST, "input_header", 
                    FILTER_SANITIZE_STRING);
            $brief = filter_input(INPUT_POST, "input_brief", 
                    FILTER_SANITIZE_STRING);
            $text = filter_input(INPUT_POST, "input_text", 
                    FILTER_SANITIZE_STRING);
            
            $message = new Message($header, $brief, $text);
            $message_data->Insert($message);
        }
        
        private function delete_message()
        {
            $message_data = new MessageData();
            
            $message_id = filter_input(INPUT_POST, "delete_message", 
                FILTER_SANITIZE_NUMBER_INT);
            $message_data->DeleteMessages("id", $message_id);
        }
        
        private function edit_message()
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
        
        private function post_comment()
        {
            $comment_data = new ObjectData("comments", "Comment");
    
            $comment_author = filter_input(INPUT_POST, "comment_author", 
                    FILTER_SANITIZE_STRING);
            $comment_text = filter_input(INPUT_POST, "comment_text", 
                    FILTER_SANITIZE_STRING);
            $comment_topic = filter_input(INPUT_POST, "comment_topic", 
                    FILTER_SANITIZE_STRING);
            
            $comment = new Comment($comment_author, $comment_text, $comment_topic);
            $comment_data->Insert($comment);
        }
        
        private function select_message()
        {
            $id = filter_input(INPUT_GET, "select_message", 
            FILTER_SANITIZE_NUMBER_INT);
            $this->page_forms_buffer['select_message']['id'] = $id;
        }
    }
?>
