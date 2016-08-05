<?php
    // Load config
    if (file_exists("app/config.php"))
    {
        require_once ("app/config.php");
    }
    else
    {
        die ("Не удалось загрузисть конфиг файл");
    }
    
    // classes auto loader
    function my_autoloader($class_name)
    {
        //class directories
        $directories = array(
            '../core/controller/',
            '../core/model/database/',
            '../core/model/entity/',
            '../core/model/table/',
            '../core/utility/',
            '../core/view/',
            
            '/controller/',
            '/model/database/',
            '/model/entity/',
            '/model/table/',
            '/view/',
        );
       
        //for each directory
        foreach($directories as $directory)
        {
            $path = ROOT_DIR . $directory . $class_name . ".php";
            //see if the file exsists
            if(file_exists($path))
            {
                require_once($path);
                //only require the class once, so quit after to save effort (if you got more, then name them something else
                return;
            }
        }
        // if class exists function would've returned before this 'die' statement
        die ("Не удалось загрузить класс: " . $path);
    }
    spl_autoload_register("my_autoloader");
    
    $page = new MainPage();
    $form_controller = new FormController();
    $navigation_controller = new NavigationController();
    
    // process submitted forms
    $form_controller->CheckServerPost();
    
    // navigation controller determines required data computation
    if (isset($_GET['navigation']))
    {
        $page->LoadPage($navigation_controller->FindPage("navigation"));
    }
    else
    {
        $page->LoadPage(ROOT_DIR . "main_page.php");
    }
    
    // header and footer are the same for all pages
    $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
    $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
    
    // load page template
    $page->Render();
?>