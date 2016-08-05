<?php
class MessagesTable extends InitialTable
{
    public function __construct() 
    {
        $table_name = "messages";
        $object_name = "Message";
        parent::__construct($table_name, $object_name);
    }
}
?>

