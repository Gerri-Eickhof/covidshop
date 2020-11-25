<?php
include 'db_connection.php'; //connecting the db_connection to this file

$conn = openCon(); //making connection to the database

echo "Connected Successfully"; // echo when Successfully

closeCon($conn); //close connection

function build_calender($month, $year){
    //First od all we'll create an arrat containing names of all days in a week.
    $daysofWeek = array('Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');

    //Then we'll get the first day of the month that is in de argument of this function
    $firstDayofMonth = mktime(0, 0, 0, $month, 1, $year);

    //Now getting the numbers of days in a month
    $numberDays = date('t', $firstDayofMonth);

    //Getting some information about the first day of this month
    $dateComponents = getdate($firstDayofMonth);

    //Getting the name of this month
    $monthName = $dateComponents['month'];

    //Getting the index value 0-6 of the first day of this month
    $dayofWeek = $dateComponents['wday'];

    //Getting the current date
    $dateToday = date('Y-m-d');

    //Now crating the HTML table
    $calender = "<table class='table table-bordered'>";
    $calender .= "<center><h2>$monthName $year</h2></center>";

    $calender .= "<tr>";

    //Creating the calender headers
    foreach ($daysofWeek as $day) {
        $calender .= "<th class='header'>$day</th>";
    }

    $calender .= "</tr><tr>";

    //The variables $dayofWeek will make sure that there must be only 7 columns on our table
    if ($dayofWeek > 0) {
        for ($k = 0; $k < $dayofWeek; $k++) {
            $calender .= "<td></td>";
        }
    }

    //Initiating the day count
    $currentDay = 1;

    //Getting the month number
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {
        //if seventh column (saterday) reached, start a new row
        if ($dayofWeek == 7) {
            $dayofWeek = 0;
            $calender .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $calender .= "<td><h4>$currentDay</h4>";

        $calender .= "</td>";

        //Incrementing the counters
        $currentDay++;
        $dayofWeek++;
    }

    //Completing the row of the last week in the month, if necessary
    if ($dayofWeek != 7) {
        $remainingDays = 7 - $dayofWeek;
        for ($i = 0; $i < $remainingDays; $i++) {
            $calender .= "<td></td>";
        }
    }

    $calender .= "</tr>";
    $calender .= "</table>";

    echo $calender;
}
?>
<html>
<style type="text/css">
    /* style for the heading */
    th {
        font-family: Arial, Helvetica, sans-serif;
        font-size: .7em;
        background: #666666;
        color: #FFF;
        padding: 2px 6px;
        border-collapse: separate;
        text-align: center;
        vertical-align: middle;
    }
    td {
        font-family: Arial, Helvetica, sans-serif;
        font-size: .7em;
        vertical-align: middle;
        padding: 10px;
    }
    /* style for the album with different colors for even and odd */
    tr:nth-child(even) {
        background: white;
        color: black;
    }
    tr:nth-child(odd){
        background: darkgray;
        color: white;
    }
</style>
<body>
    <div class ="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                $month = $dateComponents['mon'];
                $year = $dateComponents ['year'];
                echo build_calender($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
