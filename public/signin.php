<?php
session_start();
require '../config/database.php';
// Check if all data is entered
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    // Get user from database
    $sql = 'SELECT * FROM users where name = :name and email = :email';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email']
    ));
    // Unhash and validate password
    if ($stmt->rowCount() == 1){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $hashed_password = $row['password'];
            // if password is incorrect show error
            if(! password_verify($_POST['password'], $hashed_password)){
                $_SESSION['error'] = 'Incorrect Name, Email, or Password';
                header('location: signin.php');
                return;
            } else{
                // login
                $_SESSION['account'] = $row['user_id'];
                $_SESSION['auth'] = True;
                header('location: index.php');
                return;
            }
        }
    }else {
        $_SESSION['error'] = 'Incorrect Name, Email, or Password';
        header('location: signin.php');
        return;
    }
}

// View
require '../require/pages/signin_page.php';
?>