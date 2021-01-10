<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Styles/test.css">
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
            Welkom bij de afspraak pagina van CovidShop.com. Als u op de "Kalender" knop drukt, wordt u doorverwezen naar de kalender waar u een afspraak kunt maken met een van onze doktoren
        </div>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam eius illo necessitatibus obcaecati repellat, voluptas.
        </div>
    </div>
    <div class="button">
        <form method="get" action="./calendar.php">
            <button type="submit">Kalender</button>
        </form>
    </div>
</body>
</html>