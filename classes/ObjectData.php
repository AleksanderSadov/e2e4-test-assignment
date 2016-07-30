<?php
    class ObjectData extends Database
    {
        public $table_name;
        
        public function __construct($table_name) 
        {
            $host = "localhost";
            $user = "e2e4-test-assignment";
            $password = "0mfB4Vxs9jiOaYCf";
            $database = "e2e4-test-assignment";
            $this->table_name = $table_name;
            parent::__construct($host, $user, $password, $database);
        }
        
        private function ProcessResult($result) 
        {
            if (isset($result) && !empty($result))
            {
                $objects = array ();
                foreach($result as $row)
                {
                    foreach($this->object as $property => $value)
                    {
                        $this->object[$property] = $row[$property];
                        array_push($objects, $this->object);
                    }
                }
                return $objects;
            }
            return null;
        }
        
        public function Count()
        {
            $result = $this->CountRows($this->table_name);
            return $result[0][0];
        }
       
        public function Select(
                array $selection,
                array $where_clause = NULL,
                array $order_by = NULL,
                $type_of_order = NULL)
        {
            $result =  $this->SelectRows(
                    $this->table_name,
                    $selection,
                    $where_clause,
                    $order_by,
                    $type_of_order);
            return $this->ProcessResult($result);
        }
        
        public function Insert($object)
        {
            var_dump($object);
            $columns = array();
            $values = array();
            foreach ($object as $property => $value)
            {
                var_dump($property);
                var_dump($value);
                if (isset($value))
                {
                    array_push($columns, $property);
                    array_push($values, $value);
                }
            }
            return $this->InsertRows(
                    $this->table_name,
                    $columns,
                    $values);
        }
        
        public function Delete(
                $column,
                $value)
        {
            return $this->DeleteRows($this->table_name, $column, $value);
        }
        
        public function Update(
                array $set_assoc,
                array $where)
        {
            return $this->UpdateRows($this->table_name, $set_assoc, $where);
        }
    }
?>