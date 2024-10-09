<?php
$day_of_year = date('z');
$number_of_days = date('t');
$today = date('d');
$month = date('F')
?>
<div id="calendar-con">
    <caption>
        <?php
        echo $month;
        ?>
    </caption>
    <table id="calendar">
        <th>
            <tr>
                <th>mon</th>
                <th>tue</th>
                <th>wed</th>
                <th>thurs</th>
            </tr>
        </th>
    </table>
</div>