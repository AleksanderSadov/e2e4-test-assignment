<?php

class FrontController extends Controller
{
    private $controller_name;
    private $controller_class;
    private $controller_action;
    private $model_name;
    private $view_name;
    
    /**
     * Initialize FrontController instance
     * 
     * @param string $default_controller default controller name
     * @param string $default_action default action name
     * @param string $view_name name of the developer view class
     */
    public function __construct($default_controller, $default_action)
    {
        parent::__construct();
        
        if (isset($this->data['get']['controller']))
        {
            $this->controller_name = $this->data['get']['controller'];
            $this->controller_class = $this->controller_name . "Controller"; 
        }
        if (isset($this->data['get']['action']))
        {
            $this->controller_action = $this->data['get']['action']; 
        }

        if (!class_exists($this->controller_class) || !method_exists($this->controller_class, $this->controller_action))
        {
            $this->controller_name = $default_controller;
            $this->controller_class = $this->controller_name . "Controller";
            $this->controller_action = $default_action;
        }
        
        $this->view_name = "AppView";
        $this->model_name = $this->controller_name . "Table";
    }
    
    public function Dispatch()
    {   
        $controller = new $this->controller_class();
        $controller->view = new $this->view_name();
        $controller->model = new $this->model_name();
        $main_template_path = strtolower($this->controller_name) . "/" . strtolower($this->controller_action);
        $controller->view->main_template = $main_template_path;
        $action = $this->controller_action;
        $controller->$action();
        $controller->view->Render();
    }
}
