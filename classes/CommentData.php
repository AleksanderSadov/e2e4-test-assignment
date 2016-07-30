<?php
    class CommentData extends ObjectData
    {
        private $table_name;
        
        public function __construct()
        {
            $this->table_name = "comments";
            parent::__construct(
                    "localhost",
                    "e2e4-test-assignment",
                    "0mfB4Vxs9jiOaYCf",
                    "e2e4-test-assignment",
                    $this->table_name);
        }
        
        public function Count() {
            return parent::Count();
        }

        public function Delete($column, $value) {
            return parent::Delete($column, $value);
        }

        public function Insert($object) {
            return parent::Insert($object);
        }

        protected function ProcessResult($result) {
            return parent::ProcessResult($result);
        }

        public function Select(array $selection, array $where_clause = NULL, array $order_by = NULL, $type_of_order = NULL) {
            return parent::Select($selection, $where_clause, $order_by, $type_of_order);
        }

        public function Update(array $set_assoc, array $where) {
            return parent::Update($set_assoc, $where);
        }
    }
?>