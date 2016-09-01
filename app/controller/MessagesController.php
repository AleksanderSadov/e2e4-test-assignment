<?php
class MessagesController extends Controller
{
    public function index()
    {
        $this->view->vars["messages_count"] = $this->model->count();
        $this->view->vars["messages"] = $this->model->getAll();
    }
    
    public function view()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $comment_data = new CommentsTable();
            $comment = new Comment($this->data['post']);
            $comment_data->insert($comment);       
        }
        $this->view->vars['message'] = $this->model->getWithComments($this->data['get']['id']);
    }
    
    public function delete()
    {
        $this->model->delete($this->data['get']['id']);
        $this->redirect("index.php?controller=Messages&action=Index");
    }
    
    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $message = new Message($this->data['post']);
            $this->model->insert($message);
            $this->redirect("index.php?controller=Messages&action=Index");
        }
    }
    
    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $this->model->update($this->data['get']['id'], $this->data['post']);
            $this->redirect("index.php?controller=Messages&action=View&id={$this->data['get']['id']}");
        }
        $this->view->vars['message'] = $this->model->get($this->data['get']['id']);
    }
}
