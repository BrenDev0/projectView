<?php
class Auth{
    function check_access(){
        session_start();
        if (! isset($_SESSION['auth'])) {
            $_SESSION['error'] = 'Please sign in';
            header('location: signin.php');
            return;
        }
    }

    function set_session_data($account){
        $_SESSION['auth'] = True;
        $_SESSION['account'] = $account;
        header('location: index.php');
        return;
    }
}
?>