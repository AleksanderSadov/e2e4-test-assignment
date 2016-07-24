<?php
    $app_root_path = getenv('APP_ROOT_PATH');
    require_once ($app_root_path . "models/messages.php");
    require_once ($app_root_path . "controllers/messages_controller.php");
    
    if (!empty($_POST["hidden_input_id_message"]))
    {
        echo "id got here";
    }
    else
    {
        echo "id was lost"; 
    }
    // display title and header
    $title = "Messages";
    $headerContent = "<p>Всего сообщений: " . CountMessages() . "</p>";
    
    $mainContent = "Hello";
    
    require_once ($app_root_path . "templates/main_page.php");
?>

