<?php

class FrontController extends Controller
{
    /**
     * Invokes required actions of controllers
     * 
     * @param string $default_controller default controller name
     * @param string $default_action default action name
     * @param string $view_name name of the developer view class
     */
    public function Dispatch($default_controller, $default_action, $view_name)
    {
        $controller_class = "";
        if (isset($this->data['get']['controller']))
        {
            $controller_class = $this->data['get']['controller'] . "Controller"; 
        }
        $action = "";
        if (isset($this->data['get']['action']))
        {
            $action = $this->data['get']['action']; 
        }
        
        if (!class_exists($controller_class) || !method_exists($controller_class, $action))
        {
            $controller_class = $default_controller . "Controller";
            $action = $default_action;
        }
        
        $controller = new $controller_class();
        $controller->view = new $view_name();
        $main_template_path = strtolower(preg_replace("/Controller/", "", $controller_class)) . "/" . strtolower($action);
        $controller->view->main_template = $main_template_path;
        $controller->$action();
        $controller->view->Render();
    }
}
