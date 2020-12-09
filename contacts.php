<?php
require_once 'db_connection.php'; //connecting the db_connection to this file
$conn = openCon(); //making connection to the database

//Get the result set from the database with a SQL query
$result = mysqli_query($conn, "SELECT id, firstname, lastname, email, phone, adress, zipcode, city, products, date, time FROM contact")
or die(mysqli_error());

//Loop through the result to create a custom array
$contacts=[];
while($row = mysqli_fetch_assoc(MYSQLI_ASSOC)){
    $contacts[] =
        [
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row[''],
            'id' => $row['']
            ];
}

?>
<!doctype html>
<html>
<head
<title>
    Afspraak maken.
</title>
<body>
<link href = '' type = "text/css" rel="stylesheet" />
<form method="post" action="reserveringssysteem.php">
    Voornaam : <input type="text" name="voornaam"><br><br>
    Achternaam : <input type="text" name="achternaam"><br><br>
    Email : <input type="text" name="email"><br><br>
    TelefoonNummer : <input type="number" name="telefoonnummer"><br>
    <input type="submit" value="Verzenden">
</form>
</body>
</html>
</body>
</html>
