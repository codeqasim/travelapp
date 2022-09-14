<?php

use Curl\Curl;

// ======================== SETTINS
$router->get('settings', function() {
    // REDIRECT IF USER IS NOT LOGGED IN
    if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }

    $title = "Settings";
    $view = "./views/settings/settings.php";
    include "./views/main.php";
});

// ======================== SETTINS POST
$router->post('settings', function() {
    // REDIRECT IF USER IS NOT LOGGED IN
    if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }

    $parms = array( 
    'user_id' => $_SESSION['user_id'], 
    'business_name' => $_POST['business_name'], 
    'site_offline' => $_POST['site_offline'], 
    'offline_message' => $_POST['site_offline'], 
    'home_title' => $_POST['site_offline'], 
    'meta_description' => $_POST['site_offline'], 
    'guest_booking' => $_POST['site_offline'], 
    'user_registration' => $_POST['site_offline'], 
    'supplier_registration' => $_POST['site_offline'], 
    'agent_registration' => $_POST['site_offline'], 
    'javascript' => $_POST['site_offline'], 
    'multi_language' => $_POST['site_offline'], 
    'default_language' => $_POST['site_offline'], 
    'multi_currency' => $_POST['site_offline'], 
    'social_facebook' => $_POST['site_offline'], 
    'social_twitter' => $_POST['site_offline'], 
    'social_linkedin' => $_POST['site_offline'], 
    'social_instagram' => $_POST['site_offline'], 
    'social_google' => $_POST['site_offline'], 
    'social_whatsapp' => $_POST['site_offline'], 
    );

    $req = new Curl();
    $req->post(api_url.'settings', $parms);
    
    header("Location: settings#updated");

});


?>