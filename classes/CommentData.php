<?php
    class CommentData extends Database
    {
        private $table_name;
        
        public function __construct()
        {
            parent::__construct(
                    "localhost",
                    "e2e4-test-assignment",
                    "0mfB4Vxs9jiOaYCf",
                    "e2e4-test-assignment");
            $this->table_name = "comments";
        }
        
        protected function ProcessResult($result) 
        {
            $comments = array ();
            foreach($result as $row)
            {
                $comment = new Comment(
                array_key_exists('content', $row)   ? $row['content']   : null,
                array_key_exists('author', $row)    ? $row['author']    : null,
                array_key_exists('date', $row)      ? $row['date']      : null,
                array_key_exists('id', $row)       ? $row['id']         : null,
                array_key_exists('topic', $row)    ? $row['topic']      : null);
                array_push($comments, $comment);
            }
            return $comments;
        }
        
        /** Counts number of messages in database 
         * @return int number of messages in database */
        public function CountComments()
        {
            $result = $this->CountRows($this->table_name);
            return $result[0][0];
        }
        
        /** Gets required messages with criterions
         * 
         * @param array array of required parts of message ("id", "brief", ...)
         * @param array array of criterions ("id=5", "id>6", ...)  
         * @return array array of required messages
         */
        public function SelectComments(
                array $selection,
                array $where_clause = NULL)
        {
            $result =  $this->SelectRows(
                    $this->table_name,
                    $selection,
                    $where_clause);
            return $this->ProcessResult($result);
        }
        
        public function InsertComments(
                array $columns,
                array $values)
        {
            return $this->InsertRows($this->table_name, $columns, $values);
        }
        
        public function DeleteComments(
                $column,
                $value)
        {
            return $this->DeleteRows($this->table_name, $column, $value);
        }
        
        public function UpdateComments(
                array $set_assoc,
                array $where)
        {
            return $this->UpdateRows($this->table_name, $set_assoc, $where);
        }
    }
?>