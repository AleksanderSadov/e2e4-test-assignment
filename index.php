<?php
    // classes auto loader
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
    
    $page = new Page();
    $formhandler = new FormHandler($page->forms);
    // process submitted forms
    $formhandler->CheckServerPost();
    
    // navigation system determines required data computation
    if (isset($_GET['navigation']))
    {
        $navigation = filter_input(
                INPUT_GET,
                "navigation",
                FILTER_SANITIZE_STRING);
        $path = ROOT_DIR . $navigation . "_page.php";
        if (file_exists($path))
        {
            $page->GoToNewPage($navigation);
        }
        else
        {
            $page->GoToNewPage("main");
        }
    }
    else
    {
        $page->GoToNewPage("main");
    }
    
    // header and footer are the same for all pages
    $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
    $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
    
    // load page template
    $page->Render();
?>
