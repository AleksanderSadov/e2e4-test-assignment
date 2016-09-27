<div class="users form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
    
<?= $this->Html->link('Restore Password', ['controller' => 'users', 'action' => 'restorePassword'], [
    'class' => 'button'
]) ?>
</div>