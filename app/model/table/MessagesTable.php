<?php
class MessagesTable extends InitialTable
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * Получение сообщения с комментариями
     * 
     * @param integer $id ID сообщения в базе данных
     * @return app/entity/Message
     */
    public function getWithComments($id)
    {   
        $message = parent::Get($id);
        
        $comments_data = new CommentsTable();
        $comments = $comments_data->select("*", "topic='$id'", "date", "DESC");
        $message->set("comments", $comments);
        
        return $message;
    }
}

