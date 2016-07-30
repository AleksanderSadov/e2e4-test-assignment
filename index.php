<?php
    require_once "config.php";
    
    function my_autoloader($class)
    {
        include ROOT_DIR . "classes/" . $class . ".php";
    }
    spl_autoload_register("my_autoloader");
    
    $formhandler = new FormHandler();
    $formhandler->CheckServerPost();
    
    $page = new GeneralPage();
    header("Location: test.php");
    
    $page->header_content = "E2E4 TEST ASSIGNMENT";
    
    // main section
    if (isset($_GET['navigation']))
    {
        $navigation = filter_input(
                INPUT_GET,
                "navigation",
                FILTER_SANITIZE_STRING);
        switch($navigation)
        {
            default: 
                $page->NavigateToNewPage("main_page");
                break;
            case "select_message":
                $page->NavigateToNewPage("select_message_page");
                break;
            case "add_message":
                $page->NavigateToNewPage("add_message_page");
                break;
            case "edit_message":
                $page->NavigateToNewPage("edit_message_page");
                break;
        }
    }
    else
    {
        $page->NavigateToNewPage("main_page");
    }
    
    $page->footer_content = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
    $page->Render();
?>
