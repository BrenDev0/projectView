<?php
include_once '../private/classes/Auth.php';
include_once '../private/classes/Project.php';

session_start();
$auth = new Auth();
$auth->check_access();

// View
require '../private/include/pages/home_page.php';
?>