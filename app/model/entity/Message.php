<?php
class Message extends Entity
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
            $author = null,
            $id = null) 
    {
        $this->id       = $id;
        $this->header   = $header;
        $this->text     = $text;
        $this->brief    = $brief;
        $this->author   = $author;
    }
}
?>

