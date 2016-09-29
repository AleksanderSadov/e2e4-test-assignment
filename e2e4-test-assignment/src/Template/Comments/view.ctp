<nav class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <?php if(isset($loggedUser) AND $loggedUser['id'] === $comment->user->id): ?>
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="col-sm-9">
    <h3><?= __('Comment #') . h($comment->id) ?></h3>
    <table class="table table-stripped text-right table-hover">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $comment->has('user') ? $this->Html->link($comment->user->username, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $comment->has('message') ? $this->Html->link($comment->message->header, ['controller' => 'Messages', 'action' => 'view', $comment->message->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Text') ?></th>
            <td><?= h($comment->text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($comment->modified) ?></td>
        </tr>
    </table>
</div>
