<div class="row">
    <div id="main_section" class="col-10" >
        <?php $this->loadTemplate("message_header"); ?>
        <?php $this->loadTemplate("message_text"); ?>
        <hr />
        <?php $this->loadTemplate("comment_field"); ?>
        <?php foreach($this->vars['message']['comments'] as $comment): ?>
            <?php $this->vars['comment'] = $comment; ?>
            <?php $this->loadTemplate("comment"); ?>
        <?php endforeach; ?>
    </div>

    <div id="sidebar_right" class="col-2" >
        <?php $this->loadTemplate("user_window"); ?>
        <?php $this->loadTemplate("add_button"); ?>
        <?php $this->loadTemplate("edit_button"); ?>
        <?php $this->loadTemplate("delete_button"); ?>
    </div>
</div>

