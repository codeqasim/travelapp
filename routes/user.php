<?php 

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// ======================== LOGIN GET
$router->get('login', function() {
    include "./views/login.php";
});

// ======================== LOGIN POST
$router->post('login', function() {

// INCLUDE CORE FILE
require_once './_core.php';

// REDIRECT IF USER IS LOGGED IN
if(isset($_SESSION['user_login'])){ header("Location: dashboard"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CHECK IF USER EXISTS
    $data = $db->select('phptravels_users', '*', [
        'email' => $_POST['email'],
        'password' =>  md5($_POST['password'])
    ]);

    // REDIRECT IF USER EXISTS AND CREATE SESSION
    if (isset($data[0]['id'])) {
        $_SESSION['user_login'] = true;
        $_SESSION['user_id'] = $data[0]['id'];
        $_SESSION['user_type'] = $data[0]['type'];
        $_SESSION['user_language'] = $_POST['user_language'];
        header("Location: dashboard");
        exit;
    } else {
        echo '<script>alert("Invalid email or password");</script>';
    }

}

});

// ======================== LOGOUT
$router->get('logout', function() {
    // INCLUDE CORE FILE
    require_once '_core.php';

    session_destroy();
    header("Location: login");
});

?>