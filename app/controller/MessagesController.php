<?php
class MessagesController extends Controller
{
    public function Index()
    {
        $this->view->vars["messages_count"] = $this->model->Count();
        $this->view->vars["messages"] = $this->model->GetAll();
    }
    
    public function View()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $comment_data = new CommentsTable();
            $comment = new Comment($this->data['post']);
            $comment_data->Insert($comment);       
        }
        $this->view->vars['message'] = $this->model->GetWithComments($this->data['get']['id']);
    }
    
    public function Delete()
    {
        $this->model->Delete($this->data['get']['id']);
        $this->Redirect("index.php?controller=Messages&action=Index");
    }
    
    public function Add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $message = new Message($this->data['post']);
            $this->model->Insert($message);
            $this->Redirect("index.php?controller=Messages&action=Index");
        }
    }
    
    public function Edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $this->model->Update($this->data['get']['id'], $this->data['post']);
            $this->Redirect("index.php?controller=Messages&action=View&id={$this->data['get']['id']}");
        }
        $this->view->vars['message'] = $this->model->Get($this->data['get']['id']);
    }
}
