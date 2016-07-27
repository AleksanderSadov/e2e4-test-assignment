<?php
    // All database manipulation described here

    require_once(ROOT_DIR . "entities/message.php");
    require(ROOT_DIR . "models/credentials.php");
    
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
    
    function GetMessages($id, $need_header, $need_brief, $need_text)
    {
        $selection = array();
        array_push($selection, "id");
        if ($need_header)
        {
            array_push($selection, "header");
        }
        if ($need_brief)
        {
            array_push($selection, "brief");
        }
        if ($need_text)
        {
            array_push($selection, "text"); 
        }
        $sql = "SELECT " . join(", ", $selection) . ""
                . " FROM messages";
        $sql .= $id !== 0 ? " WHERE id='" .$id . "';" : ";";

        $result = $GLOBALS['sqli']->query($sql);
        $messages = array();
        while($row = $result->fetch_array())
            {
                $message = new Message(
                    array_key_exists('id', $row) ? $row['id'] : "-1",
                    array_key_exists('header', $row) ? $row['header'] : "Not selected",
                    array_key_exists('text', $row) ? $row['text'] : "Not selected",
                    array_key_exists('brief', $row) ? $row['brief'] : "Not selected");
                array_push($messages, $message);
            }
        return $messages;
    }
    
    function InsertMessage($message)
    {
        $sql = "INSERT INTO messages (header, brief, text) " .
                "VALUES ('" . $message->header . "', " . 
                "'" . $message->brief . "', " . 
                "'" . $message->text . "');";
        if (!$GLOBALS['sqli']->query($sql))
        {
            die("Error: " . $GLOBALS['sqli']->error);
        }
    }
    
    function DeleteMessage($message_id)
    {
        $sql = "DELETE FROM messages WHERE id='" . $message_id . "';";
        if (!$GLOBALS['sqli']->query($sql))
        {
            die("Error: " . $GLOBALS['sqli']->error);
        }
    }
?>
