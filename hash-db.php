<?php
require_once 'php/db_connection.php'; //connecting the db_connection to this file
$conn = openCon();

$username = "admin"; //$_POST['username']
$email = "olivier@vromans.eu"; //$_POST['email;]
$password = password_hash( "test",PASSWORD_DEFAULT); //$_POST['password']

// Insert into
$sql = "INSERT INTO users (username, email, password) 
            VALUES('$username', '$email', '$password')";
$result = mysqli_query($conn, $sql);
