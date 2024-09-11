<?php

include_once 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

if (isset($_SESSION['acctype'])) {
    if ($_SESSION['acctype'] != "admin") {
        header("Location: /ergasia2/index.php");
        exit;
    }
} else if (!isset($_SESSION['acctype'])) {
    header("Location: /ergasia2/index.php");
    exit;
}


$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query = "SELECT id,name,lname,bday,username,gender,pass,email,photo,acctype FROM users WHERE username!='admin';";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../index.php');
    exit;
}

$row = mysqli_fetch_array($result);
echo '<div class="container">';
echo '<div class="col-m-2 col-l-3"></div>';
echo '<div class="col-s-12 col-m-8 col-l-3 h2_heading">Click On Box to Edit User</div>';
echo '<div class="col-s-12 col-m-12 col-l-9">';

while ($row) {
    $user = $row['username'];
    $type = $row['acctype'];

    echo '<table onclick="edit_user(\''.$user.'\',\''.$type.'\');"><thead><tr>';
    echo '<td name="head_id" style="color:red;">ID: ' . $row['id'] . '</td>';
    echo '<td name="head_user" style="color:green;">Username: ' . $row['username'] . '</td>';
    echo '</tr></thead>';

    echo '<tr><td name="left">Name: ' . $row['name'] . '</td>';
    echo '<td name="right">Last Name: ' . $row['lname'] . '</td></tr>';
    echo '<tr><td name="left">Email: ' . $row['email'] . '</td>';

    //show password hidden
    $str = "";
    for ($i = 0; $i < mb_strlen($row['pass']); $i++) {
        $str = $str . "*";
    }
    echo '<td name="right">Password: ' . $str . '</td></tr>';

    echo '<tr><td name="left">Gender: ' . $row['gender'] . '</td>';
    echo '<td name="right">Birth Date: ' . $row['bday'] . '</td></tr>';
    echo '<tr><td name="end_left">Photo: ' . $row['photo'] . '</td>';
    echo '<td name="end_right">Account Type: ' . $row['acctype'] . '</td></tr>';
    echo '</table>';

    $row = mysqli_fetch_array($result);
}

echo '</div></div>';


$con->close();

include_once 'footer.php';
