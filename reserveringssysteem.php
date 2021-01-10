<?php
session_start();
$voornaam = filter_input(INPUT_POST, 'voornaam');
$achternaam = filter_input(INPUT_POST, 'achternaam');
$email = filter_input(INPUT_POST, 'email');
$telefoon = filter_input(INPUT_POST, 'telefoonnummer');
if (!empty($voornaam)) {
    if (!empty($achternaam)) {
        if (!empty($email)) {

                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "covid-db";
// Create connection
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()) {
                    die('Connect Error (' . mysqli_connect_errno() . ') '
                        . mysqli_connect_error());
                } else {
                    $sql = "INSERT INTO reserveringen (voornaam, achternaam, email, telefoonnummer)
values ('$voornaam','$achternaam', '$email', '$telefoon')";
                    if ($conn->query($sql)) {
                        echo "Gegevens succesvol verzonden!";
                    } else {
                        echo "Error: " . $sql . "" . $conn->error;
                    }
                    $conn->close();
                }
            } else {
                echo "Voornaam mag niet leeg gelaten worden";
                die();
            }
             } else {
            echo "Achternaam mag niet leeg gelaten worden";
            die();
        }
              } else {
        echo "Email mag niet leeg gelaten worden";
        die();
    }
        ?>;
<!doctype html>
<html>
<head>
    <title>
        Afspraak maken.
    </title>
</head>
<body>
<a href="index.php">Keer terug naar de Reserveer pagina!</a>
</body>
</html>
</body>
</html>
