<?php
    // All database manipulation described here

    require_once($app_root_path . "entities/message.php");
    require($app_root_path . "models/credentials.php");

    $sqli = new mysqli($host, $user, $password, $database);
    if ($sqli->connect_error)
    {
        die("Connection to database is not established!");
    }
    $sqli->set_charset('utf8');
    
    function CountMessages()
    {
        $sql = "SELECT COUNT(*) FROM messages";
        $result = $GLOBALS['sqli']->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }
    
    function GetAllMessages()
    {
        $messages = array();
        $sql = "SELECT header, content, brief FROM messages";
        $result = $GLOBALS['sqli']->query($sql);
        while($row = $result->fetch_array())
        {
            $message = new Message($row['header'], $row['content'], $row['brief']);
            array_push($messages, $message);
        }
        return $messages;
    }
?>
