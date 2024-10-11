<?php
$year = date('Y');
$month = date('m');
?>
<div id="calendar-con">
    <div class="date-select-con wide h-con ha-center va-center">
        <select  name="month" id="month-select"></select>
        <select name="year" id="year-select"></select>
    </div>
    <div id="days-con">
        <div class="day-names" style="grid-column-start: 0; grid-column-end: 1; grid-row-start: 0; grid-row-end: 1;">Sunday</div>
        <div class="day-names" style="grid-column-start: 1; grid-column-end: 2; grid-row-start: 0; grid-row-end: 1;">Monday</div>
        <div class="day-names" style="grid-column-start: 2; grid-column-end: 3; grid-row-start: 0; grid-row-end: 1;">Tuesday</div>
        <div class="day-names" style="grid-column-start: 3; grid-column-end: 4; grid-row-start: 0; grid-row-end: 1;">Wedensday</div>
        <div class="day-names" style="grid-column-start: 4; grid-column-end: 5; grid-row-start: 0; grid-row-end: 1;">Thursday</div>
        <div class="day-names" style="grid-column-start: 5; grid-column-end: 6; grid-row-start: 0; grid-row-end: 1;">Friday</div>
        <div class="day-names" style="grid-column-start: 6; grid-column-end: 7;grid-row-start: 0; grid-row-end: 1;">Saturday</div>
    </div>
</div>