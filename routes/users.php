<?php

use Curl\Curl;

// ======================== LOGIN GET
$router->get('login', function() {
    
    // REDIRECT IF USER IS LOGGED IN
    if(isset($_SESSION['user_login']) == true ){ header("Location: dashboard"); exit; }
    
    include "./views/user/login.php";
});

// ======================== LOGIN POST SESSION
$router->post('login', function() {

    $parms = array( 'email' => $_POST['email'], 'password' => $_POST['password'], );

    $req = new Curl();
    $req->post(api_url.'login', $parms);

    if (isset($req->response->data->user_id)){
        if ($req->response->data->status == 1 ) {

            // IF USER ACCOUNT STATUS ACTIVE
            $_SESSION['user_login'] = true;
            $_SESSION['user_id'] = $req->response->data->user_id;
            $_SESSION['user_type'] = $req->response->data->type;
            $_SESSION['user_status'] = $req->response->data->status;

        // REDIRECT TO USER VERIFICATION PAGE
        } else { header("Location: verify"); }

    } else {
         header("Location: login#invalid");
    }
});

// ======================== VERIFY
$router->get('verify', function() { 
    include "./views/user/verify.php";
});

// ======================== ACTIVATE
$router->post('activate', function() { 
    
    $parms = array( 'email' => $_POST['email'] );
    $req = new Curl();
    $req->post(api_url.'activate', $parms);

    print_r($req->response);
    die;


});

// ======================== LOGOUT
$router->get('logout', function() {
    // INCLUDE CORE FILE
    require_once '_core.php';

    session_destroy();
    header("Location: login");
});

// ======================== DASHBOARD
$router->get('dashboard', function() {
    // REDIRECT IF USER IS NOT LOGGED IN
    if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }

    $title = "Dashboard";
    $view = "./views/dashboard.php";
    include "./views/main.php";
});

?>