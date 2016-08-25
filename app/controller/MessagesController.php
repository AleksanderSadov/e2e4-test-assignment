<?php

class MessagesController extends Controller
{
    public function Index()
    {
        $message_data = new MessagesTable();
        $all_messages = $message_data->Get();
        $messages_count = $message_data->Count();
        
        $this->view->templates["main_section_header"]["content"] = "Всего сообщений: $messages_count";
        $this->view->templates["messages"] = $all_messages;
    }
    
    public function View()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $comment_data = new CommentsTable();
            $comment = new Comment($this->data['post']);
            $comment_data->Insert($comment);       
        }
        $message_data = new MessagesTable();
        $selected_message = $message_data->GetWithComments($this->data['get']['id']);
        
        $this->view->templates["edit_button"]["message_id"] = $this->data['get']['id'];
        $this->view->templates["delete_button"]["message_id"] = $this->data['get']['id'];
        $this->view->templates["comment_field"]["message_id"] = $this->data['get']['id'];
        $this->view->templates["message"] = $selected_message;
        $this->view->templates["comments"] = $selected_message->comments;
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
        $this->view->templates['main_section_header']['content'] = "Редактор сообщений";
        $this->view->templates['editor']['legend'] = "Добавление сообщения";
        $this->view->templates['editor']['form_action'] = "index.php?controller=Messages&action=Add";
        $this->view->templates['editor']['submit_legend'] = "Добавить сообщение";
        // as we creating new message no text should appear in textarea
        $this->view->templates['editor']['header'] = "";
        $this->view->templates['editor']['brief'] = "";
        $this->view->templates['editor']['text'] = "";
    }
    
    public function Edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $message_data = new MessagesTable();
            $message_data->Update($this->data['get']['id'], $this->data['post']);
            header("Location: index.php?controller=Messages&action=View&id={$this->data['get']['id']}");
        }
        $message_data = new MessagesTable();
        $selected_message = $message_data->Get($this->data['get']['id']);

        $this->view->templates['main_section_header']['content'] = "Редактор сообщений";
        $this->view->templates['editor']['form_action'] = 
                "index.php?controller=Messages&action=Edit&id={$this->data['get']['id']}";
        $this->view->templates['editor']['legend'] = "Редактирование сообщения";
        $this->view->templates['editor']['header'] = $selected_message->header;
        $this->view->templates['editor']['brief'] = $selected_message->brief;
        $this->view->templates['editor']['text'] = $selected_message->text;
        $this->view->templates['editor']['submit_legend'] = "Редактировать сообщение";
    }
}
