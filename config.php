<?php
    $root_dir = __DIR__ . "/";
    $root_url = !empty($_SERVER['HTTPS']) ? "https://" : "http://";
    $root_url .= $_SERVER['HTTP_HOST'] . "/";
    define("ROOT_URL", $root_url);
    define("ROOT_DIR", $root_dir);
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

