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
            $user = $this->Users->generateHash($user);
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user) && $this->Postal->confirmRegistration($user)) {
                $this->Flash->success(__('The account has been created.'));
                $this->Flash->success(__('Check your email for confirmation link.'));

                return $this->redirect(['controller' => 'Messages', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The account could not be created. Please, try again.'));
            }
        }
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function verify()
    {
        $this->autoRender = false;
        if (!empty($this->request->param('hash')) && !empty($this->request->param('email'))) {
            $hash = $this->request->param('hash');
            $email = $this->request->param('email');
            
            $user = $this->Users->find('unactivated', ['hash' => $hash, 'email' => $email]);
            if (!empty($user)
                    && ($user = $this->Users->generateHash($user))
                    && ($user = $this->Users->patchEntity($user, ['role' => 'author']))
                    && $this->Users->save($user)) {
                $this->Flash->success(__('The account has been activated. Use your credentials to login.'));
                
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $this->Flash->error(__('The url is either invalid or you already have activated your account.'));
                
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        } 
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your account has been edited.'));

                return $this->redirect(['action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->deny();
        $this->Auth->allow([
            'registration', 'logout', 'verify',
            'view', 'restorePassword', 'changePassword']);
    }

    public function isAuthorized($user)
    {
        if ($this->request->action === 'edit') {
            $editedUser = $this->Users->get($this->request->params['pass'][0]);
            if ($editedUser['id'] === $user['id']) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    
    public function restorePassword()
    {
        if ($this->request->is('post') && !empty($this->request->data['email'])) {
            $user = $this->Users->find()
                    ->where(['Users.email =' => $this->request->data['email']])
                    ->first();
            if (!empty($user)
                    && ($user = $this->Users->generateHash($user))
                    && $this->Users->save($user)
                    && $this->Postal->restorePassword($user)) {
                $this->Flash->success(__('Email with link to restore password has been sent.'));
            } else {
                $this->Flash->error(__('User with this email cannot be found.'));
            }
        }
    }
    
    public function changePassword()
    {
        if (!empty($this->request->param('hash'))
                && !empty($this->request->param('email'))
                && !empty($this->Users->find('hashed', [
                    'hash' => $this->request->param('hash'),
                    'email' => $this->request->param('email')]))) {
            $user = $this->Users->find('hashed', [
                'hash' => $this->request->param('hash'),
                'email' => $this->request->param('email')]);
            
            if ($this->request->is('post')
                    && !empty($this->request->data['password'])
                    && ($user = $this->Users->generateHash($user))
                    && ($user = $this->Users->patchEntity($user, $this->request->data))
                    && $this->Users->save($user)) {
                $this->Flash->success(__('Password has been successfully changed.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        } else {
           $this->Flash->error(__('The url is invalid.'));
                    
           return $this->redirect(['controller' => 'Messages', 'action' => 'index']);
        }
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
