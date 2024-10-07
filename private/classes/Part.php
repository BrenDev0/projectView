<?php 
require '../private/config/database.php';

class Part{
    private $conn;

    function __construct(){
        $this->conn = db_connect();
    }

    function add_part($name, $description, $project_id){
        $sql_insert = 'INSERT INTO parts (name, description, project) VALUES (:name, :description, :project)';
        $stmt_insert = $this->conn->prepare($sql_insert);
        $stmt_insert->execute(array(
            ':name' => $name,
            ':description' => $description,
            ':project' => $project_id
        ));

        // Return part 
        $sql_read = 'SELECT * FROM parts WHERE name = :name AND description = :description';
        $stmt_read = $this->conn->prepare($sql_read);
        $stmt_read->execute(array(
            ':name' => $name,
            ':description' => $description
        ));

        $part = $stmt_read->fetch(PDO::FETCH_ASSOC);
        return $part;
    }

    function get_project_parts($project_id){
        $sql_read = "SELECT * FROM  parts WHERE project = $project_id";
        $stmt_read = $this->conn->query($sql_read);

        $project_parts = $stmt_read->fetchAll(PDO::FETCH_ASSOC);
        return $project_parts;
    }

    function get_part($part_id){
        $sql_read = "SELECT * FROM parts WHERE part_id = $part_id";
        $stmt_read = $this->conn->query($sql_read);

        $part = $stmt_read->fetch(PDO::FETCH_ASSOC);
        return $part;
    }

    function delete_part($part_id){
        $sql_delete = "DELETE * FROM parts WHERE part_id = $part_id";
        $this->conn->query($sql_delete);
        return;
    }
}


?>