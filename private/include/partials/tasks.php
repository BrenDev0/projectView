<?php
require '../private/classes/Calendar.php';
date_default_timezone_set('America/Los_Angeles');


$day = date('d');
$month = date('m');
$year = date('Y');
$calendar = new Calendar;
$today = $calendar->get_calendar_items($day, $month, $year, $_SESSION['account']);

?>

<div class="v-con va-center full" id="tasks">
    <h2>Calendar items for today</h2>
    <div class="wide">
        <?php
        if(sizeof($today) < 1){
            echo "<p class='h-con ha-center va-center'>No items for today</p>";
        }else{
            foreach($today as $item){
                $title = htmlentities($item['title']);
                $description = htmlentities($item['description']);
                $start = htmlentities($item['start_time']);
                $end = htmlentities($item['end_time']);
                echo "<div class='h-con va-center calendar-item'>
                    <p>$title</p>
                    <p>$description</p>
                    <div class='v-con'>
                        <p>$start</p>
                        <p>$end</p>
                    </div>
                    </div>";
            }
        }
        ?>
    </div>
</div>