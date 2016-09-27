<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Mailer\Email;

/**
 * Postal component
 */
class PostalComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    public function confirmRegistration($user)
    {
        $email = new Email('dev_smtp');
        
        $result = $email->emailFormat('both')
            ->template('confirm_registration')
            ->helpers(['Html', 'Text'])
            ->viewVars(compact('user'))
            ->to($user->email)
            ->subject(__('Confirm Registration For E2E4-TEST'))
            ->send();

        return $result;
    }
    
    public function restorePassword($user)
    {
        $email = new Email('dev_smtp');
        
        $result = $email->emailFormat('both')
            ->template('restore_password')
            ->helpers(['Html', 'Text'])
            ->viewVars(compact('user'))
            ->to($user->email)
            ->subject(__('Restore password For E2E4-TEST'))
            ->send();

        return $result;
    }

    public function addUser($user, $password)
    {
        $email = new Email('dev_smtp');

        $result = $email->emailFormat('both')
            ->template('add_user')
            ->helpers(['Html', 'Text'])
            ->viewVars([
                'username' => $user->username,
                'role' => $user->role,
                'password' => $password])
            ->to($user->email)
            ->subject(__('New user For E2E4-TEST'))
            ->send();

        return $result;
    }
}
