<?php
    // Login data for the database. Use this file in all models
    class Database
    {
        public $credentials;
        public $sqli;
        
        public function __construct($host = "host",
                $user = "user",
                $password = "password",
                $database = "database")
        {
            $this->credentials = array(
            "host" => $host,
            "user" => $user,
            "password" => $password,
            "database" => $database
            );
            
            $this->sqli = new mysqli($this->credentials["host"],
                    $this->credentials["user"],
                    $this->credentials["password"],
                    $this->credentials["database"]);
            if ($this->sqli->connect_error)
            {
                die("Connection to database is not established!");
            }
            $this->sqli->set_charset('utf8');
        }
        
        public function SqlQuery($sql)
        {
            $result = $this->sqli->query($sql);
            if (!$result)
            {
                die("Error: " . $this->sqli->error
                        . "<br />" . "Sql: " . $sql);
            }
            return $result;
        }
        
        public function CountRows($table_name)
        {
            $sql = "SELECT COUNT(*) FROM " . $table_name . ";";
            $result = $this->SqlQuery($sql);
            $row = $result->fetch_row();
            return $row[0];
        }
        
        public function GetColumns($table_name, array $selection,
                array $where_clause = NULL)
        {
            $sql = "SELECT " . join(", ", $selection) . ""
                . " FROM " . $table_name;
            $sql .= isset($where_clause) ? " WHERE " . join(", ", $where_clause) . 
                    ";" : ";";
            $result = $this->SqlQuery($sql);
            return $result;
        }
    }
?>

