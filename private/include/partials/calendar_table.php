<?php
$title = date('F');
$month = date('m');
$year = date('Y');
$number_of_days = date('t');
$first_day_index = jddayofweek(gregoriantojd($month,01, $year));
$last_day_index = jddayofweek(gregoriantojd(10,$number_of_days,$year));

?>
<div id="calendar-con">
    <h2 class="wide h-con ha-center va-center">
        <?php
            echo $title;
        ?>
    </h2 class="wide h-con ha-center va-center">
    <div id="days-con">
        <div class="day-names" style="grid-column-start: 0; grid-column-end: 1; grid-row-start: 0; grid-row-end: 1;">Sunday</div>
        <div class="day-names" style="grid-column-start: 1; grid-column-end: 2; grid-row-start: 0; grid-row-end: 1;">Monday</div>
        <div class="day-names" style="grid-column-start: 2; grid-column-end: 3; grid-row-start: 0; grid-row-end: 1;">Tuesday</div>
        <div class="day-names" style="grid-column-start: 3; grid-column-end: 4; grid-row-start: 0; grid-row-end: 1;">Wedensday</div>
        <div class="day-names" style="grid-column-start: 4; grid-column-end: 5; grid-row-start: 0; grid-row-end: 1;">Thursday</div>
        <div class="day-names" style="grid-column-start: 5; grid-column-end: 6; grid-row-start: 0; grid-row-end: 1;">Friday</div>
        <div class="day-names" style="grid-column-start: 6; grid-column-end: 7;grid-row-start: 0; grid-row-end: 1;">Saturday</div>
        <?php
            $row_start = 1;
            for($i = 0; $i < $first_day_index; $i++){
                $col_end = $i + 1;
                echo "<div class='day' style='grid-column-start: $i ; grid-column-end: $col_end;grid-row-start: 1; grid-row-end: 2;'></div>";
            }
            for($i = 1; $i < $number_of_days + 1; $i++){
                $col_start = jddayofweek(gregoriantojd($month,$i, $year));
                $col_end = $col_start + 1;
                $row_end = $row_start + 1;
                echo "<div class='day' style='grid-column-start: $col_start; grid-column-end: $col_end; grid-row-start: $row_start; grid-row-end: $row_end;'>$i</div>";
                if($col_start === 6){
                    $row_start = $row_start + 1;
                }
            }
            for($i = $last_day_index + 1; $i < 7; $i++){
                $col_end = $i + 1;
                $row_end = $row_start + 1;
                echo "<div class='day' style='grid-column-start: $i ; grid-column-end: $col_end;grid-row-start: $row_start; grid-row-end: $row_end;'></div>";
            }
        ?>
    </div>
</div>