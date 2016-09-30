<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li>
            <?= $this->Html->link(__('View Message'), [
                'controller' => 'Messages',
                'action' => 'view',
                $message->id
            ])
            ?>
        </li>
        <li><?= $this->Form->postLink(
                __('Delete Message'),
                ['action' => 'delete', $message->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <?php if($loggedUser['role'] === 'admin'): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="col-sm-9">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Edit Message') ?></legend>
        <?php
            echo $this->Form->input('header');
            echo $this->Form->input('text');
            echo $this->Form->input('brief');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit Message')) ?>
    <?= $this->Form->end() ?>
</div>
