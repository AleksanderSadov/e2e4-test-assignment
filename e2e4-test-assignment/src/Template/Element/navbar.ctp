<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?= $this->fetch('title') ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link('Messages', [
                'controller' => 'Messages',
                'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Comments', [
                'controller' => 'Comments',
                'action' => 'index']) ?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Login', [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false]) ?></li>
            <li><?= $this->Html->link('Registration', [
                'controller' => 'Users',
                'action' => 'registration',
                'prefix' => false]) ?></li>
            <?php if(!empty($loggedUser)
                    AND ($loggedUser['role'] === 'admin' OR $loggedUser['role'] === 'content-manager')):
            ?>
                <li role="separator" class="divider"></li>
                <li><?= $this->Html->link('Administration', [
                'controller' => 'Messages',
                'action' => 'index',
                'prefix' => 'admin']) ?></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php if(!empty($loggedUser)): ?>
        <li><?= $this->Html->link(__('Current user: ') . $loggedUser['username'], [
                'controller' => 'Users',
                'action' => 'view', $loggedUser['id']]) ?>
        </li>
        <li><?= $this->Html->link(__('Logout'), [
                'controller' => 'Users',
                'action' => 'logout',
                'prefix' => false]) ?>
        </li>
        <?php else: ?>
        <li><?= $this->Html->link(__('Login'), [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false]) ?>
        </li>
        <?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?= $this->Html->link('Home', [
                'controller' => 'Messages',
                'action' => 'index',
                'prefix' => false]) ?></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>