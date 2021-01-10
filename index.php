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

    <title>Reserveren Covidshop</title>
</head>
<body>
<div class="topnav">
    <img src="./logocovid.png">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>

    <h1> Afspraak maken</h1>
    <div class="grid">
        <div>
            Welkom bij de afspraak pagina van CovidShop.com. Om een afspraak te maken moet u eerst inloggen!
        </div>
        <div>
            Hoe maak je een afspraak:
            <ol>
                <li> Log in op deze pagina met een bestaand account, of maak een nieuw account.</li>
                <li> Druk op de "Kalender" knop.</li>
                <li> Druk op "Deze maand" , en kies een beschikbare datum die voor u uitkomt.</li>
                <li> Druk op de groene "Reserveer" knop</li>
                <li> Voer uw gegevens in</li>
                <li> Druk op verzenden, de reservering geslaagd, u krijgt een email ter bevestiging.</li>
            </ol>
        </div>
    </div>
    <div class="button">
        <form method="get" action="./calendar.php">
            <button type="submit">Kalender</button>
        </form>
    </div>
</body>
</html>