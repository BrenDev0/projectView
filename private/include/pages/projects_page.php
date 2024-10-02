<!DOCTYPE html>
<html lang="en">
<?php
require '../private/include/partials/html_head.php'
?>
<body>
   <?php
   include '../private/include/partials/mobile_header.php'
   ?>
   <main>
   <?php 
    include '../private/include/partials/mobile_nav.php';
    include '../private/include/partials/nav_bar.php';
    include '../private/include/partials/toolbar.php';
    // modals
    include '../private/include/partials/new_project_modal.php';
    include '../private/include/partials/new_idea_modal.php';

    // mobile projects table
    include '../private/include/partials/mobile_projects_table.php';
    ?>
   </main>
</body>
<script type="module" src="../private/js/index.js"></script>
</html>