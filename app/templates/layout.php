<!DOCTYPE html>
<html lang="ru">
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title><?php echo $this->title; ?></title>
        <?php $this->loadStylesheet(); ?>
        <?php $this->loadScript(); ?>
    </head>
    
    <body>
        
        <div id="whole_page">
            
            <div class="row">
                <div id="header_section" class="col-12">
                    <?php $this->loadTemplate("header"); ?>
                </div>
            </div>
            
            <?php $this->loadContent(); ?>
            
            <div class="row">
                <div id="footer_section" class="col-12">
                    <?php $this->loadTemplate("footer"); ?>
                </div>
            </div>
            
        </div>
        
    </body>
</html>
