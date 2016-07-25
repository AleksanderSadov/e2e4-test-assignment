<?php
    $root_dir = __DIR__ . "/";
    $root_url = !empty($_SERVER['HTTPS']) ? "https://" : "http://";
    $root_url .= $_SERVER['HTTP_HOST'] . "/";
    define("ROOT_URL", $root_url);
    define("ROOT_DIR", $root_dir);
?>

