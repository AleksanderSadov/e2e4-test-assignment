<?php
    // root path and url
    $root_dir = __DIR__ . "/";
    /*$root_url = !empty($_SERVER['HTTPS']) ? "https://" : "http://";
    $root_url .= $_SERVER['HTTP_HOST'] . "/";
    $root_url .= "aleksander.sadov/e2e4-test-assignment/app/";*/
    $root_url = "app/";
    define("ROOT_URL", $root_url);
    define("ROOT_DIR", $root_dir);
    
    // display errors 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // database credentials
    define("DB_HOST", "localhost");
    define("DB_USER", "e2e4-test-assignment");
    define("DB_PASSWORD", "e2e4-test-assignment");
    define("DB_NAME", "e2e4-test-assignment");
?>

