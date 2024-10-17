<?php 
include_once '../private/classes/Auth.php';
include_once '../private/classes/Calendar.php';

session_start();
$auth = new Auth();
$auth->check_access();

// View
include '../private/include/pages/calendar_page.php';
?>