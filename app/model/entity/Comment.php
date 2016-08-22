<?php
class Comment extends Entity
{
    public $text;
    public $author;
    public $date;
    public $id;
    public $topic;

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
