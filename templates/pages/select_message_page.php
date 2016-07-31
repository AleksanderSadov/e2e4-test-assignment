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
            
            <div class="row">
                <div id="header_section" class="col-12">
                    <?php $this->LoadTemplate("header"); ?>
                </div>
            </div>
            
            <div class="row">
                <div id="main_section" class="col-10" >
                    <?php $this->RequestItem("selected_message"); ?>
                </div>
            
                <div id="sidebar_right" class="col-2" >
                    <?php $this->LoadTemplate("user_window"); ?>
                    <?php $this->LoadTemplate("add_button"); ?>
                    <?php $this->LoadTemplate("edit_button"); ?>
                    <?php $this->LoadTemplate("delete_button"); ?>
                </div>
            </div>
            
            <div class="row">
                <div id="footer_section" class="col-12">
                    <?php $this->LoadTemplate("footer"); ?>
                </div>
            </div>
            
        </div>
        
    </body>
</html>