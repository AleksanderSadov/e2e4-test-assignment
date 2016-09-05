<?php

abstract class Entity implements ArrayAccess
{
    // Контейнер служит для обращения к полям объекта как к массиву
    protected $container = [];
    
    /**
     * Создание сущности
     * 
     * @param Entity $object конкретная сущность
     * @param array $data ассоциативный массив данных для заполнения полей сущности
     */
    protected function __construct($data)
    {
        foreach ($this as $property => $value)
        {
            if (isset($data) && array_key_exists($property, $data))
            {
                $this->set($property, $data[$property]);
            }
            else
            {
                $this->set($property, null);
            }
        }
    }
    
    /**
     * Задание значения полю объекта
     * 
     * @param string $property название поля объекта
     * @param mixed $value значение поля
     */
    public function set($property, $value)
    {
        if ($property != "container")
        {
            $this->$property = $value;
            $this->container[$property] = $value;            
        }
    }
    
    // Функции ниже служат реализацией интерфейса ArrayAccess
    public function offsetSet($offset, $value) 
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) 
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) 
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) 
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

