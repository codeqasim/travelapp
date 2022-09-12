<?php

// ======================== SETTINS
$router->get('settings', function() {
    // REDIRECT IF USER IS NOT LOGGED IN
    if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }

    $title = "Settings";
    $view = "./views/settings/settings.php";
    include "./views/main.php";
});

?>