<?php
class Message extends Entity
{
    public $id;
    public $header;
    public $text;
    public $brief;
    public $comments;
    
    /**
     * Создание сущности сообщения
     * 
     * @param array ассоциативный массив со значениями полей
     */
    function __construct(array $data = null)
    {
        parent::__construct($this, $data);
    }
}


