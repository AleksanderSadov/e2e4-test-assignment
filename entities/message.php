<?php

class Message 
{
    public $id;
    public $header;
    public $content;
    public $brief;
    
    function __construct($id = "-1", $header = "Default",
            $content = "Default", $brief = "Default") 
    {
        $this->id = $id;
        $this->header = $header;
        $this->content = $content;
        $this->brief = $brief;
    }
}
?>

