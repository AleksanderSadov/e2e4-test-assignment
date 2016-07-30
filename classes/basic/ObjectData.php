<?php
    class ObjectData extends Database
    {
        private $table_name;
        private $object_name;
        
        public function __construct($table_name, $object_name) 
        {
            $host = "localhost";
            $user = "e2e4-test-assignment";
            $password = "0mfB4Vxs9jiOaYCf";
            $database = "e2e4-test-assignment";
            $this->table_name = $table_name;
            $this->object_name = $object_name;
            parent::__construct($host, $user, $password, $database);
        }
        
        private function ProcessResult($result) 
        {
            if (isset($result) && !empty($result))
            {
                $objects = array ();
                foreach($result as $row)
                {
                    $object = new $this->object_name();
                    foreach($object as $property => &$value)
                    {
                        $value = $row[$property];
                    }
                    array_push($objects, $object);
                }
                return $objects;
            }
            return null;
        }
        
        public function Count()
        {
            $result = parent::CountRows($this->table_name);
            return $result[0][0];
        }
       
        public function Select(
                $selection,
                $where_clause = NULL,
                $order_by = NULL,
                $type_of_order = NULL)
        {
            $result =  parent::SelectRows(
                    $this->table_name,
                    $selection,
                    $where_clause,
                    $order_by,
                    $type_of_order);
            return $this->ProcessResult($result);
        }
        
        public function Insert($object)
        {
            $columns = array();
            $values = array();
            foreach ($object as $property => $value)
            {
                if (isset($value))
                {
                    array_push($columns, $property);
                    array_push($values, $value);
                }
            }
            return parent::InsertRows(
                    $this->table_name,
                    $columns,
                    $values);
        }
        
        public function Delete(
                $column,
                $value)
        {
            return parent::DeleteRows($this->table_name, $column, $value);
        }
        
        public function Update(
                array $set_assoc,
                array $where)
        {
            return parent::UpdateRows($this->table_name, $set_assoc, $where);
        }
    }
?>