<?php
require_once 'php/db_connection.php'; //connecting the db_connection to this file
$conn = openCon();

$username = "timo"; //$_POST['username']
$email = "timo@wieme.eu"; //$_POST['email;]
$password = password_hash( "wieme",PASSWORD_DEFAULT); //$_POST['password']

// Insert into
$sql = "INSERT INTO users (username, email, password) 
            VALUES('$username', '$email', '$password')";
$result = mysqli_query($conn, $sql);

