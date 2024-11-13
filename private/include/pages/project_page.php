<?php
include '../private/classes/Part.php';
include '../private/classes/Project.php';
include '../private/classes/Checklist.php';

$project_class = new Project;
$part_class = new Part;
$checklist_class = new Checklist;
$project_info = $project_class->get_project($_SESSION['project']);
$project_components = $part_class->get_project_parts($_SESSION['project']);
$project_data = json_encode($project_components);
$project_notes = json_encode($project_info['notes']);
$checklist_data = json_encode($checklist_class->get_user_checklist($_SESSION['account']));
if(isset($_SESSION['tab'])){
    $tab = json_encode($_SESSION['tab']);
}else{
    $tab = $_SESSION['tab'] = 'notes';
}

// notes form
if(isset($_POST['save_notes'])){
    $sql_update = 'UPDATE projects SET notes = :notes WHERE user = :user AND project_id = :project_id';
    $data = array(
    ':notes' => $_POST['notes'],
    ':user' => $_SESSION['account'],
    ':project_id' => $_SESSION['project']
   );
   $project_class->update_project($sql_update, $data);
   $_SESSION['tab'] = 'notes';
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
    $checklist_class->add_to_checklist($_POST['checklist_component_id'], $_SESSION['account'], $_POST['checklist_item']);
    $_SESSION['tab'] = 'checklist';
    header('location: project.php');
    return;
}

// Add/remove hours 
if(isset($_POST['save_hours']) && isset($_POST['hours_action']) && isset($_POST['hours'])){
    $_SESSION['test'] =  $part_class->adjust_hours($_POST['component_id'], $_POST['hours_action'], $_POST['hours']);
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
        <div id="project-dashboard">
            <?php
                include '../private/include/partials/dt_project_toolbar.php'
            ?>
            <div class="v-con" id="checklist">
                <form method="post" class="v-con va-center ha-start" id="checklist-form">
                    <div class="h-con ha-center va-center form-elements" id="checklist-input">
                        <input type="text" name="checklist_item" placeholder="Add item to list.">
                        <button name="checklist">Submit</button>
                    </div>
                    <input class="hidden-component-id" type="hidden" name="checklist_component_id">
                    <ul class="v-con" id="list"></ul>
                </form>
            </div> 
            <div class="v-con va-center ha-center" id="hours-con">
                <form method='post' class="v-con va-center ha-center" id="hours-form">
                        <div class="h-con va-center" id="hours-inputs">
                            <input type="number" placeholder="hours" name="hours">
                            <select name="hours_action" id="hours-action">
                                <option value="ADD">Add</option>
                                <option value="REMOVE">Remove</option>
                            </select>
                        </div>
                        <button name="save_hours">Submit</button>
                        <input class="hidden-component-id" name="component_id" type="hidden">
                    <h2 id="hours"></h2>
                </form>
            </div>   
            <form method='post' class="v-con va-center ha-center" id="notepad">
                    <textarea name="notes" id="project-notes"><?php echo $project_info['notes']?></textarea>
                    <div class="h-con ha-end va-center" id="save-notes-con">
                        <button name="save_notes" id="save-notes">Save</button>
                    </div>
            </form>
            <div id="options"></div>
        </div>
    </div>
    </main>
</body>
<script>
    const projectData = JSON.parse('<?=$project_data?>');
    const notesJson = JSON.stringify('<?=$project_notes?>');
    const notes = JSON.parse(notesJson);
    const checklistData = JSON.parse('<?=$checklist_data?>')
    const tab = JSON.parse('<?=$tab?>');

    // view notes mobile
    const dashboard = document.getElementById('project-dashboard');
    const notesBtn = document.getElementById('tb-notes-btn');
    const checklistBtn = document.getElementById('tb-checklist-btn');
    const hoursBtn = document.getElementById('tb-checklist-btn');
    const notepad = document.getElementById('notepad');
    const checklist = document.getElementById('checklist');
    const hours = document.getElementById('hours-con');
    const mobileSelect = document.getElementById('mobile-select-con')
    const options = document.getElementById('options');

    function viewNotes(){
        checklist.style.display = 'none';
        notepad.style.display = 'flex';
        mobileSelect.style.display = 'none'
        return
    }

    notesBtn.addEventListener('click', viewNotes);

    // mobile checklist
   function viewChecklist(){
        mobileSelect.style.display = 'flex'
        notepad.style.display = 'none';
        checklist.style.display = 'block'
        return;
    }

    checklistBtn.addEventListener('click', viewChecklist);

    // mobile hours


    // view notes dt
    const dtNotesBtn = document.getElementById('dt-view-notes');
    const dtChecklistBtn = document.getElementById('dt-checklist-btn');
    const dtHoursBtn = document.getElementById('dt-hours-btn')

    function dtViewNotes(){
        const buttons = document.getElementsByClassName('dt-toolbar-btn');
        for(let i = 0; i < buttons.length; i++){
            buttons[i].className = buttons[i].className.replace(' dt-toolbar-selected', '');
        }

        checklist.style.display = 'none';
        hours.style.display = 'none';
        options.style.display = 'none'
        notepad.style.display = 'flex';
        dtNotesBtn.className += ' dt-toolbar-selected';
        dtNotesBtn.style.borderLeft = 'none';
        
        return;
    }

    dtNotesBtn.addEventListener('click', dtViewNotes);


    // dt view checklist
    function dtViewChecklist(){
        const buttons = document.getElementsByClassName('dt-toolbar-btn');
        for(let i = 0; i < buttons.length; i++){
            buttons[i].className = buttons[i].className.replace(' dt-toolbar-selected', '');
        }

        notepad.style.display = 'none';
        hours.style.display = 'none';
        options.style.display = 'none';
        checklist.style.display = 'block';
        dtChecklistBtn.className += ' dt-toolbar-selected'

        return;
    }

    dtChecklistBtn.addEventListener('click', dtViewChecklist)

    // dt view hours
    function dtViewHours(){
        const buttons = document.getElementsByClassName('dt-toolbar-btn');
        for(let i = 0; i < buttons.length; i++){
            buttons[i].className = buttons[i].className.replace(' dt-toolbar-selected', '');
        }
        
        notepad.style.display = 'none';
        checklist.style.display = 'none';
        options.style.display = 'none';
        hours.style.display = 'flex';

        dtHoursBtn.className += ' dt-toolbar-selected'
        return; 
    }

    dtHoursBtn.addEventListener('click', dtViewHours);

    //dt view options 
    const dtOptionsBtn = document.getElementById('dt-options-btn')

    function dtViewOptions(){
        const buttons = document.getElementsByClassName('dt-toolbar-btn');
        for(let i = 0; i < buttons.length; i++){
            buttons[i].className = buttons[i].className.replace(' dt-toolbar-selected', '');
        }

        notepad.style.display = 'none';
        hours.style.display = 'none';
        checklist.style.display = 'none';
        options.style.display = 'flex';
        dtOptionsBtn.className += ' dt-toolbar-selected'
        dtOptionsBtn.style.borderRight = 'none'

        return;
    }

    dtOptionsBtn.addEventListener('click', dtViewOptions)

    if(!tab || tab === 'notes'){
        dtViewNotes();
    } else if(tab === 'checklist'){
        dtViewChecklist();
    } else if(tab === 'options'){
        dtViewOptions();
    } else if(tab === 'hours'){
        dtViewHours();
    }
    
</script>
<script type="module" src="../private/js/index.js"></script>
<script type="module" src="../private/js/project.js"></script>
</html>