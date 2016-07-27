<?php
    require_once(ROOT_DIR . "entities/message.php");
    require(ROOT_DIR . "models/credentials.php");    
    $credentials = array(
        "host" => "localhost",
        "user" => "e2e4-test-assignment",
        "password" => "0mfB4Vxs9jiOaYCf",
        "database" => "e2e4-test-assignment"
    );
    
    class MessageData
    {
        public $database;
        public $table_name;
        public $messages;
        
        public function __construct()
        {
            $this->database = new Database("localhost", "e2e4-test-assignment",
                "0mfB4Vxs9jiOaYCf", "e2e4-test-assignment");
            $this->table_name = "messages";
            $this->messages = array();
        }
        
        public function GetMessages(array $selection, array $where_clause = NULL)
        {
            $result = $this->database->GetColumns($this->table_name,
                    $selection, $where_clause);
            while($row = $result->fetch_array())
            {
                $message = new Message(
                array_key_exists('id', $row) ? $row['id'] : "-1",
                array_key_exists('header', $row) ? $row['header'] : "Not selected",
                array_key_exists('text', $row) ? $row['text'] : "Not selected",
                array_key_exists('brief', $row) ? $row['brief'] : "Not selected");
                array_push($this->messages, $message);
            }
            return $this->messages;
        }
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
    
    function EditMessage($message)
    {
        $sql = "UPDATE messages SET header='" . $message->header . "', "
                . "brief='" . $message->brief . "', "
                . "text='" . $message->text . "' "
                . "WHERE id='" . $message->id . "';";
        if (!$GLOBALS['sqli']->query($sql))
        {
            die("Error: " . $GLOBALS['sqli']->error);
        }
    }
?>
