<?php
require '../private/config/database.php';
class Project{
    private $conn;

    function __construct(){
        $this->conn = db_connect(); 
    }

    function add_project($name, $type, $description, $user){
        $sql_insert = 'INSERT INTO projects (name, type, description, user, status) VALUES (:name, :type, :description, :user, :status)';
        $stmt_insert = $this->conn->prepare($sql_insert);
        $stmt_insert->execute(array(
            ':name' => $name,
            ':type'=> $type,
            ':description' => $description,
            ':user' => $user,
            ':status' => 1
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

    function get_project_hours($project_id){
        // Get all projects
        $sql_read = "SELECT hours FROM parts WHERE project = $project_id";
        $stmt_read = $this->conn->query($sql_read);
        $projects = $stmt_read->fetchAll(PDO::FETCH_ASSOC);
        // Add all hours 
        $total_hours = 0;
        foreach($projects as $hours){
            $total_hours = $total_hours + $hours['hours'];
        }

        return $total_hours;
    }

    function get_project_progress($project_id){
        // Get the number of all the parts
        $sql_read = "SELECT * FROM parts WHERE project = $project_id";
        $stmt_read = $this->conn->query($sql_read);
        $total_parts = sizeof($stmt_read->fetchAll(PDO::FETCH_ASSOC)); 
        // Get the number of parts completed

        $sql_completed_projects = "SELECT * FROM parts WHERE project = $project_id AND status = 3";
        $stmt_completed_projects = $this->conn->query($sql_completed_projects);
        $total_completed = sizeof($stmt_completed_projects->fetchAll(PDO::FETCH_ASSOC));

        // calculate % completed
        if($total_parts && $total_completed){
            $progress = ($total_completed / $total_parts) * 100;
            return (int) $progress;
        }else{
            return 0;
        }
        
    }

    function delete_project($project_id){
        $sql_delete = "DELETE * FROM projects WHERE project_id = $project_id";
        $this->conn->query($sql_delete);
        return; 
    }
}
?>