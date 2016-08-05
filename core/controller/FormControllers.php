<?php
abstract class FormControllers extends Controller
{    
    protected function CheckServerPost()
    {
        foreach ($this->form_names as $action)
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                if (isset($_POST[$action]))
                {
                    $this->$action();
                }
            }
        }
    }
}
?>
