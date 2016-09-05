<?php
class Message extends Entity
{
    protected $id;
    protected $header;
    protected $text;
    protected $brief;
    protected $comments;
    
    /**
     * Создание сущности сообщения
     * 
     * @param array ассоциативный массив со значениями полей
     */
    function __construct(array $data = null)
    {
        parent::__construct($data);
    }
}


