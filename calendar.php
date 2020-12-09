<?php
function build_calendar($month, $year){
    $daysOfWeek = array('Zondag','Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');
    $firstDayOfMonth = mktime(0,0,0, $month, 1, $year);
    $numberDays = date('t',$firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');

    $calendar = "<table class='table table-bordered'>";

    $calendar.="<center><h2>$monthName $year</h2>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0,0, 0, $month-1, 1, $year))."'>Vorige Maand</a>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Deze Maand</a>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0,0, 0, $month+1, 1, $year))."'>Volgende Maand</a></center><br>";

    $calendar.="<tr>";
    foreach($daysOfWeek as $day){
        $calendar.="<th class='header'>$day</th>";
    }
    $calendar.= "</tr><tr>";

    if($dayOfWeek > 0) {
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.="<td></td>";
        }
    }

    $currentDay = 1;
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while($currentDay <=$numberDays){

        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.="</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayName = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')? "today" : "";
        if($date<date('Y-m-d')){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Niet Beschikbaar</button>";
        }else{
            $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='reserveer.php?date=".$date."' class='btn btn-success btn-xs'>Reserveer</a>";

        }

        $calendar.="</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek !=7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.="<td></td>";
        }
    }

    $calendar.="</tr>";
    $calendar.="</table>";

    echo $calendar;

}
?>

<html>
<head>
    <meta name="viewport" content=""width="device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        table{
            table-layout: fixed;
        }

        td{
            width: 33%;
        }

        .today{
            background: rgb(52, 194, 189);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                 $dateComponents = getdate();
                 $month = $dateComponents['mon'];
                 $year = $dateComponents['year'];
                 echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php

?>