<!DOCTYPE html>
<html lang="en">
<?php
include '../private/include/partials/html_head.php';
?>
<body id="home-body"> 
    <!-- Mobile -->
   <main id="home-main-mobile">
   <?php 
    include '../private/include/partials/mobile_header.php';
    include '../private/include/partials/mobile_nav.php';
    include '../private/include/partials/toolbar.php';
    // Modals
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

   <!-- Desktop -->
   <main id="home-main">
    <?php
    include '../private/include/partials/dt_header.php';
    include '../private/include/partials/nav_bar.php';
    ?>
        <div class="con h-con">
            <?php
            include '../private/include/partials/projects_table.php';
            include '../private/include/partials/tasks.php';
            ?>
        </div>
    </main>
</body>
<?php
require '../private/include/partials/script.php';
?>
</html>