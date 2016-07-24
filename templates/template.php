<!DOCTYE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo getenv('APP_ROOT_PATH') . 'styles/stylesheet.css';?>"/>
    </head>
    
    <body>
        <div id="content">
            <?php echo $content; ?>
        </div>
    </body>
</html>