<?php
require '../private/config/database.php';
require '../private/classes/Auth.php';

$auth = new Auth();
$auth->check_access();

// View
require '../private/include/pages/home_page.php';
?>