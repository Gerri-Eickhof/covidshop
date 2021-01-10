<?php
require_once 'includes/db_connection.php'; //connecting the db_connection to this file
$conn = openCon();

$login = false;

if (isset($_POST['submit'])){
    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    //Get record from DB
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])){
            $login = true;
        } else {
            echo "Username or Password is incorrect";
        }
    } else {
        echo "Username or Password is incorrect";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<? if ($login){ ?>
    <p> Je bent ingelogd! </p>
    <?// header('Location:contacts.includes');?>
<? }else { ?>
<body>
    <form action="" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username"/>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"/>
        </div>
        <div>
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
<? } ?>
</body>
</html>