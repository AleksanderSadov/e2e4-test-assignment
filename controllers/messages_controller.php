<?php
    
    function DisplayMessages($messages)
    {
        foreach ($messages as $message)
        {
            $header = "<h2 class='message_header'>" . $message->header . "</h2>";
            $brief = "<div class='message_brief'>" . $message->brief . "</div>";
            $content .= "<div class='message'>" . $header . $brief . "</div>";
        }
        return $content;
    }
    
?>

