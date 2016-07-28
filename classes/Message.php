<?php

class Message
{
    public $id;
    public $header;
    public $text;
    public $brief;
    
    function __construct(
            $id = null,
            $header = null,
            $text = null,
            $brief = null) 
    {
        $this->id = $id;
        $this->header = $header;
        $this->text = $text;
        $this->brief = $brief;
    }
}
?>

