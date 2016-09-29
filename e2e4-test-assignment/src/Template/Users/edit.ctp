<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="col-sm-9">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit Account') ?></legend>
        <?php
            echo $this->Form->input('username');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit Account')) ?>
    <?= $this->Form->end() ?>
</div>
