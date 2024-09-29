<?php
require ('../config/database.php');
session_start();
if (! isset($_SESSION['auth'])) {
    $_SESSION['error'] = 'Please sign in';
    header('location: signup.php');
    return;
}
// View
require ('../require/pages/home_page.php');
?>