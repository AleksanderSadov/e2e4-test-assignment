<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li>
            <?= $this->Html->link(__('View Comment'), [
                'controller' => 'Comments',
                'action' => 'view',
                $comment->id
            ])
            ?>
        </li>
        <li><?= $this->Form->postLink(
                __('Delete Comment'),
                ['action' => 'delete', $comment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?></li>
        <?php if($loggedUser['role'] === 'admin'): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="col-sm-9">
    <?= $this->Form->create($comment) ?>
    <fieldset>
        <legend><?= __('Edit Comment') ?></legend>
        <?php
            echo $this->Form->input('text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit Comment')) ?>
    <?= $this->Form->end() ?>
</div>
