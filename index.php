<?php
require_once 'php/db_connection.php'; //connecting the db_connection to this file

$conn = openCon(); //making connection to the database

// making a record for firs-, lastname and email.
// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Olivier', 'Vromans', 'olivier@vromans.eu')";
// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

closeCon($conn); //close connection
?>
<html>
<body>
  <form action="insert.php" method="post">
    <table>
      <tr>
        <td>Voornaam:</td>
        <td><input type="text" name="firstname"></td>
      </tr>
      <tr>
        <td>Achternaam:</td>
        <td><input type="text" name="lastname"></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="email" name="email"></td>
      </tr>
      <tr>
        <td>Telefoonnummer:</td>
        <td><input type="tel" name="phone"></td>
      </tr>

      <tr>
        <td>adres:</td>
        <td><input type="text" name="adress"></td>
      </tr>
      <tr>
        <td>Postcode:</td>
        <td><input type="text" name="zipcode"></td>
      </tr>
      <tr>
        <td>Plaats:</td>
        <td><input type="text" name="city"></td>
      </tr>
        <tr>
            <td>Provincie:</td>
            <td><input type="text" name="state"></td>
        </tr>
      <tr>
        <td>Hoeveelheid testen:</td>
        <td><input type="number" min="0" name="products"></td>
      </tr>
      <tr>
        <td>Datum:</td>
        <td><input type="date" name="date"></td>
      </tr>
      <tr>
        <td>Tijd:</td>
        <td><input type="time" name="time"></td>
      </tr>
      <tr>
        <td>Versturen :</td>
        <td><input type="submit" name="submit" value="submit"></td>      </tr>
    </table>
  </form>
</body>
</html>