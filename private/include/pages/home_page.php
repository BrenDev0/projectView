<!DOCTYPE html>
<html lang="en">
<?php
include '../private/include/partials/html_head.php';
?>
<body id="home-body"> 
   <?php
    include '../private/include/partials/mobile_header.php';
    include '../private/include/partials/dt_header.php';
   ?>
   <main id="home-main">
   <?php 
    // diplayed only on mobile
    include '../private/include/partials/mobile_nav.php';
    include '../private/include/partials/toolbar.php';
    //nav bar for desktop
    include '../private/include/partials/nav_bar.php';
    // New project modal
    include '../private/include/partials/new_project_modal.php';
    include '../private/include/partials/new_idea_modal.php';
    // Recent projects component
    include '../private/include/partials/recent_projects_table.php'
    ?>
    <div class="h-con va-center" id="dashboard-elements-con">
        <div class="dashboard-element"></div>
        <div class="dashboard-element"></div>
    </div>
   </main> 
</body>
<?php
require '../private/include/partials/script.php'
?>
</html>