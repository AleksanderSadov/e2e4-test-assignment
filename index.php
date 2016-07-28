<?php
    require_once "config.php";
    
    function my_autoloader($class)
    {
        include ROOT_DIR . "/classes/" . $class . ".php";
    }
    spl_autoload_register("my_autoloader");
    
    $page = new GeneralPage();
    $message_data = new MessageData();
    
    // header
    $page->header_content = "E2E4 TEST ASSIGNMENT";
    
    // main section
    $page->vars["main_section_header"] = "Всего сообщений: " .
    $message_data->CountMessages();
    $messages = $message_data->SelectMessages(array("id, header", "brief"));
    foreach ($messages as $message)
    {
       $page->main_content .= $message_data->ConstructHtml($message); 
    }
    
    // footer
    $page->footer_content = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
    
    $page->Render();
?>
