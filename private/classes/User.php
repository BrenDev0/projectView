<?php
require '../private/config/database.php';

class User{
    private $conn;

    function __construct(){
        $this->conn = db_connect();
    }

    function add_user($name, $email, $password){
        //check if signup info is already in use
        $sql_read = 'SELECT * FROM users WHERE name = :name AND email = :email';
        $stmt_read = $this->conn->prepare($sql_read);
        $stmt_read->execute(array(
            ':name' => $name,
            ':email' => $email
        ));

        // If info is in use redirect with error message
        if($stmt_read->rowCount() !== 0){
            $_SESSION['error'] = 'Account with name: ' . htmlentities($name) . ' and email: ' . htmlentities($email) . ' is already in use.';
            header('location: signup.php#signup-form');
            return;
        }else{
            $sql_insert = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
            $stmt_insert = $this->conn->prepare($sql_insert);

            // hash password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert to database
            $stmt_insert->execute(array(
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashed_password
            ));

            //return user id;
            $stmt_read->execute(array(
                ':name' => $name,
                ':email' => $email
            ));

            $user = $stmt_read->fetch(PDO::FETCH_ASSOC)['user_id'];
            return $user;
        }
    }

    function signin($name, $email, $password){
        // Get user from database
        $sql_read = 'SELECT * FROM users WHERE name = :name AND email = :email';
        $stmt_read = $this->conn->prepare($sql_read);
        $stmt_read->execute(array(
            ':name' => $name,
            ':email' => $email 
        ));
        // if info is correct validate passord 
        if($stmt_read->rowCount() == 1){
            $user = $stmt_read->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $user['password'];

            if(!password_verify($password, $hashed_password)){
                $_SESSION['error'] = 'Incorrect Name, Email, or Password.';
                header('location: signin.php');
                return;
            }else{
                //sign in
                $auth = new Auth;
                $auth->set_session_data($user['user_id']);
            }
        }else{
            $_SESSION['error'] = 'Incorrect Name, Email, or Password.';
            header('location: signin.php');
            return; 
        }
    }


}
?>