<?php

abstract class Controller
{
    public $data;
    
    public function __construct(array $data_post, array $data_get) 
    {
        foreach($data_post as $key => $value) 
        {
            $this->data['post'][htmlspecialchars($key)] = htmlspecialchars($value);
        }
        foreach($data_get as $key => $value) 
        {
            $this->data['get'][htmlspecialchars($key)] = htmlspecialchars($value);
        }
    }
}

?>

