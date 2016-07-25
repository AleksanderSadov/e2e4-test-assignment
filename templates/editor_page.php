<!DOCTYE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/editor_page.css';?>"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo ROOT_URL . 'scripts/script.js';?>"></script>				
    </head>
    
    <body>
        <div class="whole_page">
            <div class="editor">
                <?php require(ROOT_DIR . "templates/editor.php");?>
            </div>        
        </div>
    </body>
</html>

