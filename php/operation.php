<?php
require_once ("db_connection.php");
require_once ("components.php");

$conn = openCon(); //making connection to the database

// Create button Click
if(isset($_POST['create'])){
        createData();
}


// Data from textbox in to db
function createData(){
    //making variables of the checked input
    $firstname = textboxValue("firstname");
    $lastname = textboxValue("lastname");
    $email = textboxValue("email");
    $phone = textboxValue("phone");
    $tempadress = textboxValue("adress");
    $tempnumber = textboxValue("housenumber");
    $adress = $tempadress. " " . $tempnumber;
    $zipcode = textboxValue("zipcode");
    $city = textboxValue("city");
    $state = textboxValue("state");
    $products = textboxValue("products");
    $date = textboxValue("date");
    $time = textboxValue("time");

    // variables in to the db
    if ($firstname&&$lastname&&$email&&$phone&&$adress&&$zipcode&&$city&&$state&&$products&&$date&&$time){
        $sql = "INSERT INTO contact(firstname, lastname, email, phone, adress, zipcode, city, state, products, date, time) 
        VALUES('$firstname', '$lastname', '$email', '$phone', '$adress', '$zipcode', '$city', '$state', '$products', '$date', '$time')";
        if(mysqli_query($GLOBALS['conn'], $sql)){
            TextNode("succes", "Afpraak is goed toegevoegd!");
        }else{
            echo "Error";
        }
    }else{
        TextNode("error", "Voer alle gegevens in");   }
}


//checking textbox value and mysql injections
function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['conn'], trim($_POST[$value] ));
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

//    $errors = [];
//    if ($firstname == ""){
//        $errors [] = 'Voornaam mag niet leeg zijn';
//    }
//    if ($lastname == ""){
//        $errors [] = 'Achternaam mag niet leeg zijn';
//    }
//    if ($email == ""){
//        $errors [] = 'Email mag niet leeg zijn';
//    }
//    if ($phone == ""){
//        $errors [] = 'Telefoonnummer mag niet leeg zijn';
//    }
//    if ($adress == ""){
//        $errors [] = 'Adres mag niet leeg zijn';
//    }
//    if ($zipcode == ""){
//        $errors [] = 'Postcode mag niet leeg zijn';
//    }
//    if ($city == ""){
//        $errors [] = 'Plaats mag niet leeg zijn';
//    }
//    if ($state == ""){
//        $errors [] = 'Provincie mag niet leeg zijn';
//    }
//    if ($products == ""){
//        $errors [] = 'Hoeveelheid Testen mag niet leeg zijn';
//    }
//    if ($date == ""){
//        $errors [] = 'Datum mag niet leeg zijn';
//    }
//    if ($time == ""){
//        $errors [] = 'Tijd mag niet leeg zijn';
//    }
//    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($adress) && !empty($zipcode) && !empty($city) && !empty($products) && !empty($date) && !empty($time)){
?>
