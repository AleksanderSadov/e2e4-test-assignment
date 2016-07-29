<?php
    class Comment
    {
        public $text;
        public $author;
        public $date;
        public $id;
        public $topic;
        
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

    }
?>