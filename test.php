<?php
    function my_autoloader($class)
    {
        include ("classes/" . $class . ".php");
    }
    spl_autoload_register("my_autoloader");
    
    $comment = new Comment();
    $comment->setAuthor("mather");
    $comment->setText("Коммент");
    $comment->setTopic(1);
    
    $comment_data = new ObjectData("comments");
    var_dump($comment_data->Insert($comment));
?>
