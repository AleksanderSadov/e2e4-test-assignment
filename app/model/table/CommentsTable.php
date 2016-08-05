<?php
class CommentsTable extends InitialTable
{
    public function __construct() 
    {
        $table_name = "comments";
        $object_name = "Comment";
        parent::__construct($table_name, $object_name);
    }
}
?>
