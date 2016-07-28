<!DOCTYPE html>
<html lang="ru">
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title><?php echo $this->title; ?></title>
        <?php $this->LoadStylesheet(); ?>
        <?php $this->LoadScript(); ?>
    </head>
    
    <body>
        
        <div id="whole_page">
            
            <div id="header_section">
                <?php echo $this->AddElement("header"); ?>
            </div>
            
            <div id="main_section">
                <?php echo $this->AddElement("main_section_header", "Hello"); ?>
                <?php echo $this->main_content; ?>
            </div>
            
            <div id="sidebar_right">
                <?php echo $this->AddElement("user_window"); ?>
                <?php echo $this->AddElement("add_button"); ?>
            </div>
            
            <div id="footer_section">
                <?php echo $this->AddElement("footer"); ?>
            </div>
            
        </div>
        
    </body>
</html>