<div class="row">
    <div id="main_section" class="col-10" >
        <?php $this->vars['main_section_header']['content'] = "Редактор сообщений"; ?>
        <?php $this->loadTemplate("main_section_header"); ?>
        <?php $this->vars['editor']['form_action'] = "index.php?controller=Messages&action=Edit&id={$this->vars['message']['id']}"; ?>
        <?php $this->vars['editor']['legend'] = "Редактирование сообщения"; ?>
        <?php $this->vars['editor']['submit_legend'] = "Редактировать сообщение"; ?>
        <?php $this->loadTemplate("editor"); ?>
    </div>

    <div id="sidebar_right" class="col-2" >
        <?php $this->loadTemplate("user_window"); ?>
    </div>
</div>