<?php

include_once 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$temp = $_SESSION["username"];
$query = "SELECT id FROM users WHERE username='$temp';";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../index.php');
    exit;
}

$row = mysqli_fetch_array($result);
$id = $row["id"];

$query = "SELECT date,level,result FROM history WHERE id_user='$id';";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../index.php');
    exit;
}



$row = mysqli_fetch_array($result);

$scores = array();
$levels = array();
$dates = array();
while($row){
    array_push($scores,$row["result"]);
    array_push($levels,$row["level"]);
    $row['date'] = date("d-m-Y",strtotime($row['date']));
    array_push($dates,$row['date']);
    $row = mysqli_fetch_array($result);
}

$con->close();

// print_r($score);
// print_r($level);
// print_r($date);

//print results
echo'<div class="container col-s-4 col-m-4 col-l-3">';
echo '<table><thead><tr>';
echo '<td style="color:red;">Result</td>';
echo '</tr></thead>';

foreach($scores as $value) {
    echo '<tr><td>'.$value.' / 5</td></tr>';
}
echo '</table></div>';

//print levels
echo'<div class="container col-s-4 col-m-4 col-l-3">';
echo '<table><thead><tr>';
echo '<td style="color:blue;">Levels</td>';
echo '</tr></thead>';

foreach($levels as $value) {
    echo '<tr><td>'.$value.'</td></tr>';
}
echo '</table></div>';

//print dates
echo'<div class="container col-s-4 col-m-4 col-l-3">';
echo '<table><thead><tr>';
echo '<td style="color:green;">Dates</td>';
echo '</tr></thead>';

foreach($dates as $value) {
    echo '<tr><td>'.$value.'</td></tr>';
}
echo '</table></div>';


include_once 'footer.php';