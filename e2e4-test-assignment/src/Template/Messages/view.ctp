<div class="row">
    <nav class="col-sm-3">
        <ul class="nav nav-pills nav-stacked">
            <?php if(isset($loggedUser) AND $loggedUser['id'] === $message->user->id): ?>
            <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
            <?php endif; ?>
            <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add', $message->id]) ?> </li>
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
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($message->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($message->modified) ?></td>
            </tr>
        </table>
        <hr />
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($message->text)); ?>
        <hr />
        <div>
            <h4><?= __('Related Comments') ?></h4>
            <?php if (!empty($message->comments)): ?>
            <table class="table table-stripped table-hover">
                <tr>
                    <th scope="col"><?= __('User') ?></th>
                    <th scope="col"><?= __('Text') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($message->comments as $comments): ?>
                <tr>
                    <td><?= $this->Html->link($comments->user->username, ['controller' => 'Users', 'action' => 'view', $comments->user->id]) ?></td>
                    <td><?= h($comments->text) ?></td>
                    <td><?= h($comments->created) ?></td>
                    <td><?= h($comments->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                        <?php if(isset($loggedUser) AND $loggedUser['id'] === $comments->user->id): ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>
