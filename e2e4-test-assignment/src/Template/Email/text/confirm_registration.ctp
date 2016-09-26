<?= __('Thanks for signing up to E2E4-TEST') ?>


<?= __('Your account has been created, you can login with the following username after you have activated your account by pressing the url below.') ?>


<?= __('Username: ')?><?= $user['username'] ?>


<?php $activateLink = \Cake\Routing\Router::url([
    'controller' => 'users',
    'action' => 'verify',
    'email' => $user['email'],
    'hash' => $user['hash']
    ], true) ?>
<?= __('Please click this link to activate your account: ') . $activateLink ?>