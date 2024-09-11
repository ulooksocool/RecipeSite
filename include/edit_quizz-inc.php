<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

if (isset($_SESSION['acctype'])) {
    if (($_SESSION['acctype'] != "admin") && ($_SESSION['acctype'] != "mod")) {
        header("Location: /ergasia2/index.php");
        exit;
    }
} else if (!isset($_SESSION['acctype'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

include_once 'functions-inc.php';


//mysql stuff
$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$id = $_GET['id'];

if (isset($_POST['delete'])) {

    $delete = $_POST['delete'];
    if ($delete == "delete") {

        $query = "DELETE FROM temp_quizz WHERE id_test='$id';";
        $result = mysqli_query($con, $query);
        if (!$result) {
            header('Location: ../index.php');
            exit;
        }

        header('Location: ../landing_page.php');
        exit;
    } else {
        header('Location: ../index.php');
        exit;
    }
} else if (isset($_POST['accept'])) {

    $accept = $_POST['accept'];
    if ($accept == "accept") {

        $level = $_POST['level'];
        $type = $_POST['type'];
        $quest = $_POST['quest'];


        if (!validate_level($level)) {
            header('Location: ../index.php');
            exit;
        }

        if (!validate_type($type)) {
            header('Location: ../index.php');
            exit;
        }


        if (!validate_sentence($quest, 255)) {
            header('Location: ../index.php');
            exit;
        }


        if ($type != "oneword" && $type != "s-l") {

            $right1 = $_POST['right_ans1'];
            $wrong1 = $_POST['wrong_ans1'];

            if (!validate_sentence($right1, 100)) {
                header('Location: ../index.php');
                // echo 'failure: correct 1 (' . strlen($right1) . '  ,  ' . $right1 . ')';
                exit;
            }

            if (!validate_sentence($wrong1, 100)) {
                header('Location: ../index.php');
                // echo 'failure: wrong 1 (' . $wrong1 . ')';
                exit;
            }

            if ($type == "multiple1") {

                $wrong2 = $_POST['wrong_ans2'];
                if (!validate_sentence($wrong2, 100)) {
                    header('Location: ../index.php');
                    // echo 'failure: wrong 2 (' . $wrong2 . ')';
                    exit;
                }
            } else if ($type == "multiple2") {

                $right2 = $_POST['right_ans2'];
                if (!validate_sentence($right2, 100)) {
                    header('Location: ../index.php');
                    // echo 'failure: correct 2 (' . $right2 . ')';
                    exit;
                }
            }
        } else if ($type == "oneword") {

            $oneword = $_POST['oneword'];
            if (!validate_oneword($oneword)) {
                header('Location: ../index.php');
                // echo 'failure: oneword (' . $oneword . ')';
                exit;
            }
        } else if ($type == "s-l") {

            $sl = $_POST['right_wrong'];
            if (!validate_sl($sl)) {
                header('Location: ../index.php');
                // echo 'failure: sl (' . $sl . ')';
                exit;
            }
        }


        $query;
        if ($type == "s-l") {
            $query = "INSERT INTO quizz (level,type,question,rightans1) VALUES ('$level' , '$type' , '$quest' , '$sl');";
        } else if ($type == "oneword") {
            $query = "INSERT INTO quizz (level,type,question,rightans1) VALUES ('$level' , '$type' , '$quest' , '$oneword');";
        } else if ($type == "multiple1") {
            $query = "INSERT INTO quizz (level,type,question,rightans1,wrongans1,wrongans2) VALUES ('$level' , '$type' , '$quest' , '$right1' , '$wrong1' , '$wrong2');";
        } else if ($type == "multiple2") {
            $query =  $query = "INSERT INTO quizz (level,type,question,rightans1,rightans2,wrongans1) VALUES ('$level' , '$type' , '$quest' , '$right1' , '$right2' , '$wrong1');";
        }


        $result = mysqli_query($con, $query);
        if (!$result) {
            // echo "failure";
            header('Location: ../index.php');
            exit;
        }

        $query = "DELETE FROM temp_quizz WHERE id_test='$id';";
        $result = mysqli_query($con, $query);
        if (!$result) {
            header('Location: ../index.php');
            exit;
        }

        header('Location: ../landing_page.php');
        exit;
    } else {

        header('Location: ../index.php');
        exit;
    }
} else {

    $level = $_POST['level'];
    $type = $_POST['type'];
    $quest = $_POST['quest'];


    if (!validate_level($level)) {
        header('Location: ../index.php');
        exit;
    }

    if (!validate_type($type)) {
        header('Location: ../index.php');
        exit;
    }


    if (!validate_sentence($quest, 255)) {
        header('Location: ../index.php');
        exit;
    }


    if ($type != "oneword" && $type != "s-l") {

        $right1 = $_POST['right_ans1'];
        $wrong1 = $_POST['wrong_ans1'];

        if (!validate_sentence($right1, 100)) {
            header('Location: ../index.php');
            // echo 'failure: correct 1 (' . strlen($right1) . '  ,  ' . $right1 . ')';
            exit;
        }

        if (!validate_sentence($wrong1, 100)) {
            header('Location: ../index.php');
            // echo 'failure: wrong 1 (' . $wrong1 . ')';
            exit;
        }

        if ($type == "multiple1") {

            $wrong2 = $_POST['wrong_ans2'];
            if (!validate_sentence($wrong2, 100)) {
                header('Location: ../index.php');
                // echo 'failure: wrong 2 (' . $wrong2 . ')';
                exit;
            }
        } else if ($type == "multiple2") {

            $right2 = $_POST['right_ans2'];
            if (!validate_sentence($right2, 100)) {
                header('Location: ../index.php');
                // echo 'failure: correct 2 (' . $right2 . ')';
                exit;
            }
        }
    } else if ($type == "oneword") {

        $oneword = $_POST['oneword'];
        if (!validate_oneword($oneword)) {
            header('Location: ../index.php');
            // echo 'failure: oneword (' . $oneword . ')';
            exit;
        }
    } else if ($type == "s-l") {

        $sl = $_POST['right_wrong'];
        if (!validate_sl($sl)) {
            header('Location: ../index.php');
            // echo 'failure: sl (' . $sl . ')';
            exit;
        }
    }

    $query;
    if ($type == "s-l") {
        $query = "UPDATE temp_quizz SET level='$level', type='$type', question='$quest', rightans1='$sl' WHERE id_test='$id' ;";
    } else if ($type == "oneword") {
        $query = "UPDATE temp_quizz SET level='$level', type='$type', question='$quest', rightans1='$oneword' WHERE id_test='$id' ;";
    } else if ($type == "multiple1") {
        $query = "UPDATE temp_quizz SET level='$level', type='$type', question='$quest', rightans1='$right1', wrongans1='$wrong1', wrongans2='$wrong2' WHERE id_test='$id' ;";
    } else if ($type == "multiple2") {
        $query = "UPDATE temp_quizz SET level='$level', type='$type', question='$quest', rightans1='$right1', rightans2='$right2', wrongans1='$wrong1' WHERE id_test='$id' ;";
    }


    $result = mysqli_query($con, $query);
    if ($result) {
        header('Location: ../landing_page.php');
    } else {
        // echo "failure";
        header('Location: ../index.php');
    }
}


$con->close();
