<?php

class FrontController extends Controller
{
    /**
     * Invokes required actions of controllers
     * 
     * @param string $default_controller
     * @param string $default_action
     */
    public function Dispatch($default_controller, $default_action)
    {
        $controller_name = filter_input(
            INPUT_GET,
            "controller",
            FILTER_SANITIZE_STRING);
        $controller_name .= "Controller";
        $action = filter_input(
            INPUT_GET,
            "action",
            FILTER_SANITIZE_STRING);
        
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
