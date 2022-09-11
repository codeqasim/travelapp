<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require_once '_core.php';

session_destroy();
header("Location: login");
?>