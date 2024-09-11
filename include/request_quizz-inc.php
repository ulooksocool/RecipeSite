<?php

if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
  }

$level = $_GET['level'];
if (!isset($level) || ($level != "easy" && $level != "normal" && $level != "hard")) {
    header("Location: /ergasia2/menu_quizz.php");
    exit;
}


$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//get row of s-l type question
$query1 = "SELECT * FROM quizz WHERE level='$level' AND type='s-l' ORDER BY RAND() LIMIT 2;";
$result1 = mysqli_query($con, $query1);
if (!$result1) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}
$sl = mysqli_fetch_array($result1);
if (!$sl) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}

//get row of mutliple1 type question
$query2 = "SELECT * FROM quizz WHERE level='$level' AND type='multiple1' ORDER BY RAND() LIMIT 2;";
$result2 = mysqli_query($con, $query2);
if (!$result2) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}
$multiple1 = mysqli_fetch_array($result2);
if (!$multiple1) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}

//get row of mutliple2 type question
$query3 = "SELECT * FROM quizz WHERE level='$level' AND type='multiple2' ORDER BY RAND() LIMIT 2;";
$result3 = mysqli_query($con, $query3);
if (!$result3) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}
$multiple2 = mysqli_fetch_array($result3);
if (!$multiple2) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}

//get row of oneword type question
$query4 = "SELECT * FROM quizz WHERE level='$level' AND type='oneword' ORDER BY RAND() LIMIT 2;";
$result4 = mysqli_query($con, $query4);
if (!$result4) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}
$oneword = mysqli_fetch_array($result4);
if (!$oneword) {
    header('Location: /ergasia2/menu_quizz.php');
    exit;
}

//get row of 5th question of type s-l for easy , multiple1/2 for normal and oneword for hard level
$temp = false;
$random_num = 0;
if ($level == "easy") {

    $temp = mysqli_fetch_array($result1);
    if (!$temp) {
        header('Location: /ergasia2/menu_quizz.php');
        exit;
    }
} else if ($level == "normal") {

    $random_num = rand(0, 1);
    if ($random_num) {
        
        $temp = mysqli_fetch_array($result2);
        if (!$temp) {
            $random_num = 0;
            $temp = mysqli_fetch_array($result3);
            if (!$temp) {
                header('Location: /ergasia2/menu_quizz.php');
                exit;
            }
        }
    } else {
        $temp = mysqli_fetch_array($result3);
        if (!$temp) {
            $random_num = 1;
            $temp = mysqli_fetch_array($result2);
            if (!$temp) {
                header('Location: /ergasia2/menu_quizz.php');
                exit;
            }
        }
    }

    
} else if ($level == "hard") {

    $temp = mysqli_fetch_array($result4);
    if (!$temp) {
        header('Location: /ergasia2/menu_quizz.php');
        exit;
    }
}

$con->close();