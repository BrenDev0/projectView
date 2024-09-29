<?php
require ('../config/database.php');
if (isset($_SESSION['auth'])){
    if (!$_SESSION['auth']){
        $_SESSION['error'] = 'Login Failed';
        header('location: signup.php');
        return;
    }
}else if (!isset($_SESSION['auth'])) {
    session_start();
    $_SESSION['error'] = 'Please sign in';
    header('location: signup.php');
    return;
}
// View
require ('../require/pages/home_page.php');
?>