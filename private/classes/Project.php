<?php
require '../config/database.php';
class Project{
    private $conn;

    private function __construct(){
        $this->conn = db_connect(); 
    }

    function add_project($name, $type, $description){
        $sql = 'INSERT INTO projects (name, type, description) VALUES (:name, :type, :description)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            ':name' => $name,
            ':type'=> $type,
            ':decription' => $description
        ));
        // Return the project id 
        $query = 'SELECT project_id FROM projects WHERE name = :name AND description = :description';
        $stmt = $this->conn->prepare($query);
        $id = $stmt->execute(array(
            ':name' => $name,
            ':description' => $description
        ));
        return $id;
    }

    function get_project($project_id){
        $sql = "SELECT * FROM projects WHERE project_id = $project_id";
        $stmt = $this->conn->query($sql);
        $project = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $project;
    }

    function delete_project($project_id){
        $sql = "DELETE * FROM projects WHERE project_id = $project_id";
        $this->conn->query($sql);
        return; 
    }
}
?>