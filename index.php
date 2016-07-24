<?php
    $app_root_path = getenv('APP_ROOT_PATH');
    $title = "Title";
    $messages_count = 0;
    $headerContent = "<p>Всего сообщений: " . $messages_count . "</p>";
    
    include ($app_root_path . "models/credentials.php");
    $sqli = new mysqli($host, $user, $password, $database);
    if ($sqli->connect_error)
    {
        $mainContent = "Connection error: " . $sqli->connect_error;
    }
    else
    {
        $mainContent = "<p>Connection established</p>";
    }
    $sql = "SELECT * FROM users;";
    $result = $sqli->query($sql);
    $id = 0;
    $nickname = "nick";
    $avatar_path = "af";
    while($row = $result->fetch_array())
    {
        $id = $row['id'];
        $nickname = $row['nickname'];
        $avatar_path = $row['avatar_path'];
        $mainContent .= "<p>id: " . $id . "; nickname: " . $nickname . "; avatar_path: " . $avatar_path . " </p>";
    }
    
    require_once ($app_root_path . "templates/template.php");
?>
