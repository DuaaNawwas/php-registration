<?php

$fullName = $_POST['fullName'];
$email = $_POST['emailValue'];
$phone = $_POST['phoneValue'];
$dob = $_POST['dobValue'];
$password = $_POST['passwordValue'];
// $image = $_FILES['image']['name'];

// instantiate RegisterContr class
include "../classes/dbh.class.php";
include "../classes/register.class.php";
include "../classes/register-contr.class.php";
$register = new RegisterContr($fullName, $email, $password, $dob, $phone);


// run error handlers and user register
$register->registerUser();

if ($register->err) {
    echo $register->err;
} else {

    // Send the user to welcome page
    // use echo to send it as a response to js

    echo $register->location;
}
