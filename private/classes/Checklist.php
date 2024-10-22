<?php
require_once '../config/database.php';

class Checklist{
    private $conn;

    function __construct(){
        $this->conn = db_connect();
    }

    function get_user_checklist($user_id){
        $sql_read = "SELECT * FROM checklist WHERE user = $user_id";
        $stmt_read = $this->conn->query($sql_read);

        $checklist = $stmt_read->fetchAll(PDO::FETCH_ASSOC);
        return $checklist;
    }

    function add_to_checklist($component_id, $user_id, $item){
        $sql_insert = 'INSERT INTO checklist (item, user, component) VALUES (:item, :user, :component, :status)';
        $stmt_insert = $this->conn->prepare($sql_insert);
        $stmt_insert->execute(array(
            ':name' => $item,
            ':user' => $user_id,
            ':component_id' => $component_id,
            ':status' => 0
        ));
    }

    function mark_complete($id){
        $sql_update = "UPDATE checklist SET status = 1 WHERE item_id = $id";
        $this->conn->query($sql_update);
        return;
    }

    function edit_item($item_id, $name){
        $sql_update = 'UPDATE checklist SET name = :name WHERE item_id = :id';
        $stmt_update = $this->conn->prepare($sql_update);
        $stmt_update->execute(array(
            'name' => $name,
            ':id' => $item_id
        ));
    }

    function delete_item($item_id){
        $sql_delete = "DELETE FROM checklist WHERE item_id = $item_id";
        $this->conn->query($sql_delete);
        return;
    }
}
?>