<?php

class Message
{
    public $id;
    public $header;
    public $text;
    public $brief;
    
    /**
     * 
     * @param string $header
     * @param string $brief
     * @param string $text
     * @param id $id
     */
    function __construct(
            $header = null,
            $brief = null,
            $text = null,
            $id = null) 
    {
        $this->id = $id;
        $this->header = $header;
        $this->text = $text;
        $this->brief = $brief;
    }
    
    function getId() {
        return $this->id;
    }

    function getHeader() {
        return $this->header;
    }

    function getText() {
        return $this->text;
    }

    function getBrief() {
        return $this->brief;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setHeader($header) {
        $this->header = $header;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setBrief($brief) {
        $this->brief = $brief;
    }
}
?>

