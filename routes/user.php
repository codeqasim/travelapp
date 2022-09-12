<?php

// ======================== LOGIN GET
$router->get('login', function() {
    
    // REDIRECT IF USER IS LOGGED IN
    if(isset($_SESSION['user_login']) == true ){ header("Location: dashboard"); exit; }
    
    include "./views/login.php";
});

// ======================== LOGIN POST SESSION
$router->post('login', function() {
    if (isset($_POST['user_id'])){
        $_SESSION['user_login'] = true;
        $_SESSION['user_id'] = $_POST['user_id'];
        $_SESSION['user_type'] = $_POST['user_type'];
        $_SESSION['user_status'] = $_POST['user_status'];
    }
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

    $view = "./views/dashboard.php";
    include "./views/main.php";
     
});

?>