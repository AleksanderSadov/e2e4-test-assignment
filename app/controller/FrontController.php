<?php

class FrontController extends Controller
{
    public function Dispatch()
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
            $controller = new MessagesController();
            $controller->Index();
        }
    }
}
