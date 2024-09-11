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

$con = mysqli_connect('localhost', 'root', '', 'ergasia');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query = "SELECT name , lname , bday , gender , pass , email FROM users WHERE username='$username' ;";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../update_profile.php');
    exit;
}

$row = mysqli_fetch_array($result);

//name validation
if (!validate_name($name)) {
    header('Location: ../update_profile.php');
    exit;
}

//lname validation
if (!validate_lastname($lname)) {
    header('Location: ../update_profile.php');
    exit;
}

//username validation
if (!validate_username($username)) {
    header('Location: ../update_profile.php');
    exit;
}

//if password is different then validate it
if ($password != $row['pass'] || $conf_pass != "" || $conf_pass != null ) {
    //password validation
    if (!validate_password($password, $conf_pass)) {
        header('Location: ../update_profile.php');
        exit;
    }
}else {
    if (!validate_password($password, $password)) {
        header('Location: ../update_profile.php');
        exit;
    }
}

//email validation
if (!validate_email($email)) {
    header('Location: ../update_profile.php');
    exit;
}

//gender validation
if (!validate_gender($gender)) {
    header('Location: ../update_profile.php');
    exit;
}

//date validation
if (!validate_birtdate($bday)) {
    header('Location: ../update_profile.php');
    exit;
}

//photo validation
$filename = validate_photo($username);
if (!$filename) {
    $query = "UPDATE users SET name='$name', lname='$lname', bday='$bday', gender='$gender', pass='$password', email='$email' WHERE username='$username';";
} else {
    $query = "UPDATE users SET name='$name', lname='$lname', bday='$bday', gender='$gender', pass='$password', email='$email', photo='$filename' WHERE username='$username';";
}

$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../update_profile.php');
    exit;
}
header('Location: ../profile_page.php');

$con->close();
