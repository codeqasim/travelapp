<?php

// INCLUDE CORE FILE
require_once '_core.php';

// REDIRECT IF USER IS NOT LOGGED IN
if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }

// INCLUDE HEADER FILE
$title = 'Dashboard';
include 'header.php'; ?>


<?php include 'footer.php'; ?>