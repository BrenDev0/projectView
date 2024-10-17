<?php
include_once '../private/classes/Auth.php';
include_once '../private/classes/Project.php';

session_start();
$auth = new Auth();
$auth->check_access();

// new project
$project = new Project;

if(isset($_POST['new_project']) && isset($_POST['name']) && isset($_POST['type'])){
   $new_project = $project->add_project($_POST['name'], $_POST['type'], $_SESSION['account']);
   $_SESSION['project'] = $new_project;
   header('location: project.php');
   return;
} else if(isset($_POST['project_id'])){
   $_SESSION['project'] = $_POST['project_id'];
   header('location: project.php');
   return;
}

// View
require '../private/include/pages/home_page.php';
?>