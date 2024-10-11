<!DOCTYPE html>
<html lang="en">
<?php
include '../private/include/partials/html_head.php';
?>

<!-- Desktop -->
<body id="calendar-body">
    <main id="calendar-main">
        <?php
        include '../private/include/partials/dt_header.php';
        include '../private/include/partials/nav_bar.php';
        include '../private/include/partials/calendar_table.php';
        ?>
    </main>
</body>
<script type="module" src="../private/js/calendar.js"></script>
</html>