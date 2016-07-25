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
        <!--Hidden form for posting id of selected message to a new page-->
        <form style="display: hidden" 
              action="<?php echo ROOT_URL . 'page.php';?>"
              method="POST" id="hidden_form">
            <input type="hidden" 
                   id="hidden_input_id_message" 
                   name="hidden_input_id_message" 
                   value="0"/>
        </form>
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