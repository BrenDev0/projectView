<?php
include_once '../private/classes/Auth.php';
include_once '../private/classes/Project.php';

session_start();
$auth = new Auth();
$auth->check_access();

if(isset($_POST['signout'])){
   session_destroy();
   header('location: index.php');
   return;
}

// View
require '../private/include/pages/home_page.php';
?>