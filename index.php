<?php
include 'db_connection.php'; //connecting the db_connection to this file

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
  <form action="insert.php" method="POST">
    <table>
      <tr>
        <td>Voornaam :</td>
        <td><input type="text" name="firstname"></td>
      </tr>
      <tr>
        <td>Achternaam :</td>
        <td><input type="text" name="lastname"></td>
      </tr>
      <tr>
        <td>Email :</td>
        <td><input type="email" name="email"></td>
      </tr>
      <tr>
        <td>Versturen :</td>
        <td><input type="submit" value="submit"></td>
      </tr>
    </table>
  </form>
</body>
</html>