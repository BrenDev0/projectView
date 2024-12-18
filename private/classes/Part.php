<?php 
require '../private/config/database.php';

class Part{
    private $conn;

    function __construct(){
        $this->conn = db_connect();
    }

    function add_part($name, $project_id){
        $sql_insert = 'INSERT INTO parts (name, project, hours, status) VALUES (:name, :project, :hours, :status)';
        $stmt_insert = $this->conn->prepare($sql_insert);
        $stmt_insert->execute(array(
            ':name' => $name,
            ':project' => $project_id,
            ':hours' => 0,
            ':status' => 0
        ));

        // Return part 
        $part = $this->conn->lastInsertId();
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

    function adjust_hours($part_id,$action, $hours){
        $sql_read = "SELECT hours FROM parts WHERE part_id = $part_id";
        $stmt_read = $this->conn->query($sql_read);
        
        $new_hours = 0;
        $current_hours = $stmt_read->fetch(PDO::FETCH_ASSOC)['hours'];

        if($action === 'ADD'){
            $new_hours = $current_hours + $hours; 
        }else{
            $new_hours = $current_hours - $hours;
        }

        $sql_update = 'UPDATE parts SET hours = :new_hours WHERE part_id = :part_id';
        $stmt_update = $this->conn->prepare($sql_update);
        $stmt_update->execute(array(
            ':new_hours' => $new_hours,
            'part_id' => $part_id
        ));
        return;
    }
}
?>