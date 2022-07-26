<?php

// ALL RIGHTS RESERVED TO PHPTRAVELS (C) 2014-2023

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// SESSION START
if(!isset($_SESSION)) { session_start(); }

// REQUIRED LIBRAIRY FOR DATABASE CONNECTION AND VENDORS
require_once '../vendor/autoload.php';
require_once '../config.php';

// INCLUDE TRANSALTION LIBRARY IF SESSION EXISTS
if (isset($_SESSION['user_language'])) {
    require_once '_i18n.class.php';
    $i18n = new i18n();
    $i18n->setForcedLang($_SESSION['user_language']);
    $i18n->init();
}

// DEVIDE URL INTO SEGMENTS
$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = explode('/', $url_path);
// echo end($url);

// DD FUNCTION FOR DEBUG RESPONSES
// function ddd($d) { echo "<pre>"; print_r($d); echo "</pre>"; }

?>