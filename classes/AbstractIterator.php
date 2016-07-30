<?php
    abstract class AbstractIterator implements Iterator
    {
        protected $position = 0;
        
        function rewind()
        {
            $this->position = 0;
        }
        
        abstract function current();
        
        function key()
        {
            return $this->position;
        }
        
        function next()
        {
            ++$this->position;
        }
        
        function valid()
        {
            return isset($this->array[$this->position]);
        }
    }
?>
