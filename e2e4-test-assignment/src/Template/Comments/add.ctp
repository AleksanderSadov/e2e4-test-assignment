<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="col-sm-9">
    <?= $this->Form->create($comment) ?>
    <fieldset>
        <legend><?= __('Add Comment') ?></legend>
        <?php
            echo $this->Form->input('text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add Comment')) ?>
    <?= $this->Form->end() ?>
</div>
