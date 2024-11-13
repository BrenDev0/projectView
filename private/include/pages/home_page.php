<?php
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

// delete project
if(isset($_POST['delete_project'])){
    $project->delete_project($_POST['delete_project']);
    header('location: index.php');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../private/include/partials/html_head.php';
?>
<body id="home-body"> 
    <!-- Mobile -->
   <main id="home-main">
   <?php 
    include '../private/include/partials/mobile_header.php';
    include '../private/include/partials/mobile_nav.php';
    include '../private/include/partials/toolbar.php';
    // Modals
    include '../private/include/partials/new_project_modal.php';
    ?>
   

   <!-- Desktop -->
    <?php
    include '../private/include/partials/dt_header.php';
    include '../private/include/partials/nav_bar.php';
    ?>
        <div class="con h-con">
            <?php
            include '../private/include/partials/projects_table.php';
            ?>
            <div class="v-con full" id="tasks-con">
            <?php
            include '../private/include/partials/tasks.php';
            ?>
            </div>
        </div>
    </main>
</body>
<script type="module" src="../private/js/index.js"></script>
<script type="module" src="../private/js/home.js"></script>
</html>