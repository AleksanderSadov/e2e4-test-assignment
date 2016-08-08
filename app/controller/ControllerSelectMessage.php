<?php

class ControllerSelectMessage extends Controller
{
    public function View()
    {
        $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
        
        $page = new MainPage();
        $message_data = new MessagesTable();
        $comment_data = new CommentsTable();
        
        $selected_message = $message_data->GetSpecificMessageWithoutBrief($id);
        $comments = $comment_data->GetAllComments($id);
        
        $page->main_template = "select_message_page";
        $page->title = "E2E4 TEST ASSIGNMENT";
        $page->templates["edit_button"]["message_id"] = $id;
        $page->templates["delete_button"]["message_id"] = $id;
        $page->templates["comment_field"]["message_id"] = $id;
        $page->requests["selected_message"] = $selected_message;
        $page->requests["all_comments"] = $comments;
        $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
        $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
        
        $page->Render();
    }
    
    public function Delete()
    {
        $message_id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
        
        $message_data = new MessagesTable();
        
        $message_data->Delete("id='$message_id'");
        
        header('Location: index.php?controller=Main&action=View');
    }
    
    public function PostComment()
    {
        $comment_data = new CommentsTable();

        $comment_author = filter_input(INPUT_GET, "comment_author", 
                FILTER_SANITIZE_STRING);
        $comment_text = filter_input(INPUT_GET, "comment_text", 
                FILTER_SANITIZE_STRING);
        $message_id = filter_input(INPUT_GET, "message_id", 
                FILTER_SANITIZE_STRING);

        $comment = new Comment($comment_author, $comment_text, $message_id);
        $comment_data->Insert($comment);
        
        header("Location: index.php?controller=SelectMessage&action=View&id=$message_id'");
    }
}
