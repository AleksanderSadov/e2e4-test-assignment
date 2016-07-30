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
                $text = null,
                $author = null,
                $date = null,
                $id = null,
                $topic = null) {
            $this->text     = $text;
            $this->author   = $author;
            $this->date     = $date;
            $this->id       = $id;
            $this->topic    = $topic;
        }
        
        function getText() {
            return $this->text;
        }

        function getAuthor() {
            return $this->author;
        }

        function getDate() {
            return $this->date;
        }

        function getId() {
            return $this->id;
        }

        function getTopic() {
            return $this->topic;
        }

        function setText($text) {
            $this->text = $text;
        }

        function setAuthor($author) {
            $this->author = $author;
        }

        function setDate($date) {
            $this->date = $date;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setTopic($topic) {
            $this->topic = $topic;
        }

    }
?>