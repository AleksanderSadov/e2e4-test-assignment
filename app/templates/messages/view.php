<div class="row">
    <div id="main_section" class="col-10" >
        <?php $this->LoadTemplate("message_header"); ?>
        <?php $this->LoadTemplate("message_text"); ?>
        <hr />
        <?php $this->LoadTemplate("comment_field"); ?>
        <?php foreach($this->vars['message']['comments'] as $comment): ?>
            <?php $this->vars['comment'] = $comment; ?>
            <?php $this->LoadTemplate("comment"); ?>
        <?php endforeach; ?>
    </div>

    <div id="sidebar_right" class="col-2" >
        <?php $this->LoadTemplate("user_window"); ?>
        <?php $this->LoadTemplate("add_button"); ?>
        <?php $this->LoadTemplate("edit_button"); ?>
        <?php $this->LoadTemplate("delete_button"); ?>
    </div>
</div>

