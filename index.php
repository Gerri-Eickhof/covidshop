<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Styles/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="includes/script.js"></script>
    <title>Reserveren Covidshop</title>
</head>
<body>
<!--Nav Bar-->
<div class="topnav">
    <img src="./logocovid.png">
    <a href="index.php">Home</a>
    <a href="calendar.php">Kalender</a>
    <? if (isset($_SESSION['login'])) { ?>
        <a href="contacts.php">Overzicht van alle afspraken</a>
        <a href="logout.php">Logout</a>
    <? }else { ?>
        <!-- Code for login button which is a pop-up form   -->

        <button class="open-button" onclick="openForm()">Login</button>

        <div class="form-popup" id="myForm">
            <form action="login.php" method="post" class="form-container">
                <h1>Login</h1>
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div>
                    <button type="submit" name ="submit" class="btn">Login</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </div>
            </form>
        </div>
    <? } ?>
</div>
    <h1> Afspraak maken</h1>
    <div class="grid">
        <div>
            Welkom bij de afspraak pagina van CovidShop.com. Als u op de "Kalender" knop drukt, wordt u doorverwezen naar de kalender waar u een afspraak kunt maken met een van onze doktoren
        </div>
        <div>
            Hoe maak je een reservering:
            <ol>
                <li>Login op de pagina met een bestaand account, of registreer een nieuw account.</li>
                <li>Klik op de "Kalender" knop, deze zal u doorsturen naar de Kalender om te reserveren.</li>
                <li>Druk op de knop "Deze maand", of kies een maand en die voor u uitkomt. (De data met een groene "Reserveer" knop zijn beschikbaar.)</li>
                <li>Voer de correcte gegevens in, in het formulier</li>
                <li>Druk op verzenden, uw afsrpaak is bevestigd wanneer u een bevestigings email ontvangt.</li>
            </ol>
        </div>
    </div>
    <div>
        <a href="./calendar.php?month=01&year=2021" class="calendar-button">Kalender</a>
    </div>
</body>
</html>