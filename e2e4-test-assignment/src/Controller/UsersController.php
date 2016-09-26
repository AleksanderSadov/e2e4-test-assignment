<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Postal');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Comments', 'Messages', 'Comments.Messages']
        ]);
        if ($this->Auth->user('id') != null) {
            $loggedUser = $this->Auth->user('id');
            $this->set('loggedUser', $loggedUser);
        } else {
            $loggedUser = null;
            $this->set('loggedUser', $loggedUser);
        }

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function registration()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user) && $this->Postal->confirmRegistration($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'Messages', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        
        if (!empty($this->Auth->user('role'))) {
            $this->set('userRole', $this->Auth->user('role'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function verify()
    {
        if (!empty($this->request->param('hash')) && !empty($this->request->param('email'))) {
            $hash = $this->request->param('hash');
            $email = $this->request->param('email');
            
            $user = $this->Users->find('unactivated', ['hash' => $hash, 'email' => $email]);
            if (!empty($user)) {
                $this->Users->patchEntity($user, ['role' => 'author']);
                $this->Users->save($user);
                $this->Flash->success(__('The user has been activated. Use your credentials to login.'));
                
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $this->Flash->error(__('The url is either invalid or you already have activated your account.'));
                
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        } 
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['registration', 'logout', 'verify']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($user['role'] === 'unactivated') {
                    $this->Flash->error(__('You have not activated your account. Please check your email for activation link.'));
                } else {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
