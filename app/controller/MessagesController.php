<?php

class MessagesController extends Controller
{
    public function Index()
    {
        $all_messages = $this->model->Get();
        $messages_count = $this->model->Count();
        
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
        
        $selected_message = $this->model->GetWithComments($this->data['get']['id']);
        
        $this->view->templates["edit_button"]["message_id"] = $this->data['get']['id'];
        $this->view->templates["delete_button"]["message_id"] = $this->data['get']['id'];
        $this->view->templates["comment_field"]["message_id"] = $this->data['get']['id'];
        $this->view->templates["message"] = $selected_message;
        $this->view->templates["comments"] = $selected_message->comments;
    }
    
    public function Delete()
    {
        $this->model->Delete($this->data['get']['id']);
        header('Location: index.php?controller=Messages&action=Index');
    }
    
    public function Add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $message = new Message($this->data['post']);
            $this->model->Insert($message);
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
            $this->model->Update($this->data['get']['id'], $this->data['post']);
            header("Location: index.php?controller=Messages&action=View&id={$this->data['get']['id']}");
        }
        
        $selected_message = $this->model->Get($this->data['get']['id']);

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
