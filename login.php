<?php
require_once 'php/db_connection.php'; //connecting the db_connection to this file
$conn = openCon();

$login = true;

//if (isset($_POST['submit'])){
//    $username = mysqli_escape_string($conn, $_POST['username']);
//    $password = $_POST['password'];
//
//    //Get record from DB
//    $sql = "SELECT * FROM users WHERE username='$username'";
//    $result = mysqli_query($conn, $sql);
//    if (mysqli_num_rows($result) == 1){
//        $user = mysqli_fetch_assoc($result);
//        if (password_verify($password, $user['password'])){
//            $login = true;
//        } else {
//            echo "Username or Password is incorrect";
//        }
//    } else {
//        echo "Username or Password is incorrect";
//    }
//}
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    /** @var mysqli $db */
    require_once "php/db_connection.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstname  = mysqli_escape_string($conn, $_POST['firstname']);
    $lastname   = mysqli_escape_string($conn, $_POST['lastname']);
    $email      = mysqli_escape_string($conn, $_POST['email']);
    $phone      = mysqli_escape_string($conn, $_POST['phone']);
    $adress     = mysqli_escape_string($conn, $_POST['adress']);
    $zipcode    = mysqli_escape_string($conn, $_POST['zipcode']);
    $city       = mysqli_escape_string($conn, $_POST['city']);
    $products   = mysqli_escape_string($conn, $_POST['products']);
    $date       = mysqli_escape_string($conn, $_POST['date']);
    $time       = mysqli_escape_string($conn, $_POST['time']);

    //Require the form validation handling
    require_once "php/form-validation.php";

    //Special check for add form only
//    if(isset($_REQUEST['$state']) && $_REQUEST['$state'] == '0') {
//        $errors['state'] = 'Provincie mag niet leeg zijn';
//    }
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
<!--    --><?// header('Location:contacts.php');?>
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
    <form action="" method="post" enctype="multipart/form-data">
        <div class="data-field">
            <label for="firstname">Firstname</label>
            <input id="firstname" type="text" name="firstname" value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>"/>
            <span class="errors"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="lastname">Lastname</label>
            <input id="lastname" type="text" name="lastname" value="<?= isset($lastname) ? htmlentities($lastname) : '' ?>"/>
            <span class="errors"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="<?= isset($email) ? htmlentities($email) : '' ?>"/>
            <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="phone">Phone</label>
            <input id="phone" type="text" name="phone" value="<?= isset($phone) ? htmlentities($phone) : '' ?>"/>
            <span class="errors"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="adress">adress</label>
            <input id="adress" type="text" name="adress" value="<?= isset($adress) ? htmlentities($adress) : '' ?>"/>
            <span class="errors"><?= isset($errors['adress']) ? $errors['adress'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="zipcode">zipcode</label>
            <input id="zipcode" type="text" name="zipcode" value="<?= isset($zipcode) ? htmlentities($zipcode) : '' ?>"/>
            <span class="errors"><?= isset($errors['zipcode']) ? $errors['zipcode'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="city">city</label>
            <input id="city" type="text" name="city" value="<?= isset($city) ? htmlentities($city) : '' ?>"/>
            <span class="errors"><?= isset($errors['city']) ? $errors['city'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="<?= isset($email) ? htmlentities($email) : '' ?>"/>
            <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="products">products</label>
            <input id="products" type="text" name="products" value="<?= isset($products) ? htmlentities($products) : '' ?>"/>
            <span class="errors"><?= isset($errors['products']) ? $errors['products'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="date">date</label>
            <input id="date" type="text" name="date" value="<?= isset($date) ? htmlentities($date) : '' ?>"/>
            <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="time">time</label>
            <input id="time" type="text" name="time" value="<?= isset($time) ? htmlentities($time) : '' ?>"/>
            <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
        </div>
        <div class="data-submit">
            <input type="submit" name="submit" value="Save"/>
        </div>
        <? if(!$errors){
            print_r($errors);
        } ?>
    </form>
</body>
</html>