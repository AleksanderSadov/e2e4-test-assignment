<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/global.css';?>"/>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/message_page.css';?>"/>
        <script src="<?php echo ROOT_URL . 'scripts/whole_page.js';?>"></script>
    </head>
    
    <body>

        <div class="whole_page">
            
            <div id="header_section">
                <?php include (ROOT_DIR . "templates/elements/header.php");?>
            </div>

            
            <div id="main_section">
                    <?php echo $main_content; ?>
                    <?php include (ROOT_DIR . 
                            "templates/elements/add_comment_field.php");?>
            </div>
            
            <div id="sidebar_right">
                <?php include (ROOT_DIR . "templates/elements/user_window.php");?>
                <?php include (ROOT_DIR . "templates/elements/add_button.php");?>
                <?php include (ROOT_DIR . "templates/elements/edit_button.php");?>
                <?php include (ROOT_DIR . "templates/elements/delete_button.php");?>
            </div>
            
        </div>
    </body>
</html>