<?php
include_once '../private/classes/Auth.php';
include_once '../private/classes/Project.php';

session_start();
$auth = new Auth();
$auth->check_access();

$data = new Project;
$project = $data->get_project($_SESSION['project']);
$name = $project['name'];
echo "<h2>$name</h2>"
?>