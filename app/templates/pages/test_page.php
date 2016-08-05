<!DOCTYPE html>
<html lang="ru">
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>TEST PAGE</title>
        <link rel="stylesheet" href="styles/test.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    
    <body>
        
        <div id="whole_page">
            
            <div id="header_section">
                <?php $this->LoadTemplate("header"); ?>
            </div>
            
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
            
            <div class="row">
                <div id="footer_section" class="col-12">
                    <?php $this->LoadTemplate("footer"); ?>
                </div>
            </div>
            
        </div>
        
    </body>
</html>