<?php
    require_once ("config.php");
    require_once(ROOT_DIR . "models/messages.php");
    require_once(ROOT_DIR. "controllers/messages_controller.php");
    
    // display title
    $title = "Create Message";
    
    require_once (ROOT_DIR . "templates/editor_page.php");
?>
