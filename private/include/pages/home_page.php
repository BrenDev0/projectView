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
        <div class="v-con ha-center stacked">
        <?php
        include '../private/include/partials/recent_projects_table.php';
        ?>
        <div id="hours">Hours this week</div>
        </div>
        <div class="long">Todays tasks</div>
        <div class="v-con ha-center stacked">
            <div>new project form</div>
            <div>new idea form</div>
        </div>
    </div>
    </main>
</body>
<?php
require '../private/include/partials/script.php';
?>
</html>