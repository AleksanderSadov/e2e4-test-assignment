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
    
    $comment = new Comment();
    $comment->setAuthor("mather");
    $comment->setText("Коммент");
    $comment->setTopic(1);
    
    $comment_data = new ObjectData("comments", "Comment");
    var_dump($comment_data->Select(array("*")));
?>
