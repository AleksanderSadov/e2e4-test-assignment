<?php
    
    function DisplayMessages($messages)
    {
        $content="";
        foreach ($messages as $message)
        {
            $header = "<div class='message_header'><h2 id='" . $message->id . "'>"
                    . $message->header . "</h2></div>";
            $brief = "<div class='message_brief'>" . $message->brief . "</div>";
            $content .= "<div class='message'>" . $header . $brief . "</div>";
        }
        return $content;
    }
    
    function DisplayWholeMessage($message)
    {
        $content="";
        $content .= "<div class='message_content'>" . $message->content . "</div>";
        return $content;
    }
    
?>

