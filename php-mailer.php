<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';

// Variables from form to variables in this file
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

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Debug server side
    $mail->SMTPDebug = 2;
    // settings from mail server
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username = 'olivier.appel@gmail.com';
    $mail->Password = 'ctwwqplxpwzbkjvt';

    // mail from, where to and reply email (cc and bcc can be used when removing //
    $mail->setFrom('olivier.appel@gmail.com');
    $mail->addAddress($email, $firstname . " " . $lastname);
    $mail->addReplyTo('olivier.appel@gmail.com');
    //$mail->addCC('');
    //$mail->addBCC('');

    // Subject of the mail with the date of reservation
    $mail->Subject = "Bevestiging Covidshop op $date";
    // Making the body of the mail
    $Body = "Geachte $firstname $lastname,\n\n";
    $Body .= "Hierbij bevestigen wij uw afspraak op $date om $time. ";
    $Body .= "Wij zullen de $products testen uitvoeren op $adress, $city in $state\n\n";

    // Using the Body for the mail
    $mail->Body = $Body;

    $mail->send();
    // redirecting back to previous page
    header("Location: http://localhost/covidshop/contacts.php", true, 301);
} catch(Exception $exception) {
    // error message in case something went wrong
    echo "Error:" . $mail->ErrorInfo;
}