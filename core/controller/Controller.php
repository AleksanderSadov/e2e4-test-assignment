<?php
abstract class Controller
{
    public $data;
    public $view;
    public $model;
    
    public function __construct() 
    {
        foreach($_POST as $key => $value) 
        {
            $this->data['post'][htmlspecialchars($key)] = htmlspecialchars($value);
        }
        foreach($_GET as $key => $value) 
        {
            $this->data['get'][htmlspecialchars($key)] = htmlspecialchars($value);
        }
    }
    
    public function redirect($location)
    {
        header("Location: $location");
    }
}