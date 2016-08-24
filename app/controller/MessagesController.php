<?php

class MessagesController extends Controller
{
    public function Index()
    {
        $page = new MainPage();
        $message_data = new MessagesTable();
        
        $all_messages = $message_data->Get(['id', 'header', 'brief']);
        $messages_count = $message_data->Count();
        
        $page->main_template = "messages/index";
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
    
    public function View()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $comment_data = new CommentsTable();
            $comment = new Comment($this->data['post']);
            $comment_data->Insert($comment);       
        }
        
        $id = filter_input(INPUT_GET, "id", 
            FILTER_SANITIZE_NUMBER_INT);
        
        $page = new MainPage();
        $message_data = new MessagesTable();
        
        $selected_message = $message_data->GetWithComments(['id', 'header', 'text'], $id);
        
        $page->main_template = "messages/view";
        $page->title = "E2E4 TEST ASSIGNMENT";
        $page->templates["edit_button"]["message_id"] = $id;
        $page->templates["delete_button"]["message_id"] = $id;
        $page->templates["comment_field"]["message_id"] = $id;
        $page->requests["selected_message"] = $selected_message;
        $page->requests["all_comments"] = $selected_message->comments;
        $page->templates["header"]["content"] = "E2E4 TEST ASSIGNMENT";
        $page->templates["footer"]["content"] = "Разработчик: Александр Садов<br />" . 
            "Последние изменения: " .
            date(DATE_RFC850, filemtime(__FILE__));
        
        $page->Render();
    }
    
    public function Delete()
    {
        $message_data = new MessagesTable();
        $message_data->Delete("id='{$this->data['get']['id']}'");
        header('Location: index.php?controller=Messages&action=Index');
    }
    
    public function Add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $message_data = new MessagesTable();
            $message = new Message($this->data['post']);
            $message_data->Insert($message);
            header("Location: index.php?controller=Messages&action=Index");            
        }
        
        $page = new MainPage();
        
        $page->main_template = "messages/add";
        $page->title = "E2E4 TEST ASSIGNMENT";
        $page->templates['main_section_header']['content'] = "Редактор сообщений";
        $page->templates['editor']['legend'] = "Добавление сообщения";
        $page->templates['editor']['form_action'] = "index.php?controller=Messages&action=Add";
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
    
    public function Edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $message_data = new MessagesTable();
            $message_data->Update($this->data['get']['id'], $this->data['post']);
            header("Location: index.php?controller=Messages&action=View&id='{$this->data['get']['id']}'");
        }
        
        $page = new MainPage();

        $message_data = new MessagesTable();
        $selected_message = $message_data->Get(['id', 'header', 'brief', 'text'], $this->data['get']['id']);

        $page->main_template = "messages/edit";
        $page->title = "E2E4 TEST ASSIGNMENT";
        $page->templates['main_section_header']['content'] = "Редактор сообщений";
        $page->templates['editor']['form_action'] = 
                "index.php?controller=Messages&action=Edit&id={$this->data['get']['id']}";
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
}
