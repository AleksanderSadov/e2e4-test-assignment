<?php
    class MessageData extends Database
    {
        protected $table_name;
        
        public function __construct()
        {
            parent::__construct("localhost", "e2e4-test-assignment",
                    "0mfB4Vxs9jiOaYCf", "e2e4-test-assignment");
            $this->table_name = "messages";
        }
        
        protected function ProcessResult($result) 
        {
            $messages = array ();
            while($row = $result->fetch_array())
            {
                $message = new Message(
                array_key_exists('id', $row) ? $row['id'] : "-1",
                array_key_exists('header', $row) ? $row['header'] : "Not selected",
                array_key_exists('text', $row) ? $row['text'] : "Not selected",
                array_key_exists('brief', $row) ? $row['brief'] : "Not selected");
                array_push($this->messages, $message);
            }
            return $messages;
        }
        
        public function GetMessages(array $selection, array $where_clause = NULL)
        {
            $messages = array();
            $result = $this->SelectRows($this->table_name,
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
            return $messages;
        }
        
        public function CountMessages()
        {
            $result = $this->CountRows($this->table_name);
            var_dump($result);
        }
        
        public function SelectMessages(array $selection, array $where_clause = NULL)
        {
            return $this->SelectRows($this->table_name, $selection, $where_clause);
        }
        
        public function InsertMessages(array $columns, array $values)
        {
            return $this->InsertRows($this->table_name, $columns, $values);
        }
        
        function DeleteMessages($column, $value)
        {
            return $this->DeleteRows($this->table_name, $column, $value);
        }
        
        function UpdateMessages(array $set_assoc, array $where_assoc)
        {
            return $this->UpdateRows($this->table_name, $set_assoc, $where_assoc);
        }
    }
?>
