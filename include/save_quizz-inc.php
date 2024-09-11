<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

//level and num that checks if additional quiestion is multiple1 or multiple2
$level = $_GET['level'];
$num = $_GET['num'];

//correct answers
$id1 = $_POST['id1'];
$id2 = $_POST['id2'];
$id3a = $_POST['id3a'];
$id3b = $_POST['id3b'];
$id4 = $_POST['id4'];

if ($level == "easy" || $level == "hard" || (($level == "normal") && ($num == 1))) {
    $id5 = $_POST['id5'];
} else if (($level == "normal") && ($num == 0)) {
    $id5a = $_POST['id5a'];
    $id5b = $_POST['id5b'];
}



//Ερωτήσεις που δόθηκαν από τον χρήστη
$ans1 = $_POST['q1'];
$ans2 = $_POST['q2'];
$ans4 = $_POST['q4'];

$ans3a = null;
$ans3b = null;
$ans3c = null;
if (isset($_POST['q3a'])) {
    $ans3a = $_POST['q3a'];
}
if (isset($_POST['q3b'])) {
    $ans3b = $_POST['q3b'];
}
if (isset($_POST['q3c'])) {
    $ans3c = $_POST['q3c'];
}

$ans5a = null;
$ans5b = null;
$ans5c = null;
if ($level == "easy" || $level == "hard" || (($level == "normal") && ($num == 1))) {

    $ans5 = $_POST['q5'];
} else if (($level == "normal") && ($num == 0)) {

    if (isset($_POST['q5a'])) {
        $ans5a = $_POST['q5a'];
    }

    if (isset($_POST['q5b'])) {
        $ans5b = $_POST['q5b'];
    }
    if (isset($_POST['q5c'])) {
        $ans5c = $_POST['q5c'];
    }
}


// //uncomment for debuggin 
// echo "correct:".$id1."  answer:".$ans1;
// echo "correct:".$id2."  answer:".$ans2;
// echo "correct:" . $id3a . "  answer:" . $ans3a;
// echo "correct:" . $id3b . "  answer:" . $ans3b;
// echo  "  answer:" . $ans3c;
// echo "correct:".$id4."  answer:".$ans4;
// if ($level == "easy" || $level == "hard" || (($level == "normal") && ($num == 1))) {
//     echo "correct:".$id5."  answer:".$ans5;
// } else if (($level == "normal") && ($num == 0)) {
// echo "correct:".$id5a."  answer:".$ans5a;
// echo "correct:".$id5b."  answer:".$ans5b;
// echo  " answer:".$ans5c;
// }

//compare and get quizz result
$score = 0;
if ($ans1 == $id1) {
    $score++;
}
if ($ans2 == $id2) {
    $score++;
}
$i = 0;
if (isset($ans3a)) {
    if (($ans3a == $id3a) || ($ans3a == $id3b)) {
        $i++;
    }
}
if (isset($ans3b)) {
    if (($ans3b == $id3a) || ($ans3b == $id3b)) {
        $i++;
    }
}
if (isset($ans3c)) {
    if (($ans3c == $id3a) || ($ans5c == $id3b)) {
        $i++;
    }
}

if ($i == 2) {
    $score++;
}

if ($ans4 == $id4) {
    $score++;
}


if ($level == "easy" || $level == "hard" || (($level == "normal") && ($num == 1))) {
    if ($ans5 == $id5) {
        $score++;
    }
} else if (($level == "normal") && ($num == 0)) {
    $i = 0;
    if (isset($ans5a)) {
        if (($ans5a == $id5a) || ($ans5a == $id5b)) {
            $i++;
        }
    }
    if (isset($ans5b)) {
        if (($ans5b == $id5a) || ($ans5b == $id5b)) {
            $i++;
        }
    }
    if (isset($ans5c)) {
        if (($ans5c == $id5a) || ($ans5c == $id5b)) {
            $i++;
        }
    }

    if ($i == 2) {
        $score++;
    }
}

// echo $score;


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
date_default_timezone_set('Europe/Athens');
$date = date("Y-m-d");

$query = "INSERT INTO history (id_user,date,level,result) VALUES ('$id','$date','$level','$score');";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: ../index.php');
    exit;
}

$con->close();

header('Location: ../menu_quizz.php');
exit;



