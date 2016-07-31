<?php
    class Comment
    {
        public $text;
        public $author;
        public $date;
        public $id;
        public $topic;
        
        /** @param
         * 
         * @param string     $text
         * @param string     $author
         * @param date       $date
         * @param int        $id
         * @param int        $topic
         */
        function __construct(
                $author = null,
                $text = null,
                $topic = null,
                $date = null,
                $id = null) {
            $this->text     = $text;
            $this->author   = $author;
            $this->date     = $date;
            $this->id       = $id;
            $this->topic    = $topic;
        }
    }
?>