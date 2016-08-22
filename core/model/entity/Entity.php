<?php

abstract class Entity
{
    protected function __construct($object, $data)
    {
        foreach ($object as $field => $value)
        {
            if (isset($data) && array_key_exists($field, $data))
            {
                $this->$field = $data[$field];
            }
            else
            {
                $this->$field = null;
            }
        }
    }
}

?>

