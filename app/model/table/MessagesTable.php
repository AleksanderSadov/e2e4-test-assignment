<?php
class MessagesTable extends InitialTable
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function Get(array $fields, $id = null)
    {
        $message = new Message();
        if (isset($id))
        {
            if (in_array("comments", $fields))
            {
                unset($fields[array_search("comments", $fields)]);
                $selection = join(", ", $fields);
                
                $message = $this->Select($selection, "id='$id'", "id", "DESC")[0];
                
                $comments_data = new CommentsTable();
                $comments = $comments_data->Select("*", "topic='$id'", "date", "DESC");
                
                $message->comments = $comments;
            }
            else
            {
                $selection = join(", ", $fields);
                $message = $this->Select($selection, "id='$id'", "id", "DESC");
            }
        }
        else
        {
            $selection = join(", ", $fields);
            $message = $this->Select($selection, null, 'id', 'DESC');
        }
        
        return $message;
    }
}
?>

