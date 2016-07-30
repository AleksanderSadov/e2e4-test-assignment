<?php
    function my_autoloader($class)
    {
        if (file_exists("classes/" . $class . ".php"))
        {
            require_once ("classes/" . $class . ".php");
        }
        else
        {
            if (file_exists("classes/basic/" . $class . ".php"))
            {
                require_once("classes/basic/" . $class . ".php");
            }
            else
            {
                die("Не удалось подключить класс: " . $class);
            }
        }
    }
    spl_autoload_register("my_autoloader");
    
    $page = new GeneralPage();
    $page->setMain_template("test_page");
    $message_data = new ObjectData("messages", "Message");
    
    $page->templates["header"]["content"] = "TEST PAGE";
    
    $message_count = $message_data->Count();
    $page->templates["main_section_header"]["content"] = "Всего сообщений: " . 
            $message_count;
    
    $page->templates["add_button"]["content"]   = "Добавить <br /> сообщение";
    $page->templates["add_button"]["method"]    = "GET";
    $page->templates["add_button"]["action"]    = "index.php";
    $page->templates["add_button"]["name"]      = "navigation";
    $page->templates["add_button"]["value"]     = "add_message";
    
    $all_messages = $message_data->Select("header, brief");
    $page->requests["all_messages"] = $all_messages;
    
    $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
    
    
    $page->Render();
?>
