<?php
require '../private/classes/Auth.php';

session_start();
$auth = new Auth();
$auth->check_access();

// View
require '../private/include/pages/home_page.php';
?>