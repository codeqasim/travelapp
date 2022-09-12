<?php

// REDIRECT IF USER IS NOT LOGGED IN
if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }
