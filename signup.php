<?php
require_once ('./config/database.php');

// Add user //

// Check if all data is present, and prepare sql statement
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $sql = 'INSERT INTO users (name, email, password) values(:name, :email, :password)';
    $stmt = $conn->prepare($sql);
    // Encrypt password
    
    // Send data to database
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
    ));

    // Redirect
    header('location: home.php');
    return;
    

}

// View
require ('./require/templates/html_head.php');
include ('./require/pages/signup_page.php');
?>