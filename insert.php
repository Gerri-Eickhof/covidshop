<?php
include 'db_connection.php'; //connecting the db_connection to this file
$conn = openCon();

$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email =filter_input(INPUT_POST, 'email');
$phone =filter_input(INPUT_POST, 'phone');
$product =filter_input(INPUT_POST, 'product');

if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone) || !empty($product)) {
    $conn;
    $SELECT = "SELECT email From contact Where email = ? limit 1";
    $INSERT = "INSERT Into contact (id, firstname, lastname, email, phone, product) values (?, ?, ?, ?, ?)";
    
    // prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0){
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssis", $firstname, $lastname, $email, $phone, $product);
        $stmt->execute();
        echo "Alle gegevens zijn verstuurd!";
    } else {
        echo "Iemand heeft zich al aangemeld met dit email";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Alle velden zijn verplicht!";
    die();
}