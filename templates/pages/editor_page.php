<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/global.css';?>"/>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 
                      'styles/editor_page.css';?>"/>
    </head>
    
    <body>
        <div class="whole_page">
            <div class="header">
                <?php include (ROOT_DIR . "templates/elements/header.php");?>
            </div>
            
            <div class="editor">
                <?php require(ROOT_DIR . "templates/elements/editor.php");?>
            </div>        
        </div>
    </body>
    
</html>

