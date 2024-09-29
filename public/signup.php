<?php
require_once ('../config/database.php');

// Add user //

// Start session
session_start();

// Check if all data is present, and prepare sql statement
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['verify'])){
    // Check if passwords match
    if($_POST['password'] != $_POST['verify']){
        $_SESSION['error'] = 'Passwords do not match';
        header('location: signup.php');
        return;
    }else {

        // Check if account info is already in use
        $sql = 'SELECT * FROM users WHERE name = :name AND email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email']
        ));
        //if account exists notify user to make changes
        if ($stmt->rowCount() !== 0){
            $_SESSION['error'] = 'Account with name: ' . htmlentities($_POST['name']) . ', and email: ' . htmlentities($_POST['email']) . ' is already in use.';
            header('location: signup.php#signup-form');
            return;
        }else {
            $sql2 = 'INSERT INTO users (name, email, password) values(:name, :email, :password)';
            $stmt2 = $conn->prepare($sql2);
            // Hash password
            $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            // Send data to database
            $stmt2->execute(array(
                ':name' => $_POST['name'],
                ':email' => $_POST['email'],
                ':password' => $hashed_password
            ));

            $stmt->execute(array(
                ':name' => $_POST['name'],
                ':email' => $_POST['email']
            ));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Redirect
            $_SESSION['auth'] = True;
            $_SESSION['account'] = $row['user_id'];
            header('location: index.php');
            return;
        }
    }
}

// View
include ('../require/pages/signup_page.php');
?>