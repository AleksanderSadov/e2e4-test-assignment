<?php

class ControllerEditMessage extends Controller
{
    public function View()
    {
        $page = new MainPage();

        $message_data = new MessagesTable();
        $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
        $selected_message = $message_data->GetSpecificMessageFull($id);

        $page->main_template = "editor_page";
        $page->title = "E2E4 TEST ASSIGNMENT";
        $page->templates['main_section_header']['content'] = "Редактор сообщений";
        $page->templates['editor']['form_action'] = 
                "index.php?controller=EditMessage&action=Edit&id='$id'";
        $page->templates['editor']['legend'] = "Редактирование сообщения";
        $page->templates['editor']['header'] = $selected_message->header;
        $page->templates['editor']['brief'] = $selected_message->brief;
        $page->templates['editor']['text'] = $selected_message->text;
        $page->templates['editor']['submit_legend'] = "Редактировать сообщение";
        $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
        $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
        
        $page->Render();
    }
    
    public function Edit()
    {
        $message_data = new MessagesTable();

        $header = filter_input(INPUT_POST, "input_header", 
                FILTER_SANITIZE_STRING);
        $brief = filter_input(INPUT_POST, "input_brief", 
                FILTER_SANITIZE_STRING);
        $text = filter_input(INPUT_POST, "input_text", 
                FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
        
        $message_data->UpdateMessage($id, $header, $brief, $text);
        
        header("Location: index.php?controller=SelectMessage&action=View&id='$id'");
    }
}
