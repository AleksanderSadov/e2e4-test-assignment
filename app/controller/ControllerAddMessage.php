<?php

class ControllerAddMessage extends Controller
{
    public function View()
    {
        $page = new MainPage();
        
        $page->main_template = "editor_page";
        $page->title = "E2E4 TEST ASSIGNMENT";
        $page->templates['main_section_header']['content'] = "Редактор сообщений";
        $page->templates['editor']['legend'] = "Добавление сообщения";
        $page->templates['editor']['form_action'] = "index.php?controller=AddMessage&action=Add";
        $page->templates['editor']['submit_legend'] = "Добавить сообщение";
        // as we creating new message no text should appear in textarea
        $page->templates['editor']['header'] = "";
        $page->templates['editor']['brief'] = "";
        $page->templates['editor']['text'] = "";
        $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
        $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
        
        $page->Render();
    }
    
    public function Add()
    {
        $message_data = new MessagesTable();

        $header = filter_input(INPUT_POST, "input_header", 
                FILTER_SANITIZE_STRING);
        $brief = filter_input(INPUT_POST, "input_brief", 
                FILTER_SANITIZE_STRING);
        $text = filter_input(INPUT_POST, "input_text", 
                FILTER_SANITIZE_STRING);

        $message = new Message($header, $brief, $text);
        $message_data->Insert($message);
        
        header("Location: index.php?controller=Main&action=View");
    }
}
