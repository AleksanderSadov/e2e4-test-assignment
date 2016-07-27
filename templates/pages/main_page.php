<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/global.css';?>"/>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/main_page.css';?>"/>
        <script src="<?php echo ROOT_URL . 'scripts/main_page.js';?>"></script>
    </head>
    
    <body>
        <?php include (ROOT_DIR . "templates/elements/hidden_form.php");?>
        
        <div id="whole_page">
            <div id="header_section">
                <?php include (ROOT_DIR . "templates/elements/header.php");?>
            </div>
            
            <div class="boxed_content" id="count_messages">
                <?php echo $header_content; ?>
            </div>
            
            <div id="main_section">
                    <?php echo $main_content; ?>
            </div>
            
            <div id="sidebar">
                <?php include (ROOT_DIR . "templates/elements/user_window.php");?>
                <?php include (ROOT_DIR . "templates/elements/add_button.php");?>
            </div>
            
        </div>
    </body>
</html>