<?php
    abstract class Database
    {
        private $credentials;
        private $sqli;
        
        protected function __construct()
        {
            $this->credentials = array(
            "host" => DB_HOST,
            "user" => DB_USER,
            "password" => DB_PASSWORD,
            "database" => DB_NAME);
            
            $this->sqli = new mysqli(
                    $this->credentials["host"],
                    $this->credentials["user"],
                    $this->credentials["password"],
                    $this->credentials["database"]);
            if ($this->sqli->connect_error)
            {
                die("Не удалось установить соединение с базой данных.");
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
                $selection,
                $where_clause = NULL,
                $order_by = NULL,
                $type_of_order = NULL)
        {
            $sql =  "SELECT " . $selection .
                    " FROM " . $table_name;
            $sql .= !empty($where_clause) ?
                    " WHERE " . $where_clause : "";
            $sql .= !empty($order_by) ?
                    " ORDER BY " . $order_by : "";
            $sql .= !empty($type_of_order) ?
                    " " . $type_of_order : "";
            $sql .= ";";
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
                $selection)
        {
            $sql = "DELETE FROM " . $table_name .
                    " WHERE " . $selection . ";";
            return $this->SqlQuery($sql);
        }
        
        protected function UpdateRows(
                $table_name,
                $new_values,
                $selection)
        {
            $sql = "UPDATE " . $table_name . " SET " . $new_values . 
                   " WHERE " . $selection . ";";
            return $this->SqlQuery($sql);
        }
        
        public function PerformQuery($sql)
        {
            return $this->SqlQuery($sql);
        }
    }
?>
