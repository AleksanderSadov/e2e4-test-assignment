<?php

class FrontController extends Controller
{
    /**
     * Invokes required actions of controllers
     * 
     * @param string $default_controller default controller name
     * @param string $default_action default action name
     */
    public function Dispatch($default_controller, $default_action)
    {
        $controller_name = "";
        if (isset($this->data['get']['controller']))
        {
            $controller_name = $this->data['get']['controller'] . "Controller"; 
        }
        $action = "";
        if (isset($this->data['get']['action']))
        {
            $action = $this->data['get']['action']; 
        }
        
        if (class_exists($controller_name) && method_exists($controller_name, $action))
        {
            $controller = new $controller_name();
            $controller->$action();
        }
        else
        {
            $default_controller_name = $default_controller . "Controller";
            $controller = new $default_controller_name();
            $controller->$default_action();
        }
    }
}
