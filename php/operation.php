<?php
require_once ("db_connection.php");
require_once ("components.php");
require_once ("php-mailer.php");

$conn = openCon(); //making connection to the database

// Create button Click
if(isset($_POST['create'])) {
    //making variables of the checked input
    $firstname = mysqli_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_escape_string($conn, $_POST['lastname']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $adress = mysqli_escape_string($conn, $_POST['adress']);
    $zipcode = mysqli_escape_string($conn, $_POST['zipcode']);
    $city = mysqli_escape_string($conn, $_POST['city']);
    $products = mysqli_escape_string($conn, $_POST['products']);
    $date = mysqli_escape_string($conn, $_POST['date']);
    $time = mysqli_escape_string($conn, $_POST['time']);

    //Require the form validation handling
    require_once "php/form-validation.php";
    if (empty($errors)) {
        //Save the record to the database
        $sql = "INSERT INTO contact(firstname, lastname, email, phone, adress, zipcode, city, state, products, date, time)
        VALUES('$firstname', '$lastname', '$email', '$phone', '$adress', '$zipcode', '$city', '$state', '$products', '$date', '$time')";
        $result = mysqli_query($conn, $sql)
        or die ('Error: ' . $sql);
        if ($result) {
            sentMail();
            TextNode("succes", "Afpraak is goed toegevoegd!");
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($conn);
        }
    }
}

if(isset($_POST['update'])){
    updateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

// Data from textbox in to db

//checking textbox value and mysql injections
function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['conn'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

//message
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

// get data from mysql database
function getData(){
    $sql = "SELECT * FROM contact";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
     }
}

//update data
function updateData(){
    $id = textboxValue("id");
    $firstname = textboxValue("firstname");
    $lastname = textboxValue("lastname");
    $email = textboxValue("email");
    $phone = textboxValue("phone");
    $adress = textboxValue("adress");
    $zipcode = textboxValue("zipcode");
    $city = textboxValue("city");
    $state = textboxValue("state");
    $products = textboxValue("products");
    $date = textboxValue("date");
    $time = textboxValue("time");
    if ($firstname&&$lastname&&$email&&$phone&&$adress&&$zipcode&&$city&&$state&&$products&&$date&&$time) {
        $sql = "UPDATE contact SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', adress='$adress',  zipcode='$zipcode', city='$city', state='$state', products='$products', date='$date', time='$time'
               WHERE id=$id";
        if (mysqli_query($GLOBALS['conn'], $sql)) {
            TextNode("succes", "Afpraak is aangepast!");
        } else {
            echo "Error bij het aanpassen van de afspraak";
        }
    }else{
        TextNode("error", "Voer alle gegevens in");
    }
}

function deleteRecord(){
    $id = (int)textboxValue("id");
    $sql = "DELETE FROM contact WHERE id=$id";
    if(mysqli_query($GLOBALS['conn'], $sql)){
        TextNode("succes", "Record Deleted Successfully!");
    }else{
        TextNode("error", "Enable to Deleted Record!");
    }
}
