<?php
include_once '../private/classes/Part.php';
include_once '../private/classes/Project.php';

$project_class = new Project;
$project_info = $project_class->get_project($_SESSION['project']);
$part_class = new Part;
$project_components = $part_class->get_project_parts($_SESSION['project']);
$project_data = json_encode(array(
    'project_info' => $project_info,
    'project_components' => $project_components
));
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
        $project_name = $project_info['name'];
        echo "<h2>$project_name</h2>"
        ?>
        </div>
        <div class="v-con va-center" id="project-dashboard">
            <div class="v-con va-center" id="notepad">
                <h2>Notes</h2>
                <textarea name="notes" id="project-notes"></textarea>
                <button id="save-notes">Save</button>
            </div>
        </div>
        
    </div>
    </main>
</body>
<script>
    const projectData = JSON.parse('<?=$project_data?>')
</script>
<script type="module" src="../private/js/project.js"></script>
<script type="module" src="../private/js/index.js"></script>
</html>