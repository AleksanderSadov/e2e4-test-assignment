<?php
class MessagesTable extends InitialTable
{
    public function __construct() 
    {
        $table_name = "messages";
        $object_name = "Message";
        parent::__construct($table_name, $object_name);
    }
    
    public function GetAllMessagesBrief()
    {
        $all_messages = parent::Select("id, header, brief", null, "id", "DESC");
        return $all_messages;
    }
    
    public function GetSpecificMessageWithoutBrief($id)
    {
        $messages = parent::Select(
                "id, header, text, author", "id='$id'");
        return $messages[0];
    }
    
    public function GetSpecificMessageFull($id)
    {
        $messages = parent::Select(
                "*", "id='$id'");
        return $messages[0];
    }
    
    public function UpdateMessage($id, $header, $brief, $text)
    {
        parent::Update(
            "header='$header', " .
            "brief='$brief', " .
            "text='$text' ",
            "id='$id'"); 
    }
}
?>

