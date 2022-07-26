<?php
// REDIRECT IF USER IS NOT LOGGED IN
if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }
if(!isset($_SESSION['user_type']) == "admin" ){ } else { header("Location: dashboard"); exit; }
?>