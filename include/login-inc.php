<?php

include 'functions-inc.php';

$username = $_POST['username'];
$password = $_POST['psw'];


//username validation
if (!validate_username($username)) {
    header('Location: ../login.php');
    exit;
}

//password validation
if (!validate_password($password, $password)) {
    header('Location: ../login.php');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = mysqli_connect('localhost', 'root', '', 'ergasia');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $query = "SELECT username, pass, acctype FROM users WHERE username='$username' and pass='$password';";
    $result = mysqli_query($con, $query);
    if (!$result) {
        header('Location: ../login.php');
        exit;
    }

    $count = mysqli_num_rows($result);
    if ($count == 1) {
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION["acctype"] = $row['acctype'];
        $_SESSION["username"] = $username;
       
        // echo "success";
        $con->close();
        header("Location: ../index.php");
        exit;
    } else {
        // echo "something went wrong";
        $con->close();
        header('Location: ../login.php');
        exit;
    }
}
