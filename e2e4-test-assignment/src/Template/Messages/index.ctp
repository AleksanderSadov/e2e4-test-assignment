<div class="messages index large-9 medium-8 columns content">
    <h3><?= __('Messages') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('header') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brief') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
            <tr>
                <td><?= $message->has('user') ? $this->Html->link($message->user->username, ['controller' => 'Users', 'action' => 'view', $message->user->id]) : '' ?></td>
                <td><?= h($message->header) ?></td>
                <td><?= h($message->brief) ?></td>
                <td><?= h($message->created) ?></td>
                <td><?= h($message->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $message->id]) ?>
                    <?php if(isset($loggedUser) AND $loggedUser === $message->user->id): ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
