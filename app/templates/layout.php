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
            
            <div class="row">
                <div id="header_section" class="col-12">
                    <?php $this->LoadTemplate("header"); ?>
                </div>
            </div>
            
            <?php $this->LoadContent(); ?>
            
            <div class="row">
                <div id="footer_section" class="col-12">
                    <?php $this->LoadTemplate("footer"); ?>
                </div>
            </div>
            
        </div>
        
    </body>
</html>
