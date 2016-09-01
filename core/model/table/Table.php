<?php
    abstract class Table extends Database
    {
        protected $table_name;
        protected $object_name;
        
        public function __construct() 
        {
            $this->table_name = strtolower(preg_replace("/Table/", "", get_class($this)));
            $this->object_name = rtrim(preg_replace("/Table/", "", get_class($this)), "s");
            parent::__construct();
        }
        
        /**
         * Формирование массива объектов из массива ассоциативных массивов, полученных в результате выполнения sql запроса
         * 
         * @param array $result массив ассоциативных массивов - результате выполнения sql запроса
         * @return array массив сущностей, соответствующих запросу
         */
        private function processResult($result) 
        {
            if (isset($result) && !empty($result))
            {
                $objects = [];
                foreach($result as $row)
                {
                    $object = new $this->object_name($row);
                    array_push($objects, $object);
                }
                return $objects;
            }
            return [];
        }
        
        /**
         * Подсчет количества записей в базе данных
         * 
         * @return integer количество записей в базе данных
         */
        public function count()
        {
            $result = parent::CountRows($this->table_name);
            return $result[0][0];
        }
        
        /** Выполнение выборки из базы данных  
         * @param string $selection     необходимые поля
         * @param string $where_clause  условие выборки [optional]
         * @param string $order_by      поле для сортировки [optional]
         * @param string $type_of_order вид сортировки (ASC или DESC) [optional]
         * @return array массив сущностей, соответствующих выборке
         */
        public function select(
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
            return $this->processResult($result);
        }
        
        /**
         * Получение сущности из базы данных
         * 
         * @param integer $id ID сущности в базе данных
         * @return Entity запрашиваемая сущность
         */
        public function get($id)
        {
            if (isset($id))
            {
                return $this->select("*", "id='$id'", 'id', 'DESC')[0];
            }
        }
        
        /**
         * Получение всех сущностей из базы данных
         * 
         * @return array массив запрашиваемых сущностей
         */
        public function getAll()
        {
            return $this->select("*", null, 'id', 'DESC');
        }
        
        /**
         * Сохранение сущности в базе данных
         * 
         * @param Entity $object сущность для сохранения
         * @return bool true в случае успешного сохранения сущности, false иначе
         */
        public function insert($object)
        {
            $columns = [];
            $values = [];
            foreach ($object as $property => $value)
            {
                if (isset($value))
                {
                    array_push($columns, $property);
                    array_push($values, $value);
                }
            }
            $columns = join(", ", $columns);
            $values = "'" . join("', '", $values) . "'";
            return parent::InsertRows(
                    $this->table_name,
                    $columns,
                    $values);
        }
        
        /**
         * Удаление сущности из базы данных
         * 
         * @param integer $id ID сущности в базе данных
         * @return bool true в случае успешного сохранения сущности, false иначе
         */
        public function delete($id)
        {
            return parent::DeleteRows($this->table_name, "id='{$id}'");
        }
        
        /**
         * Изменение сущности в базе данных
         * 
         * @param integer $id ID сущности в базе данных
         * @param array $data ассоциативный массив данных
         * @return bool true в случае успешного изменения сущности в базе данных, false иначе
         */
        public function update($id, $data)
        {
            $set = [];
            foreach ($data as $property => $value)
            {
                if (isset($value))
                {
                    array_push($set, "$property='$value'");
                }
            }
            $set = join(", ", $set);
            $where = "id='$id'";
            return parent::UpdateRows($this->table_name, $set, $where);
        }
    }