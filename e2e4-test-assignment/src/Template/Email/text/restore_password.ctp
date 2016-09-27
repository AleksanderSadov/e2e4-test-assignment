<?= __('Restore password for E2E4-TEST') ?>


<?= __('You requested to change password for user: ') ?><?= $user['username'] ?>


<?php $restoreLink = \Cake\Routing\Router::url([
    'controller' => 'users',
    'action' => 'changePassword',
    'email' => $user['email'],
    'hash' => $user['hash']
    ], true) ?>
<?= __('Please click this link to restore your password: ') . $restoreLink ?>