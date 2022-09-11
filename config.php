<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// DEVELOPMENT MODE
define('DEBUG', true);

error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

// DATBASE CONNECTION
$db['default'] = array(
    // 'database' => "production_app",
    'database' => "localhost",
    'hostname' => "app-7ad3be44e4",
    'username' => "rootuser",
    'password' => "rootuser",
);

// MEDDO DATABASE CONNECTION
$db = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'production_app',
    'username' => 'rootuser',
    'password' => 'rootuser'
]);