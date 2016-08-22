<?php
class Message extends Entity
{
    public $id;
    public $header;
    public $text;
    public $brief;
    
    /**
     * 
     * @param array fields data
     */
    function __construct(array $data = null)
    {
        parent::__construct($this, $data);
    }
}
?>

