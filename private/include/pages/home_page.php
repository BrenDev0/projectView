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
<?php
require '../private/include/partials/script.php';
?>
</html>