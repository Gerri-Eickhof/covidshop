<?php
require_once 'php/db_connection.php'; //connecting the db_connection to this file
$conn = openCon();
$login = false;
if (isset($_POST['submit'])){
    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    //Get record from DB
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])){
            $login = true;
        } else {
            echo "Username or Password is incorrect";
        }
    } else {
        echo "Username or Password is incorrect";
    }
}

function build_calendar($month, $year){
    $mysqli = new mysqli('localhost', 'root', '', 'covid-db');
    $stmt = $mysqli-> prepare("select * from contact where MONTH(date) = ? AND YEAR(date) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }

            $stmt->close();
        }
    }

    // Een Array met alle dagen van de week
    $daysOfWeek = array('Zondag','Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');

    // Hiermee bepaal je de eerste dag van de maand
    $firstDayOfMonth = mktime(0,0,0, $month, 1, $year);

    // Hiermee bepaal je de hoeveelheid dagen in een maand.
    $numberDays = date('t',$firstDayOfMonth);

    // Informatie krijgen over de eerste dag van deze maand.
    $dateComponents = getdate($firstDayOfMonth);

    // De naam van deze maand krijgen
    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];

    // Hiermee krijg ik de datum van vandaag.
    $dateToday = date('Y-m-d');

    // Het maken van de HTML tabel (dus de kalender)
    $calendar= "<table class='table table-bordered'>";

    $calendar .="<center><h2>$monthName $year</h2>";

    // De knoppen om naar de volgende, vorige of huidige maand gaan op de kalender.
    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0, 0, $month-1, 1, $year)).
        "&year=".date('Y', mktime(0,0, 0, $month-1, 1, $year))."'>Vorige Maand</a>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Deze Maand</a>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0,0, 0, $month+1, 1, $year))."'>Volgende Maand</a></center><br>";

    $calendar.="<tr>";

    // Maken van de Headers van de kalender.
    foreach($daysOfWeek as $day){
        $calendar.="<th class='header'>$day</th>";
    }
    $calendar.= "</tr><tr>";

    // Met de variabele $dayOfWeek zorg je dat er maar 7 kolommen zijn in de tabel.
    if($dayOfWeek > 0) {
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.="<td></td>";
        }
    }

    $currentDay = 1;

    // Krijgen van het nummer van de maand.
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    while($currentDay <= $numberDays){

        // Als de 7e kolom (dus zaterdag) is bereikt, start een nieuwe rij.
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.="</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayName = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')? "today" : "";

        // Als de dag beschikbaar is om te boeken of niet, zal er een groene of rode knop op de dag zitten.
        if($date<date('Y-m-d')){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Niet Beschikbaar</button>";
        }elseif(in_array($date, $bookings)){
            $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Vol Geboekt</button>";
        }else{
            $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='reserveer.php?date=".$date."' class='btn btn-success btn-xs'>Reserveer</a>";

        }

        $calendar.="</td>";

        // Hiermee verhoog ik de tellers.
        $currentDay++;
        $dayOfWeek++;
    }

    // De rij van de laatste week van de maand afmaken, als dit nodig is.
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
    <link rel="stylesheet" href="Styles/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<header>
<!--    <div id="logo">-->
<!--        <img src="./logocovid.png">-->
    </div>
</header>
<!--De links voor de navigatiebar-->
<div class="topnav">
    <img src="./logocovid.png">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>

    <? if ($login){ ?>
       <? echo "Je bent ingelogd" ?>
        <? header('Location: index.php');?>
    <? }else { ?>
    <form action="" method="post">
<!--        <div class="login-container">-->
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username"/>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"/>
        </div>
        <div>
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
    <? } ?>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                 $dateComponents = getdate();
                 $month = $_GET['month'];
                 $year = $_GET['year'];



                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php

?>