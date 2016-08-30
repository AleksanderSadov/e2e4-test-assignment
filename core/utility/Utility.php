<?php
class Utility
{
    /**
     * Загрузка файла
     * 
     * @param string $file_path путь к файлу
     * @return boolean true в случае загрузки файла, false иначе
     */
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
