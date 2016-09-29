<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Please enter your username and password') ?></legend>
                <?= $this->Form->input('username') ?>
                <?= $this->Form->input('password') ?>
            </fieldset>
        <?= $this->Form->button(__('Login'), ['class' => 'pull-left']); ?>
        <?= $this->Html->link('Restore Password', ['controller' => 'users', 'action' => 'restorePassword'], [
            'class' => 'btn btn-primary pull-right'
        ]) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <span><?= __('Don\'t have an account? ') . $this->Html->link('Sign Up Here', [
            'action' => 'registration'
            ])?>
        </span>
    </div>
</div>