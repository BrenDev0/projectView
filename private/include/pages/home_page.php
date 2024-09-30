<!DOCTYPE html>
<html lang="en">
<?php
include '../private/include/partials/html_head.php';
?>
<body id="home-body">
   <?php
    include '../private/include/partials/mobile_header.php'
   ?>
   <main id="home-main">
   <?php 
    include '../private/include/partials/mobile_nav.php';
    include '../private/include/partials/nav_bar.php';
    ?>
    <div class="h-con" id="tool-bar">
        <button id="new-project-btn">New Project</button>
        <button id="new-idea-btn">New Idea</button>
        <button>toolbar</button>
        <button>toolbar</button>
    </div>
    <?php
    // New project modal
    include '../private/include/partials/new_project_modal.php';
    // Recent projects component
    include '../private/include/partials/recent_projects_table.php'
    ?>
    <div>
        side by side
        <p>link to new project form</p>
        <p>link to new idea form</p>
    </div>
   </main> 
</body>
<script type="module" src="../private/js/index.js"></script>
</html>