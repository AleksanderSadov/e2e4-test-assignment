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
                <?php $this->AddTemplate("header"); ?>
                <?php $this->AddTemplate("hidden_form"); ?>
            </div>
            
            <div id="main_section">
                <?php $this->AddTemplate("main_section_header"); ?>
                <?php $this->RequestItem("all_messages"); ?>
            </div>
            
            <div id="sidebar_right">
                <?php $this->AddTemplate("user_window"); ?>
                <?php $this->AddTemplate("add_button"); ?>
            </div>
            
            <div id="footer_section">
                <?php $this->AddTemplate("footer"); ?>

            </div>
            
        </div>
        
    </body>
</html>