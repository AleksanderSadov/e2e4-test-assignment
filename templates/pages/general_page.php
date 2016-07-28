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
                <?php $this->AddElement("header"); ?>
            </div>
            
            <div id="main_section">
                <?php $this->AddElement("main_section_header"); ?>
                <?php $this->AddRequestedElement("all_messages"); ?>
            </div>
            
            <div id="sidebar_right">
                <?php $this->AddElement("user_window"); ?>
                <?php $this->AddElement("add_button"); ?>
            </div>
            
            <div id="footer_section">
                <?php $this->AddElement("footer"); ?>
            </div>
            
        </div>
        
    </body>
</html>