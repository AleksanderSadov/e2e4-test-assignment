<?php
    class MessageData extends Database
    {
        protected $table_name;
        
        public function __construct()
        {
            parent::__construct(
                    "localhost",
                    "e2e4-test-assignment",
                    "0mfB4Vxs9jiOaYCf",
                    "e2e4-test-assignment");
            $this->table_name = "messages";
        }
        
        protected function ProcessResult($result) 
        {
            $messages = array ();
            foreach($result as $row)
            {
                $message = new Message(
                array_key_exists('id', $row)        ? $row['id']        : null,
                array_key_exists('header', $row)    ? $row['header']    : null,
                array_key_exists('text', $row)      ? $row['text']      : null,
                array_key_exists('brief', $row)     ? $row['brief']     : null);
                array_push($messages, $message);
            }
            return $messages;
        }
        
        /** @return int number of messages in database */
        public function CountMessages()
        {
            $result = $this->CountRows($this->table_name);
            return $result[0][0];
        }
        
        public function SelectMessages(
                array $selection,
                array $where_clause = NULL)
        {
            $result =  $this->SelectRows(
                    $this->table_name,
                    $selection,
                    $where_clause);
            return $this->ProcessResult($result);
        }
        
        public function InsertMessages(
                array $columns,
                array $values)
        {
            return $this->InsertRows($this->table_name, $columns, $values);
        }
        
        public function DeleteMessages(
                $column,
                $value)
        {
            return $this->DeleteRows($this->table_name, $column, $value);
        }
        
        public function UpdateMessages(
                array $set_assoc,
                array $where_assoc)
        {
            return $this->UpdateRows($this->table_name, $set_assoc, $where_assoc);
        }
        
        /** @return string html string */
        public function ConstructHtml(Message $message)
        {
            $buffer = "";
            if (isset($message->header))
            {
                $buffer .= "<div class='message_header boxed_content'"
                        . "id=" . $message->id . ">"
                        . "<h2>" . $message->header . "</h2></div>";
            }
            if (isset($message->brief))
            {
                $buffer .= "<div class='message_brief boxed_content"
                    . " boxed_border'>" . $message->brief . "</div>";
            }
            if (isset($message->text))
            {
                $buffer .= "<div class='message_brief boxed_content"
                    . " boxed_border'>" . $message->text . "</div>";
            }

            $html = "<div class='message_content'>"
                    . $buffer . "</div>";
            return $html;
        }
    }
?>