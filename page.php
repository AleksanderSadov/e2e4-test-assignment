<?php
<<<<<<< HEAD
    define("ROOT", __DIR__);
      define("APP_ROOT", __DIR__);
    require_once (ROOT . "/models/messages.php");
    require_once (ROOT . "/controllers/messages_controller.php");
=======
    require_once ("config.php");
    require_once (ROOT_DIR . "/models/messages.php");
    require_once (ROOT_DIR . "/controllers/messages_controller.php");
>>>>>>> master
    
    // get id of selected message
    $message_id = filter_input(INPUT_POST, "hidden_input_id_message", 
            FILTER_SANITIZE_NUMBER_INT);
    $message = GetWholeMessage($message_id);
    // display title and header
    $title = $message->header;
    $headerContent = "<p>" . $message->header . "</p>";
    
    // display message content
    $mainContent = DisplayWholeMessage($message);
    
    require_once (ROOT_DIR . "/templates/whole_message.php");
?>

