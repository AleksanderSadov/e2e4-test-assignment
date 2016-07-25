<!DOCTYE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/stylesheet.css';?>"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo ROOT_URL . 'scripts/script.js';?>"></script>
    </head>
    
    <body>

        <div class="whole_page">
            <div class="header_section">
                <?php echo $header_content; ?>
            </div>
            
            <div class="main_section">
                <div id="user_window">
                    <?php include (ROOT_DIR . "templates/user_window.php")?>
                </div>
                <div class="main_content">
                    <?php echo $main_content; ?>
                </div>
            </div>
            
        </div>
    </body>
</html>