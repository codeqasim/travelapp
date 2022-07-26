<?php

// ALL RIGHTS RESERVED TO PHPTRAVELS (C) 2014-2023

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// SESSION START
if(!isset($_SESSION)) { session_start(); }

// REQUIRED LIBRAIRY FOR DATABASE CONNECTION AND VENDORS
require_once '../vendor/autoload.php';
require_once '../config.php';

// SENTRY DEBUG
\Sentry\init(['dsn' => 'https://0a0039bdd37b4db5a83068108f64652b@o1024531.ingest.sentry.io/6603898' ]);

try {
    $this->functionFailsForSure();
} catch (\Throwable $exception) {
    \Sentry\captureException($exception);
}

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

// ALERTS FUNCTIONALITY
function msg_success($msg1, $msg2) { echo '<script> function messages() { vt.success("'.$msg1.'",{ title:"'.$msg2.'", position: "top-center", callback: function (){ // } }) } </script>';}
function msg_error($msg1, $msg2){ echo '<script> function messages() { vt.error("'.$msg1.'",{ title:"'.$msg2.'", position: "top-center", callback: function (){ // } }) } </script>'; }
function msg_info($msg1, $msg2){ echo '<script> function messages() { vt.info("'.$msg1.'",{ title:"'.$msg2.'", position: "top-center", callback: function (){ // } }) } </script>'; }
function msg_warn($msg1, $msg2){ echo '<script> function messages() { vt.warn("'.$msg1.'",{ title:"'.$msg2.'", position: "top-center", callback: function (){ // } }) } </script>'; }

// PAGE REDIRECTION FUNCTIONALITY
function redirect($url)
{
    if (!headers_sent())
    {
        header('Location: '.$url);
        exit;
        }
    else
        {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

// DD FUNCTION FOR DEBUG RESPONSES
// function ddd($d) { echo "<pre>"; print_r($d); echo "</pre>"; }

?>