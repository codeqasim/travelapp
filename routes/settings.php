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

    // LOGO UPLOADED
    if(isset($_FILES['logo']) || !empty($_FILES['logo'])) { 
    $val = "logo"; 
    $parms = array( 'file'=> new CurlFile($_FILES['logo']['tmp_name'], $_FILES['logo']['type'], $_FILES['logo']['name']), 'user_id' => $_POST['user_id'] );
    $req = new Curl();
    $req->post(api_stroage.'upload.php', $parms);
    if(isset($req->response->data)){
    $logo = ($req->response->data);
    }
    }

    // FAVICON UPLOADED
    if(isset($_FILES['favicon']) || !empty($_FILES['favicon'])) { 
    $val = "favicon"; 
    $parms = array( 'file'=> new CurlFile($_FILES['favicon']['tmp_name'], $_FILES['favicon']['type'], $_FILES['favicon']['name']), 'user_id' => $_POST['user_id'] );
    $req = new Curl();
    $req->post(api_stroage.'upload.php', $parms);
    if(isset($req->response->data)){
    $favicon = ($req->response->data);
    }
    }

    $parms = array( 
    'user_id' => $_SESSION['user_id'], 
    'business_name' => $_POST['business_name'], 
    'site_offline' => $_POST['site_offline'], 
    'offline_message' => $_POST['site_offline'], 
    'home_title' => $_POST['home_title'], 
    'meta_description' => $_POST['meta_description'], 
    'guest_booking' => $_POST['guest_booking'], 
    'user_registration' => $_POST['user_registration'], 
    'supplier_registration' => $_POST['supplier_registration'], 
    'agent_registration' => $_POST['agent_registration'], 
    'javascript' => $_POST['javascript'], 
    'multi_language' => $_POST['multi_language'], 
    'default_language' => $_POST['default_language'], 
    'multi_currency' => $_POST['multi_currency'], 
    'social_facebook' => $_POST['social_facebook'], 
    'social_twitter' => $_POST['social_twitter'], 
    'social_linkedin' => $_POST['social_linkedin'], 
    'social_instagram' => $_POST['social_instagram'], 
    'social_google' => $_POST['social_google'], 
    'social_whatsapp' => $_POST['social_whatsapp'], 
    );

    if($logo) { $parms['logo'] = $logo; }
    if($favicon) { $parms['favicon'] = $favicon; }

    $req = new Curl();
    $req->post(api_url.'settings', $parms);
    header("Location: settings#updated");

});


?>