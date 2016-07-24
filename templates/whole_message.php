<!DOCTYE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo APP_ROOT . '/styles/stylesheet.css';?>"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo APP_ROOT . '/scripts/script.js';?>"></script>
    </head>
    
    <body>
        <div id="whole_page">
            
            <div id="headerSection">
                <?php echo $headerContent; ?>
            </div>
            
            <div id="mainSection">
                <?php echo $mainContent; ?>
            </div>         
            
        </div>
    </body>
</html>