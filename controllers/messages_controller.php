<?php
    
    function DisplayMessages($messages)
    {
        $content="";
        foreach ($messages as $message)
        {
            $header = "<a href='" . getenv('APP_ROOT_PATH') . "page.php' "
                    . "class='message_header' id='" . $message->id . "'>"
                    . "<h2>" . $message->header . "</h2></a>";
            $brief = "<div class='message_brief'>" . $message->brief . "</div>";
            $content .= "<div class='message'>" . $header . $brief . "</div>";
        }
        return $content;
    }
    
?>

