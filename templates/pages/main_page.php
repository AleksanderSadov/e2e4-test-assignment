<!DOCTYPE html>
<html lang="ru">
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title><?php $this->title; ?></title>
        <?php $this->LoadStylesheet(); ?>
        <?php $this->LoadScript(); ?>
    </head>
    
    <body>
        
        <div id="whole_page">
            
            <div id="header_section">
                <?php $this->LoadTemplate("header"); ?>
                <?php $this->LoadTemplate("hidden_form"); ?>
            </div>
            
            <div id="main_section">
                <?php $this->LoadTemplate("main_section_header"); ?>
                <?php $this->RequestItem("all_messages"); ?>
            </div>
            
            <div id="sidebar_right">
                <?php $this->LoadTemplate("user_window"); ?>
                <?php $this->LoadTemplate("add_button"); ?>
            </div>
            
            <div id="footer_section">
                <?php $this->LoadTemplate("footer"); ?>

            </div>
            
        </div>
        
    </body>
</html>