<?php
require_once 'db_connection.php'; //connecting the db_connection to this file
$conn = openCon();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

echo $firstname. "<br>";
echo $lastname. "<br>";
echo $email. "<br>";

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO test(firstname, lastname, email) VALUES('$firstname', '$lastname', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Records added succesfully";
    } else {
        echo "Error, could not execute" . mysqli_error($conn);
    }
    closeCon($conn); //close connection
}