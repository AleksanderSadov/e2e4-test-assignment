<?php
    $this->main_template = "select_message_page";
    $this->title = "E2E4 TEST ASSIGNMENT";
    
    $message_data = new MessagesTable();
    $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
    
    $this->templates["edit_button"]["message_id"] = $id;
    $this->templates["delete_button"]["message_id"] = $id;
    
    $this->templates["comment_field"]["message_id"] = $id;
    
    $messages = $message_data->Select("id, header, text, author", "id='" . $id . "'");
    $selected_message = $messages[0];
    $this->requests["selected_message"] = $selected_message;
    
    $comment_data = new CommentsTable();
    $comments = $comment_data->Select("*", "topic='" . $id . "'", "date", "DESC");
    if (isset($comments) && !empty($comments))
    {
        $this->requests["all_comments"] = $comments;
    }
    else 
    {
        $this->requests["all_comments"] = "Нет комментариев";
    }
        
?>

