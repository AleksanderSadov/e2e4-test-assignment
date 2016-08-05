<?php
class Utility
{
    static public function LoadFile($file_path)
    {
        if (file_exists($file_path) )
        {
            include $file_path;
            return true;
        } 
        else 
        {
            die("Файл недоступен: " . $file_path);
            return false;
        }
    }
}
?>
