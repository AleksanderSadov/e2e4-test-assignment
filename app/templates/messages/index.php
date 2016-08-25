<div class="row">
    <div id="main_section" class="col-10" >
        <?php $this->LoadTemplate("main_section_header"); ?>
        <?php foreach($this->templates['messages'] as $message): ?>
            <?php $this->templates['message'] = $message; ?>
            <?php $this->LoadTemplate("message_header"); ?>
            <?php $this->LoadTemplate("message_brief"); ?>
        <?php endforeach; ?>
    </div>

    <div id="sidebar_right" class="col-2" >
        <?php $this->LoadTemplate("user_window"); ?>
        <?php $this->LoadTemplate("add_button"); ?>
    </div>
</div>