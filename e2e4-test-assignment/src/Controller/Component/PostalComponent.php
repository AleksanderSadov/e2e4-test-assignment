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
}
