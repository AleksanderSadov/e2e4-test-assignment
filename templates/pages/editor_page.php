<!DOCTYPE html>
<html lang="ru">
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title><?php $this->title; ?></title>
        <?php $this->LoadStylesheet(); ?>
    </head>
    
    <body>
        
        <div id="whole_page">
            
            <div id="header_section">
                <?php $this->LoadTemplate("header"); ?>
            </div>
            
            <div id="main_section">
                <?php $this->LoadTemplate("main_section_header"); ?>
                <?php $this->LoadTemplate("editor"); ?>
            </div>
            
            <div id="sidebar_right">
                <?php $this->LoadTemplate("user_window"); ?>
            </div>
            
            <div id="footer_section">
                <?php $this->LoadTemplate("footer"); ?>
            </div>
            
        </div>
        
    </body>
</html>