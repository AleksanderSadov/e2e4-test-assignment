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
     * @param integer $id id сообщения в БД
     * @return app/entity/Message
     */
    public function GetWithComments($id = null)
    {   
        $message = parent::Get($id);
        
        $comments_data = new CommentsTable();
        $comments = $comments_data->Select("*", "topic='$id'", "date", "DESC");
        $message->set("comments", $comments);
        
        return $message;
    }
}

