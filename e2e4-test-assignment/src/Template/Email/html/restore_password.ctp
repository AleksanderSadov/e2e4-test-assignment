<strong><?= __('Restore password for E2E4-TEST') ?></strong><br />
<?= __('You requested to change password for user: ') ?><strong><?= $user['username'] ?></strong><br />
<?php $restoreLink = \Cake\Routing\Router::url([
    'controller' => 'users',
    'action' => 'changePassword',
    'email' => $user['email'],
    'hash' => $user['hash']
    ], true) ?>
<span><?= __('Please click this link to restore your password: ') . $this->Html->link($restoreLink, $restoreLink) ?></span>