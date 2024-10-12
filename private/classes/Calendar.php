<?php
require '../private/config/database.php';

class Calendar{
    private $conn;

    function __construct(){
        $this->conn = db_connect();
    }

    function add_to_calendar($year, $month, $day, $title, $description=null, $user, $project=null, $part=null, $start=null, $end=null){
        $sql_insert = 'INSERT INTO calendar (year, month, day, title, description, user, project, part, start_time, end_time) VALUES (:year, :month, :day, :title, :description, :user, :project, :part, :start, :end)';
        $stmt_insert = $this->conn->prepare($sql_insert);
        $stmt_insert->execute(array(
            ':year' => $year,
            ':month' => $month,
            ':day' => $day,
            ':title' => $title,
            ':description' => $description,
            ':user' => $user,
            ':project' => $project,
            ':part' => $part,
            ':start' => $start,
            ':end' => $end
        ));

        return;
    }

    function get_user_calendar($user_id){
        $sql_read = "SELECT * FROM calendar WHERE user = $user_id";
        $stmt_read = $this->conn->query($sql_read);

        $calendar = $stmt_read->fetchAll(PDO::FETCH_ASSOC);
        return $calendar;
    }
}
?>