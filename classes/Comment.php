<?php
    class Comment
    {
        public $content;
        public $date;
        
        function __construct(
                $content = null,
                $date = null) 
        {
            $this->content  = $content;
            $this->date     = $date;
        }
    }
?>