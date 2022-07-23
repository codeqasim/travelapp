<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// DEVELOPMENT MODE
define('DEBUG', true);

error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

// DATBASE CONNECTION
$db['default'] = array(
    'database' => "v8",
    'hostname' => "localhost",
    'username' => "root",
    'password' => "",
);

// MEDDO DATABASE CONNECTION
$db = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'travelapp',
    'username' => 'root',
    'password' => ''
]);