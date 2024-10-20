<?php
include '../private/classes/Part.php';
include '../private/classes/Project.php';

$project_class = new Project;
$project_info = $project_class->get_project($_SESSION['project']);
$part_class = new Part;
$project_components = $part_class->get_project_parts($_SESSION['project']);
$project_data = json_encode($project_components);
$project_notes = json_encode($project_info['notes']);

// updating project/parts
if(isset($_POST['save_notes'])){
    $sql_update = 'UPDATE projects SET notes = :notes WHERE user = :user AND project_id = :project_id';
    $data = array(
    ':notes' => $_POST['notes'],
    ':user' => $_SESSION['account'],
    ':project_id' => $_SESSION['project']
   );
   $project_class->update_project($sql_update, $data);
   header('location: project.php');
   return;
}
?>


<!DOCTYPE html>
<html lang="en">
<?php
require '../private/include/partials/html_head.php';
?> 
<body>
    
   <main class="full" id="project-main">
   <?php 
    //Mobile
    include '../private/include/partials/mobile_header.php';
    include '../private/include/partials/mobile_nav.php';
    include '../private/include/partials/toolbar.php';

    // Modals
    include '../private/include/partials/new_project_modal.php';
    
   // Desktop
    
    include '../private/include/partials/dt_header.php';
    include '../private/include/partials/nav_bar.php';
    ?>
    <div class="h-con" id="project-content">
        <div id="project-components-con">
        <?php
        $project_name = htmlentities($project_info['name']);
        echo "<h2>$project_name</h2>"
        ?>
        </div>
        <div class="v-con va-center" id="project-dashboard">
            <form method='post' class="v-con va-center" id="notepad">
                <h2>Notes</h2>
                <textarea name="notes" id="project-notes"><?php echo $project_info['notes']?></textarea>
                <button name="save_notes" id="save-notes">Save</button>
            </form>
            <div class="h-con va-center ha-center" id="hours-list">
                <form class="v-con va-start" id="hours-form">
                    <h2 id="hours"></h2>
                    <input type="number">
                    <input id="component-id" name="component_id" type="hidden">
                    <div class="h-con">
                        <button>Add Hours</button>
                        <button>Remove Hours</button>
                    </div>
                </form>
                <div id="checklist"></div>
            </div>
        </div>
        
    </div>
    </main>
</body>
<script>
    const projectData = JSON.parse('<?=$project_data?>');
    const notesJson = JSON.stringify('<?=$project_notes?>');
    const notes = JSON.parse(notesJson);
</script>
<script type="module" src="../private/js/index.js"></script>
<script type="module" src="../private/js/project.js"></script>
</html>