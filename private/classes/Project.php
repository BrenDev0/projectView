<?php
require '../private/config/database.php';
class Project{
    private $conn;

    function __construct(){
        $this->conn = db_connect(); 
    }

    function add_project($name, $type, $description, $user){
        $sql_insert = 'INSERT INTO projects (name, type, description, user) VALUES (:name, :type, :description)';
        $stmt_insert = $this->conn->prepare($sql_insert);
        $stmt_insert->execute(array(
            ':name' => $name,
            ':type'=> $type,
            ':decription' => $description,
            ':user' => $user
        ));
        // Return the project id 
        $sql_read = 'SELECT project_id FROM projects WHERE name = :name AND description = :description';
        $stmt_read = $this->conn->prepare($sql_read);
        $stmt_read->execute(array(
            ':name' => $name,
            ':description' => $description
        ));

        $id = $stmt_read->fetch(PDO::FETCH_ASSOC)['project_id'];
        return $id;
    }

    function get_user_projects($user_id){
        $sql = "SELECT * FROM projects WHERE user = $user_id";
        $stmt = $this->conn->query($sql);

        $user_projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user_projects;
    }

    function get_project($project_id){
        $sql = "SELECT * FROM projects WHERE project_id = $project_id";
        $stmt = $this->conn->query($sql);

        $project = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $project;
    }

    function delete_project($project_id){
        $sql_delete = "DELETE * FROM projects WHERE project_id = $project_id";
        $this->conn->query($sql_delete);
        return; 
    }
}
?>