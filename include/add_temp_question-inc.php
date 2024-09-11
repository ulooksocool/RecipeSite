<?php

include_once 'functions-inc.php';

$level = $_POST['level'];
$type = $_POST['type'];
$quest = $_POST['quest'];
$sl = $_POST['right_wrong'];
$right1 = $_POST['right_ans1'];
$right2 = $_POST['right_ans2'];
$wrong1 = $_POST['wrong_ans1'];
$wrong2 = $_POST['wrong_ans2'];
$oneword = $_POST['oneword'];

if (!validate_level($level)) {
    // echo 'failure';
    exit;
}

if (!validate_type($type)) {
    echo 'failure: quest';
    exit;
}


if (!validate_sentence($quest, 255)) {
    echo 'failure: question (' . $quest . ')';
    exit;
}


if ($type != "oneword" && $type != "s-l") {

    if (!validate_sentence($right1, 100)) {
        echo 'failure: correct 1 (' . strlen($right1) . '  ,  ' . $right1 . ')';
        exit;
    }

    if (!validate_sentence($wrong1, 100)) {
        echo 'failure: wrong 1 (' . $wrong1 . ')';
        exit;
    }

    if ($type == "multiple1") {

        if (!validate_sentence($wrong2, 100)) {
            echo 'failure: wrong 2 (' . $wrong2 . ')';
            exit;
        }
    } else if ($type == "multiple2") {

        if (!validate_sentence($right2, 100)) {
            echo 'failure: correct 2 (' . $right2 . ')';
            exit;
        }
    }
} else if ($type == "oneword") {
    if (!validate_oneword($oneword)) {
        echo 'failure: oneword (' . $oneword . ')';
        exit;
    }
} else if ($type == "s-l") {
    if (!validate_sl($sl)) {
        echo 'failure: sl (' . $sl . ')';
        exit;
    }
}

//mysql stuff
$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query;
if ($type == "s-l") {
    $query = "INSERT INTO temp_quizz (level,type,question,rightans1) VALUES ('$level' , '$type' , '$quest' , '$sl');";
} else if ($type == "oneword") {
    $query = "INSERT INTO temp_quizz (level,type,question,rightans1) VALUES ('$level' , '$type' , '$quest' , '$oneword');";
} else if ($type == "multiple1") {
    $query = "INSERT INTO temp_quizz (level,type,question,rightans1,wrongans1,wrongans2) VALUES ('$level' , '$type' , '$quest' , '$right1' , '$wrong1' , '$wrong2');";
} else if ($type == "multiple2") {
    $query =  $query = "INSERT INTO temp_quizz (level,type,question,rightans1,rightans2,wrongans1) VALUES ('$level' , '$type' , '$quest' , '$right1' , '$right2' , '$wrong1');";
}

$result = mysqli_query($con, $query);
if ($result) {
    header('Location: ../landing_page.php');
} else {
    // echo "failure";
    header('Location: ../add_temp_question.php');
}

$con->close();
