<?php
include_once '../private/classes/Auth.php';

session_start();
$auth = new Auth();
$auth->check_access();


// View
include '../private/include/pages/project_page.php';
?>

