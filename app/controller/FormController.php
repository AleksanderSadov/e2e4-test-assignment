<?php
class FormController extends FormControllers
{  
    protected $form_names;
    
    public function __construct()             
    {
        $this->form_names = array(
            "delete_message",
            "add_message",
            "edit_message",
            "post_comment",
            "select_message");
    }
    
    public function CheckServerPost() 
    {
        parent::CheckServerPost();
    }

    protected function add_message()
    {
        $message_data = new MessagesTable();

        $header = filter_input(INPUT_POST, "input_header", 
                FILTER_SANITIZE_STRING);
        $brief = filter_input(INPUT_POST, "input_brief", 
                FILTER_SANITIZE_STRING);
        $text = filter_input(INPUT_POST, "input_text", 
                FILTER_SANITIZE_STRING);

        $message = new Message($header, $brief, $text);
        $message_data->Insert($message);
    }

    protected function delete_message()
    {
        $message_data = new MessagesTable();

        $message_id = filter_input(INPUT_POST, "delete_message", 
            FILTER_SANITIZE_NUMBER_INT);
        $message_data->Delete("id='" . $message_id . "'");
    }

    protected function edit_message()
    {
        $message_data = new MessagesTable();

        $header = filter_input(INPUT_POST, "input_header", 
                FILTER_SANITIZE_STRING);
        $brief = filter_input(INPUT_POST, "input_brief", 
                FILTER_SANITIZE_STRING);
        $text = filter_input(INPUT_POST, "input_text", 
                FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, "edit_message", 
            FILTER_SANITIZE_NUMBER_INT);
        
        $message_data->Update(
                "header='" . $header . "', " .
                "brief='" . $brief . "', " .
                "text='" . $text . "' ",
                "id='" . $id . "'");             
    }

    protected function post_comment()
    {
        $comment_data = new CommentsTable();

        $comment_author = filter_input(INPUT_POST, "comment_author", 
                FILTER_SANITIZE_STRING);
        $comment_text = filter_input(INPUT_POST, "comment_text", 
                FILTER_SANITIZE_STRING);
        $comment_topic = filter_input(INPUT_POST, "comment_topic", 
                FILTER_SANITIZE_STRING);

        $comment = new Comment($comment_author, $comment_text, $comment_topic);
        $comment_data->Insert($comment);
    }
}
?>
