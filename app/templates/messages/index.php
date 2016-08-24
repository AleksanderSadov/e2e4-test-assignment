<div class="row">
    <div id="main_section" class="col-10" >
        <?php $this->LoadTemplate("main_section_header"); ?>
        <?php $this->RequestItem("all_messages"); ?>
    </div>

    <div id="sidebar_right" class="col-2" >
        <?php $this->LoadTemplate("user_window"); ?>
        <?php $this->LoadTemplate("add_button"); ?>
    </div>
</div>