<?php

    include ("config.php");
    function my_autoloader($class)
    {
        include ROOT_DIR . "/classes/" . $class . ".php";
    }
    spl_autoload_register("my_autoloader");
    ob_start();
    
    $message_data = new MessageData();
    var_dump($message_data);
    
    $header = filter_input(INPUT_POST, "input_header", 
            FILTER_SANITIZE_STRING);
    $brief = filter_input(INPUT_POST, "input_brief", 
            FILTER_SANITIZE_STRING);
    $text = filter_input(INPUT_POST, "input_text", 
            FILTER_SANITIZE_STRING);
    $message_data->InsertMessages(
            array("header", "brief", "text"),
            array($header, $brief, $text));
    
    while(@ob_end_clean());
    
    header("Location: index.php");
?>

