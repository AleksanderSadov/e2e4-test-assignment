<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="col-sm-9">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
        ?>
        <?php if($loggedUser['role'] === 'admin'): ?>
            <?= $this->Form->input('role', [
                'options' => \App\Model\Entity\User::$roles
            ]) ?>
        <?php endif; ?>
    </fieldset>
    <?= $this->Form->button(__('Add User')) ?>
    <?= $this->Form->end() ?>
</div>
