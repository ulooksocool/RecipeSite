<?php

include_once 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

if (isset($_SESSION['acctype'])) {
    if ($_SESSION['acctype'] != "admin" && $_SESSION['acctype'] != "mod") {
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

$query = "SELECT * FROM temp_quizz;";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../index.php');
    exit;
}

$row = mysqli_fetch_array($result);
echo '<div class="container">';
echo '<div class="col-m-2 col-l-3"></div>';
echo '<div class="col-s-12 col-m-8 col-l-3 h2_heading">Click On Box to Edit Quizz</div>';
echo '<div class="col-s-12 col-m-12 col-l-9">';

while ($row) {
    $id = $row['id_test'];
    $type = $row['type'];
    echo '<table onclick="edit_quizz(\'' . $id . '\');"><thead><tr>';
    echo '<td name="head_id" style="color:red;">Level: ' . $row['level'] . '</td>';
    echo '<td name="head_user" style="color:green;">Type: ' . $type . '</td>';
    echo '</tr></thead>';
    echo '<tr><td name="middle" colspan="2">Question: ' . $row['question'] . '</td></tr>';
    if ($type == "s-l") {
        echo '<tr><td name="left">Correct : ' . $row['rightans1'] . '</td>';
        echo '<td name="right">Wrong : ' . $row['wrongans1'] . '</td></tr>';
    }else if($type == "oneword"){
        echo '<tr><td name="middle" colspan="2">Answer: ' . $row['rightans1'] . '</td></tr>';
    }else if($type == "multiple1" ){
        echo '<tr><td name="left">Wrong 1: ' . $row['wrongans1'] . '</td>';
        echo '<td name="right">Wrong 2: ' . $row['wrongans2'] . '</td></tr>';
        echo '<tr><td name="middle" colspan="2">Correct : ' . $row['rightans1'] . '</td></tr>';
    }else if($type == "multiple2" ){
        echo '<tr><td name="left">Correct 1: ' . $row['rightans1'] . '</td>';
        echo '<td name="right">Correct 2: ' . $row['rightans2'] . '</td></tr>';
        echo '<tr><td name="middle" colspan="2">Wrong : ' . $row['wrongans1'] . '</td></tr>';
    }
    

    echo '</table>';

    $row = mysqli_fetch_array($result);
}

echo '</div></div>';


$con->close();

include_once 'footer.php';
