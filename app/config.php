<?php
    // Задание корневых путей
    $root_dir = __DIR__ . "/";
    $root_url = "app/";
    define("ROOT_URL", $root_url);
    define("ROOT_DIR", $root_dir);
    
    // Отображение ошибок
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Данные входа для базы данных
    define("DB_HOST", "localhost");
    define("DB_USER", "e2e4-test-assignment");
    define("DB_PASSWORD", "e2e4-test-assignment");
    define("DB_NAME", "e2e4-test-assignment");


