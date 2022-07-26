<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require 'core.php';

session_destroy();
header("Location: login");
?>