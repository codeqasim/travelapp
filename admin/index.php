<?php

// ALL RIGHTS RESERVED TO PHPTRAVELS (C) 2014-2023

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require_once '_core.php';

// REDIRECT IF USER IS LOGGED IN
if(!isset($_SESSION['admin_user_login'])){ header("Location: login"); exit; }
if(isset($_SESSION['admin_user_login'])){ header("Location: dashboard"); exit; }

// CREATE CACHE AND LOGS IF NOT EXIST
if(!file_exists('app/logs')) {  mkdir('app/logs', 0777, true); }
if(!file_exists('app/cache')) {  mkdir('app/cache', 0777, true); }

// CREATE HTACCESS FILE IF DOES NOT EXIST ON SERVER
if(!file_exists('.htaccess')) {
$content = 'RewriteEngine On' . "\n";
$content .= 'RewriteCond %{REQUEST_FILENAME} !-d' . "\n";
$content .= 'RewriteCond %{REQUEST_FILENAME}\.php -f' . "\n";
$content .= 'RewriteRule ^(.*)$ $1.php [NC,L]' . "\n\n";
file_put_contents('.htaccess', $content);
header('Location: '.$_SERVER['REQUEST_URI']);
}

// PHP CHECK VERSION IF BELOW v8
$php = explode('.', phpversion()); if ($php[0] < 7.4 ) {
echo '<script>alert("Your PHP version is below 7.4. Please update your PHP version.");</script>';
die; }

?>