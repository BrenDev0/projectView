<?php
require '../config/database.php';
class Project{
    private $conn;

    private function __construct(){
        $this->conn = db_connect(); 
    }

    function new_project($name, $type, $description){
        $sql = 'INSERT INTO projects (name, type, description) VALUES (:name, :type, :description)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            ':name' => $name,
            ':type'=> $type,
            ':decription' => $description
        ));

    }

    function get_project($project_id){
        $sql = "SELECT * FROM projects WHERE project_id = $project_id";
        $stmt = $this->conn->query($sql);
        $project = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $project;
    }
}
?>