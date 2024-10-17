<?php
include_once '../private/classes/User.php';
include_once '../private/classes/Auth.php';

// Add user //
session_start();
// Check if all data is present, and prepare sql statement
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['verify'])){
    // Check if passwords match
    if($_POST['password'] != $_POST['verify']){
        $_SESSION['error'] = 'Passwords do not match';
        header('location: signup.php');
        return;
    }else {
        //signup user 
        $signup = new User;
        $id = $signup->add_user($_POST['name'], $_POST['email'], $_POST['password']);
        
        // set session data
        if($id){
            $auth = new Auth;
            $auth->set_session_data($id);
        }
    }
    return;
}

// View
require '../private/include/pages/signup_page.php';
?>