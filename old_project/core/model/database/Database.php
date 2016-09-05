<?php
    abstract class Database
    {
        private $credentials;
        private $sqli;
        
        /**
         * Создание класса Database и установка соединения с БД
         */
        protected function __construct()
        {
            $this->credentials = array(
            "host" => DB_HOST,
            "user" => DB_USER,
            "password" => DB_PASSWORD,
            "database" => DB_NAME);
            
            try {
                $this->sqli = new mysqli(
                        $this->credentials["host"],
                        $this->credentials["user"],
                        $this->credentials["password"],
                        $this->credentials["database"]);
                if ($this->sqli->connect_error) {
                    $message = "Не удалось установить соединение с базой данных" . PHP_EOL;
                    throw new Exception($message);
                }
            } catch (Exception $ex) {
                echo "<pre>{$ex}</pre>";
                exit;
            }
            $this->sqli->set_charset('utf8');
        }
        
        
        /**
         * Формирование массива ассоциативных массивов, содержащих результат запроса
         * 
         * @param mysql_result $result 
         * @return array
         */
        final protected function buildOutputArray($result)
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

        /**
         * Выполнение sql запроса 
         * 
         * @param string $sql сформированный sql запроса
         * @return array массив ассоциативных массивов, содержащих результат запроса
         */
        final protected function sqlQuery($sql)
        {
            $result = $this->sqli->query($sql);
            if ($this->sqli->error || $result === FALSE)
            {
                die("Error: " . $this->sqli->error
                        . "<br />" . "Sql: " . $sql);
            }
            return $this->buildOutputArray($result);
        }
        
        /**
         * Подсчет количества записей в БД
         * 
         * @param string $table_name название таблицы
         * @return array массив ассоциативных массивов, содержащих результат запроса
         */
        final protected function countRows($table_name)
        {
            $sql = "SELECT COUNT(*) FROM $table_name;";
            return $this->sqlQuery($sql);
        }
        
        /**
         * Выборка записей из БД
         * 
         * @param string $table_name название таблицы
         * @param string $select необходимые поля записи
         * @param string $where условие выборки
         * @param string $order_by поле сортировки
         * @param string $type_of_order тип сортировки (ASC или DESC)
         * @return array массив ассоциативных массивов, содержащих результат запроса
         */
        final protected function selectRows(
                $table_name,
                $select,
                $where = NULL,
                $order_by = NULL,
                $type_of_order = NULL)
        {
            $sql =  "SELECT $select " .
                    "FROM $table_name ";
            $sql .= !empty($where) ?
                    "WHERE $where " : "";
            $sql .= !empty($order_by) ?
                    "ORDER BY $order_by " : "";
            $sql .= !empty($type_of_order) ?
                    "$type_of_order" : "";
            $sql .= ";";
            return $this->sqlQuery($sql);
        }
        
        /**
         * Вставка записи
         * 
         * @param string $table_name название таблицы
         * @param string $columns названия полей
         * @param string $values значения полей
         * @return bool true в случае успешного выполнения запроса, false иначе
         */
        final protected function insertRows(
                $table_name,
                $columns,
                $values)
        {
            $sql = "INSERT INTO $table_name " . 
                   "({$columns})" .
                   "VALUES ({$values});";
            return $this->sqlQuery($sql);
        }
        
        /**
         * Удаление записи
         * 
         * @param string $table_name название таблицы
         * @param string $where условие выборки
         * @return bool true в случае успешного выполнения запроса, false иначе
         */
        final protected function deleteRows(
                $table_name,
                $where)
        {
            $sql = "DELETE FROM $table_name " .
                   "WHERE $where;";
            return $this->sqlQuery($sql);
        }
        
        /**
         * Изменение существующей записи
         * 
         * @param string $table_name название таблицы
         * @param string $set указание полей и их новых значений
         * @param string $where условие выборки
         * @return bool true в случае успешного выполнения запроса, false иначе
         */
        final protected function updateRows(
                $table_name,
                $set,
                $where)
        {
            $sql = "UPDATE $table_name " . 
                   "SET $set " . 
                   "WHERE $where;";
            return $this->sqlQuery($sql);
        }
        
        /**
         * Выполнение кастомного sql запроса
         * 
         * @param string $sql строка содержащая sql запрос
         * @return mixed 
         */
        final public function performQuery($sql)
        {
            return $this->sqlQuery($sql);
        }
    }

