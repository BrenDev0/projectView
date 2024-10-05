<?php
require '../private/classes/User.php';
require '../private/classes/Auth.php';


session_start();
// Check if all data is entered
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $signin = new User;
    $signin->signin($_POST['name'], $_POST['email'], $_POST['password']);
    return;
}

// View
require '../private/include/pages/signin_page.php';
?>