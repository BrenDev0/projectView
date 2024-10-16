<?php
if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['description'])){
    $project = new Project();
    $project->add_project($_POST['name'], $_POST['type'], $_POST['description'], $_SESSION['account']);
    header('location: index.php');
    return;
}
?>

<div class="h-con ha-center va-center full" id="new-project-modal">
    <form class="v-con va-center ha-center" method="POST">
        <h2>Create a New Project</h2>
        <div class="v-con ha-center form-elements">
            <label for="">Project Name</label>
            <input name="name" type="text">
        </div>
        <div class="v-con ha-center form-elements">
            <label for="">Project Type</label>
            <select name="type" id="">
                <option selected value="personal">Personal</option>
                <option value="professional">Professional</option>
            </select>
        </div> 
        <div class="h-con ha-center va-center wide modal-form-btn-con">
            <button id="close-new-project-modal">Cancel</button>
            <button type="submit" value="new-project">Create</button>
        </div>
    </form>
</div>