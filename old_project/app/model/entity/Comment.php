<?php
class Comment extends Entity
{
    protected $text;
    protected $author;
    protected $date;
    protected $id;
    protected $topic;

    /**
     * Создание сущности комментария
     * 
     * @param array ассоциативный массив со значениями полей
     */
    function __construct(array $data = null)
    {
        parent::__construct($data);
    }
}

