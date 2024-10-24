<?php
include '../private/classes/Part.php';
include '../private/classes/Project.php';
include '../private/classes/Checklist.php';


$project_class = new Project;
$part_class = new Part;
$checklis_class = new Checklist;
$project_info = $project_class->get_project($_SESSION['project']);
$project_components = $part_class->get_project_parts($_SESSION['project']);
$project_data = json_encode($project_components);
$project_notes = json_encode($project_info['notes']);
$checklist_data = json_encode($checklis_class->get_user_checklist($_SESSION['account']));

// notes form
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

// add component form
if(isset($_POST['add_project_component']) && isset($_POST['component_name'])){
    $part_class->add_part($_POST['component_name'], $_SESSION['project']);
    header('location: project.php');
    return;
}

// add checklist item
if(isset($_POST['checklist']) && isset($_POST['checklist_item'])){
    $checklis_class->add_to_checklist($_POST['checklist_component_id'], $_SESSION['account'], $_POST['checklist_item']);
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
    include '../private/include/partials/project_toolbar.php';

    // Modals
    include '../private/include/partials/new_project_modal.php';
    
   // Desktop
    
    include '../private/include/partials/dt_header.php';
    include '../private/include/partials/nav_bar.php';
    ?>
    <div class="h-con wide" id="project-content">
        <div class="v-con" id="project-components-con">
            <?php
                $project_name = htmlentities($project_info['name']);
                echo "<h2>$project_name</h2>"
            ?>
            <form method="post" class="h-con va-center" id="add-component">
                <input type="text" name="component_name" placeholder="add component">
                <button name="add_project_component">Submit</button>
            </form>
            <div id="components-list"></div>
        </div>
        <div class="h-con va-center" id="project-dashboard">
            <div class="v-con va-start" id="checklist-hours">
                <form method="post" class="v-con va-center ha-start" id="checklist-form">
                <h2>Component Checklist</h2>
                    <div class="h-con ha-center va-center form-elements" id="checklist-input">
                        <input type="text" name="checklist_item" placeholder="Add item to list.">
                        <button name="checklist">Submit</button>
                    </div>
                    <input class="hidden-component-id" type="hidden" name="checklist_component_id">
                </form>
                <ul id="checklist"></ul>
                <form class="h-con va-center" id="hours-form">
                    <div class="v-con va-center" id="hours-left">
                        <div class="h-con va-center" id="hours-inputs">
                            <input type="number" placeholder="hours.">
                            <select name="action" id="hours-action">
                                <option value="ADD">Add</option>
                                <option value="REMOVE">Remove</option>
                            </select>
                        </div>
                        <button name="save_hours">Submit</button>
                        <input class="hidden-component-id" name="component_id" type="hidden">
                    </div>
                    <h2 id="hours"></h2>
                </form>
            </div>    
            <form method='post' class="v-con va-center ha-center" id="notepad">
                    <h2 class="h-con va-center ha-start wide">Notes</h2>
                    <textarea name="notes" id="project-notes"><?php echo $project_info['notes']?></textarea>
                    <div class="h-con ha-end va-center" id="save-notes-con">
                        <button name="save_notes" id="save-notes">Save</button>
                    </div>
            </form>
        </div>
        
    </div>
    </main>
</body>
<script>
    const projectData = JSON.parse('<?=$project_data?>');
    const notesJson = JSON.stringify('<?=$project_notes?>');
    const notes = JSON.parse(notesJson);
    const checklistData = JSON.parse('<?=$checklist_data?>')

    // view notes
    const notesBtn = document.getElementById('tb-notes-btn');
    const dashboard = document.getElementById('project-dashboard');
    const componentsCon = document.getElementById('project-components-con');
    const notepad = document.getElementById('notepad');

    const viewNotes = () => {
        window.getComputedStyle(dashboard).display === 'none' ? dashboard.style.display = 'flex' : dashboard.style.display = 'none';
        window.getComputedStyle(componentsCon).display === 'flex' ? componentsCon.style.display = 'none' : componentsCon.style.display = 'flex';
        window.getComputedStyle(notepad).display === 'none' ? notepad.style.display = 'flex' : notepad.style.display = 'none';
        notesBtn.innerText === 'Notes' ? notesBtn.innerText = 'Components' : notesBtn.innerText = 'Notes';

    }

    notesBtn.addEventListener('click', viewNotes);
</script>
<script type="module" src="../private/js/index.js"></script>
<script type="module" src="../private/js/project.js"></script>
</html>