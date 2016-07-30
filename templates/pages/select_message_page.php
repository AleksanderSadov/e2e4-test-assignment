<!DOCTYPE html>
<html lang="ru">
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title><?php $this->title; ?></title>
        <?php $this->LoadStylesheet(); ?>
        <?php $this->LoadScript("select_message_page"); ?>
    </head>
    
    <body>
        
        <div id="whole_page">
            
            <div id="header_section">
                <?php $this->LoadTemplate("header"); ?>
            </div>
            
            <div id="main_section">
                <?php $this->LoadTemplate("main_section_header"); ?>
                <?php $this->RequestItem("selected_message"); ?>
                <?php $this->LoadTemplate("comment_field"); ?>
                <?php $this->RequestItem("all_comments"); ?>
            </div>
            
            <div id="sidebar_right">
                <?php $this->LoadTemplate("user_window"); ?>
                <?php $this->LoadTemplate("add_button"); ?>
                <?php $this->LoadTemplate("edit_button"); ?>
                <?php $this->LoadTemplate("delete_button"); ?>
            </div>
            
            <div id="footer_section">
                <?php $this->LoadTemplate("footer"); ?>
            </div>
            
        </div>
        
    </body>
</html>