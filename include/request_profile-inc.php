<?php

if (isset($_SESSION["username"])) {

    $con = mysqli_connect('localhost', 'root', '', 'ergasia');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $temp = $_SESSION["username"];
    $query = "SELECT * FROM users WHERE username='$temp';";

    $result = mysqli_query($con, $query);
    if (!$result) {
        header('Location: ../sign_up.php');
        exit;
    }

    $row = mysqli_fetch_array($result);

    $con->close();
}
