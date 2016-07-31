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
                        if (isset($row[$property]))
                        {
                            $value = $row[$property];
                        }
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
        
        /** Retrieves requested items from database  
         * @param string $selection     string of requested parts of object ("id, header, ...)"
         * @param string $where_clause  specific selection ("id=5, ...")
         * @param string $order_by      order by selected part of object ("id, ...")
         * @param string $type_of_order asceding or descending order ("ASC" or "DISC")
         * @return object return requested object(s) from database
         */
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
        
        public function Delete($selection)
        {
            return parent::DeleteRows($this->table_name, $selection);
        }
        
        public function Update($new_values, $selection)
        {
            return parent::UpdateRows($this->table_name, $new_values, $selection);
        }
    }
?>