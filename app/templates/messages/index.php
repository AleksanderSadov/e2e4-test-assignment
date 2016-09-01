<div class="row">
    <div id="main_section" class="col-10" >
        <?php $this->vars['main_section_header']['content'] = "Всего сообщений: {$this->vars['messages_count']}"; ?>
        <?php $this->loadTemplate("main_section_header"); ?>
        <?php foreach($this->vars['messages'] as $message): ?>
            <?php $this->vars['message'] = $message; ?>
            <?php $this->loadTemplate("message_header"); ?>
            <?php $this->loadTemplate("message_brief"); ?>
        <?php endforeach; ?>
    </div>

    <div id="sidebar_right" class="col-2" >
        <?php $this->loadTemplate("user_window"); ?>
        <?php $this->loadTemplate("add_button"); ?>
    </div>
</div>