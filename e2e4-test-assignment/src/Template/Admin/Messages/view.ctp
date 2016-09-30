<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add', $message->id]) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <?php if($loggedUser['role'] === 'admin'): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="col-sm-9">
    <h3><?= h($message->header) ?></h3>
    <table class="table table-stripped text-right table-hover">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $message->has('user') ? $this->Html->link($message->user->username, ['controller' => 'Users', 'action' => 'view', $message->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Header') ?></th>
            <td><?= h($message->header) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brief') ?></th>
            <td><?= h($message->brief) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($message->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($message->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($message->text)); ?>
    </div>
    <div>
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($message->comments)): ?>
        <table class="table table-striped table-hover">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($message->comments as $comments): ?>
            <tr>
                <td><?= h($comments->id) ?></td>
                <td><?= $this->Html->link($comments->user->username, ['controller' => 'Users', 'action' => 'view', $comments->user->id]) ?></td>
                <td><?= h($comments->text) ?></td>
                <td><?= h($comments->created) ?></td>
                <td><?= h($comments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
