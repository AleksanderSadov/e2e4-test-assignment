<?php

class Message 
{
    public $id;
    public $header;
    public $text;
    public $brief;
    
    function __construct($id = "-1", $header = "Default",
            $text = "Default", $brief = "Default") 
    {
        $this->id = $id;
        $this->header = $header;
        $this->text = $text;
        $this->brief = $brief;
    }
}
?>

