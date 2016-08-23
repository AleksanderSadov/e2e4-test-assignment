<?php
class MessagesTable extends InitialTable
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function GetWithComments(array $fields, $id = null)
    {   
        $message = parent::Get($fields, $id);
        
        $comments_data = new CommentsTable();
        $comments = $comments_data->Select("*", "topic='$id'", "date", "DESC");
        $message->comments = $comments;
        
        return $message;
    }
}
?>

