<?php

class Message
{
    public $id;
    public $header;
    public $text;
    public $brief;
    
    /** @param type $name Description
     * 
     * @param int $id
     * @param string $header
     * @param string $text
     * @param string $brief
     */
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

