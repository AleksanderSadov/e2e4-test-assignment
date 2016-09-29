<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="col-sm-9">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Add Message') ?></legend>
        <?php
            echo $this->Form->input('header');
            echo $this->Form->input('text');
            echo $this->Form->input('brief');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add Message')) ?>
    <?= $this->Form->end() ?>
</div>
