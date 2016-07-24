<?php

class Message 
{
    public $header;
    public $content;
    public $brief;
    
    function __construct($header, $content, $brief) 
    {
        $this->header = $header;
        $this->content = $content;
        $this->brief = $brief;
    }
}
?>

