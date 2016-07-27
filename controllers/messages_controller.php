<?php
    
    function DisplayMessages($messages, $need_header, $need_brief, $need_text)
    {
        $content="";
        if (is_array($messages))
        {
        foreach ($messages as $message)
            {
                $content .= ConstructMessageContent($message,
                        $need_header, $need_brief, $need_text);
            }
        }
        else
        {
            $content .= ConstructMessageContent($messages,
                    $need_header, $need_brief, $need_text);
        }
        return $content;
    } 
   
    function ConstructMessageContent($message, $header, $brief, $text)
    {
        $buffer = "";
        if ($header)
        {
            $buffer .= "<div class='message_header boxed_content'"
                    . "id=" . $message->id . ">"
                    . "<h2>" . $message->header . "</h2></div>";
        }
        if ($brief)
        {
            $buffer .= "<div class='message_brief boxed_content"
                . " boxed_border'>" . $message->brief . "</div>";
        }
        if ($text)
        {
            $buffer .= "<div class='message_brief boxed_content"
                . " boxed_border'>" . $message->text . "</div>";
        }
        
        $html = "<div class='message_content'>"
                . $buffer . "</div>";
        return $html;
    }
    
?>

