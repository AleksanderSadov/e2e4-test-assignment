<?php

abstract class Entity implements ArrayAccess
{
    protected $container = [];
    
    protected function __construct($object, $data)
    {
        foreach ($object as $property => $value)
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

    public function set($property, $value)
    {
        if ($property != "container")
        {
            $this->$property = $value;
            $this->container[$property] = $value;            
        }
    }
}

?>

