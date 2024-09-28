<?php
require_once ('../config/database.php');

// Add user //
$error = '';
// Check if all data is present, and prepare sql statement
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['verify'])){
    // Check if passwords match
    if($_POST['password'] != $_POST['verify']){
        $error .= 'Passowrds Do Not Match!';
    }else {
        $sql = 'INSERT INTO users (name, email, password) values(:name, :email, :password)';
        $stmt = $conn->prepare($sql);
        // Hash password
        $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        // Send data to database
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $hashed_password
        ));

        // Redirect
        header('location: index.php');
        return;
        }
}

// View
include ('../require/pages/signup_page.php');
?>