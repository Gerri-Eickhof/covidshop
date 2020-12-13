<?php
require_once 'php/db_connection.php'; //connecting the db_connection to this file
$conn = openCon();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$state = $_POST['state'];
$products = $_POST['products'];
$date = $_POST['date'];
$time = $_POST['time'];

echo $firstname. "<br>";
echo $lastname. "<br>";
echo $email. "<br>";
echo $phone. "<br>";
echo $products. "<br>";
echo $date. "<br>";
echo $adress. "<br>";
echo $zipcode. "<br>";
echo $city. "<br>";
echo $state. "<br>";
echo $time. "<br>";

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO contact(firstname, lastname, email, phone, adress, zipcode, city, state, products, date, time) 
            VALUES('$firstname', '$lastname', '$email', '$phone', '$adress', '$zipcode', '$city', '$state', '$products', '$date', '$time')";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully";
    } else {
        echo "Error, could not execute" . mysqli_error($conn);
    }
    closeCon($conn); //close connection
}
