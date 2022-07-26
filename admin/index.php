<?php

// ALL RIGHTS RESERVED TO PHPTRAVELS (C) 2014-2023

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require 'core.php';

// REDIRECT IF USER IS LOGGED IN
if(!isset($_SESSION['admin_user_login'])){ header("Location: login"); exit; }
if(isset($_SESSION['admin_user_login'])){ header("Location: dashboard"); exit; }

echo json_encode($data);

?>