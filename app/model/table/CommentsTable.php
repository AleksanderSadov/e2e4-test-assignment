<?php
class CommentsTable extends InitialTable
{
    public function __construct() 
    {
        $table_name = "comments";
        $object_name = "Comment";
        parent::__construct($table_name, $object_name);
    }
    
    public function GetAllComments($topic_id)
    {
        $comments = parent::Select("*", "topic='$topic_id'", "date", "DESC");
        
        if (isset($comments) && !empty($comments))
        {
            return $comments;
        }
        else 
        {
            return "Нет комментариев";
        }
    }
}
?>
