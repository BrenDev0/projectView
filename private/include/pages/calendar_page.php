<?php
$calendar = new Calendar;
$user_calendar = $calendar->get_user_calendar($_SESSION['account']);
$calendar_data = json_encode($user_calendar);
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../private/include/partials/html_head.php';
?>
<body id="calendar-body">
        <main id="calendar-main">
        <?php
        // Mobile
        include '../private/include/partials/mobile_header.php';
        include '../private/include/partials/mobile_nav.php';
        include '../private/include/partials/new_project_modal.php';
        // Desktop
        include '../private/include/partials/calendar_event_modal.php';
        include '../private/include/partials/dt_header.php';
        include '../private/include/partials/nav_bar.php';
        include '../private/include/partials/calendar_table.php';
        ?>
    </main>
</body>
<script>
    const calendarData = JSON.parse('<?= $calendar_data?>');
</script>
<script type="module" src="../private/js/calendar.js"></script>
<script type="module" src="../private/js/index.js"></script>
</html>