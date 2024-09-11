<?php
include 'functions-inc.php';

$name = $_POST['name'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['psw'];
$conf_pass = $_POST['psw_repeat'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$bday = $_POST['bday'];


//name validation
if (!validate_name($name)) {
    header('Location: ../sign_up.php');
    exit;
}

//lname validation
if (!validate_lastname($lname)) {
    header('Location: ../sign_up.php');
    exit;
}

//username validation
if (!validate_username($username)) {
    header('Location: ../sign_up.php');
    exit;
}

//password validation
if (!validate_password($password, $conf_pass)) {
    header('Location: ../sign_up.php');
    exit;
}

//email validation
if (!validate_email($email)) {
    header('Location: ../sign_up.php');
    exit;
}

//gender validation
if (!validate_gender($gender)) {
    header('Location: ../sign_up.php');
    exit;
}

//date validation
if (!validate_birtdate($bday)) {
    header('Location: ../sign_up.php');
    exit;
}

//photo validation
$filename = validate_photo($username);
if (!$filename) {
    header('Location: ../sign_up.php');
    exit;
}


$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//checking if username already exists in the database and if it does the submit is cancelled
$query = "SELECT username FROM users WHERE username='$username';";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../sign_up.php');
    exit;
}

$count = mysqli_num_rows($result);
if ($count > 0) {
    $con->close();
    header('Location: ../sign_up.php');     //pes tou to pire allos file
    exit;
}


$query = "INSERT INTO users (name, lname, bday, gender, username, pass, email, photo, acctype) VALUES ('$name','$lname','$bday','$gender','$username','$password','$email','$filename','normal');";

$result = mysqli_query($con, $query);
if ($result) {
    header('Location: ../login.php');
} else {
    header('Location: ../sign_up.php');
}

$con->close();
