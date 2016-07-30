<?php
    // Login data for the database. Use this file in all models
    abstract class Database
    {
        private $credentials;
        private $sqli;
        
        protected function __construct(
                $host = "host",
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
            
            $this->sqli = new mysqli(
                    $this->credentials["host"],
                    $this->credentials["user"],
                    $this->credentials["password"],
                    $this->credentials["database"]);
            if ($this->sqli->connect_error)
            {
                die("Connection to database is not established!");
            }
            $this->sqli->set_charset('utf8');
        }
        
        protected function BuidOutputArray($result)
        {
            $output_result = array();
            if (is_bool($result))
            {
                return $result;
            }
            else
            {
                if ($result->num_rows > 0)
                {
                    while($row = $result->fetch_array())
                    {
                        array_push($output_result, $row);
                    }
                }
                else
                {
                    return null;
                }
            }
            return $output_result;
        }


        protected function SqlQuery($sql)
        {
            $result = $this->sqli->query($sql);
            if ($this->sqli->error || $result === FALSE)
            {
                die("Error: " . $this->sqli->error
                        . "<br />" . "Sql: " . $sql);
            }
            return $this->BuidOutputArray($result);
        }
        
        protected function CountRows($table_name)
        {
            $sql = "SELECT COUNT(*) FROM " . $table_name . ";";
            return $this->SqlQuery($sql);
        }
        
        protected function SelectRows(
                $table_name,
                array $selection,
                array $where_clause = NULL,
                array $order_by = NULL,
                $type_of_order = NULL)
        {
            $sql =  "SELECT " . join(", ", $selection) .
                    " FROM " . $table_name;
            $sql .= isset($where_clause) ?
                    " WHERE " . join(", ", $where_clause) . "" : "";
            $sql .= isset($order_by) ?
                    " ORDER BY " . join(", ", $order_by) : "";
            $sql .= isset($type_of_order) ?
                    " " . $type_of_order . " ;" : ";";
            return $this->SqlQuery($sql);
        }
        
        protected function InsertRows(
                $table_name,
                array $columns,
                array $values)
        {
            $sql = "INSERT INTO " . $table_name . 
                    " (" . join(", ", $columns) . ")" .
                    " VALUES ('" . join("', '", $values) . "');";
            return $this->SqlQuery($sql);
        }
        
        protected function DeleteRows(
                $table_name,
                $column,
                $value)
        {
            $sql = "DELETE FROM " . $table_name .
                    " WHERE " . $column . "='" . $value . "';";
            return $this->SqlQuery($sql);
        }
        
        protected function UpdateRows(
                $table_name,
                array $set_assoc,
                array $where)
        {
            $sql = "UPDATE " . $table_name . " SET ";
            $buffer = array();
            foreach ($set_assoc as $column => $value)
            {
                array_push($buffer, $column . "='" . $value . "'");
            }
            $sql .= join(", ", $buffer) . " WHERE ";
            $buffer = array();
            foreach ($where as $selection)
            {
                array_push($buffer, $selection);
            }
            $sql .= join(", ", $buffer) . ";";
            return $this->SqlQuery($sql);
        }
        
        public function PerformQuery($sql)
        {
            return $this->SqlQuery($sql);
        }
    }
?>

