<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require_once 'core.php';

// REQUIRED IF USER IS NOT LOGGED IN
if(!isset($_SESSION['admin_user_login']) == true ){ header("Location: login"); exit; }

// INCLUDE HEADER FILE
$title = 'Profile';
include 'header.php'; ?>

<header class="bg-dark row">
    <div class="px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-white py-3 mb-0 display-6">Profile</h1>
            <div class="ms-4">

            </div>
        </div>
    </div>
</header>



<?php include 'footer.php'; ?>