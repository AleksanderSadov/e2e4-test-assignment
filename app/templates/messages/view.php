<div class="row">
    <div id="main_section" class="col-10" >
        <?php $this->RequestItem("selected_message"); ?>
        <hr />
        <?php $this->LoadTemplate("comment_field"); ?>
        <?php $this->RequestItem("all_comments"); ?>
    </div>

    <div id="sidebar_right" class="col-2" >
        <?php $this->LoadTemplate("user_window"); ?>
        <?php $this->LoadTemplate("add_button"); ?>
        <?php $this->LoadTemplate("edit_button"); ?>
        <?php $this->LoadTemplate("delete_button"); ?>
    </div>
</div>

