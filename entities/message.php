<?php

class Message 
{
    public $id;
    public $header;
    public $content;
    public $brief;
    
    function __construct($id, $header, $content, $brief) 
    {
        $this->id = $id;
        $this->header = $header;
        $this->content = $content;
        $this->brief = $brief;
    }
}
?>

