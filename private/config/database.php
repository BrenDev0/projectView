<?php
$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=ProjectView", $username, $password);

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    echo 'Connection failed ' . $e->getMessage();
}

function db_connect(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    
    $conn = new PDO("mysql:host=$servername;dbname=ProjectView", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
?>

