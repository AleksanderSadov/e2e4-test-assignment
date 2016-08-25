<?php
class MessagesTable extends InitialTable
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function GetWithComments($id = null)
    {   
        $message = parent::Get($id);
        
        $comments_data = new CommentsTable();
        $comments = $comments_data->Select("*", "topic='$id'", "date", "DESC");
        $message->set("comments", $comments);
        
        return $message;
    }
}
?>

