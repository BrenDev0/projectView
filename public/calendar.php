<?php 
require '../private/classes/Auth.php';
require '../private/classes/Calendar.php';

session_start();
$auth = new Auth();
$auth->check_access();

// View
include '../private/include/pages/calendar_page.php';
?>