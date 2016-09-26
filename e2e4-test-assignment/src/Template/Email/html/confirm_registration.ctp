<strong><?= __('Thanks for signing up to E2E4-TEST') ?></strong><br />
<span><?= __('Your account has been created, you can login with the following username after you have activated your account by pressing the url below.') ?></span><br />
<hr>
<strong><?= __('Username: ')?></strong><?= $user['username'] ?>
<hr>
<?php $activateLink = \Cake\Routing\Router::url([
    'controller' => 'users',
    'action' => 'verify',
    'email' => $user['email'],
    'hash' => $user['hash']
    ], true) ?>
<span><?= __('Please click this link to activate your account: ') . $this->Html->link($activateLink, $activateLink) ?></span>