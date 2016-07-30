<?php
    function my_autoloader($class)
    {
        if (file_exists("classes/" . $class . ".php"))
        {
            require_once ("classes/" . $class . ".php");
        }
        else
        {
            if (file_exists("classes/basic/" . $class . ".php"))
            {
                require_once("classes/basic/" . $class . ".php");
            }
            else
            {
                die("Не удалось подключить класс: " . $class);
            }
        }
    }
    spl_autoload_register("my_autoloader");
    
    $message_data = new ObjectData("messages", "Message");
    $messages = $message_data->Select("*");
    var_dump($messages);
    $message_data->Update("header='Header'", "id='1'");
    echo "<br /><br />";
    $messages = $message_data->Select("*");
    var_dump($messages);
?>
