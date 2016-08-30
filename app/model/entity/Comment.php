<?php
class Comment extends Entity
{
    public $text;
    public $author;
    public $date;
    public $id;
    public $topic;

    /**
     * Создание сущности комментария
     * 
     * @param array ассоциативный массив со значениями полей
     */
    function __construct(array $data = null)
    {
        parent::__construct($this, $data);
    }
}

