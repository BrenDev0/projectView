<?php
require '../private/classes/Calendar.php';
date_default_timezone_set('America/Los_Angeles');

$day = date('d');
$month = date('m');
$year = date('Y');
$calendar_data = new Calendar;
$user_calendar = $calendar_data->get_user_calendar($_SESSION['account']);
?>

<div class="h-con ha-center" id="tasks">
    <h2>Calendar items for today</h2>
    <div>
        <?php
        foreach($user_calendar as $item){
           $d = $item['day'];
           $m = $item['month'];
           $y = $item['year'];
           if($d == $day && $m == $month && $y == $year){
            $title = $item['title'];
           };
        }
        ?>
    </div>
</div>