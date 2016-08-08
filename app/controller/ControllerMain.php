<?php

class ControllerMain extends Controller
{
    public function View()
    {
        $page = new MainPage();
        $message_data = new MessagesTable();
        
        $all_messages = $message_data->GetAllMessagesBrief();
        $messages_count = $message_data->Count();
        
        $page->main_template = "main_page";
        $page->title = "E2E4 TEST ASSIGNMENT";
        $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
        $page->templates["main_section_header"]["content"] = "Всего сообщений: $messages_count";
        $page->requests["all_messages"] = $all_messages;
        $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
        $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
        
        $page->Render();
    }
}
