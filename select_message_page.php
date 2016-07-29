<?php
    $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
    
    $this->template = ROOT_DIR . "templates/pages/select_message_page.php";
    $message_data = new MessageData();
    $messages = $message_data->SelectMessages(
            array("id", "header", "text"),
            array("id='" . $id . "'"));
    $message = $messages[0];
    $this->vars["main_section_header"] = $message->header;
    $message->header = null; // not display again, we included it in main_section_header
    $this->vars["selected_message"] = $message;
    $this->vars["id"] = $message->id;
    
    $comment_data = new CommentData();
    $this->vars["all_comments"] = $comment_data->SelectComments(
            array("*"),
            array("topic='" . $message->id . "'"));
?>

