<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email.') ?></legend>
        <?= $this->Form->input('email') ?>
    </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>