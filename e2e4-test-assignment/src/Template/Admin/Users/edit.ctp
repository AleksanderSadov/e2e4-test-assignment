<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li>
            <?= $this->Html->link(__('View User'), [
                'controller' => 'Users',
                'action' => 'view',
                $user->id
            ])
            ?>
        </li>
        <li><?= $this->Form->postLink(
                __('Delete User'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="col-sm-9">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit User')) ?>
    <?= $this->Form->end() ?>
</div>
