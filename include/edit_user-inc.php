<?php
session_start();
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



if (!isset($_POST['type']) && !isset($_POST['delete'])) {
    header("Location: /ergasia2/edit_user.php");
    exit;
}


$user = $_GET['user'];

$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$newtype;
$delete;


if (isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    if ($delete == "delete") {

        $query = "SELECT id FROM users WHERE username='" . $user . "';";
        $result = mysqli_query($con, $query);
        if (!$result) {
            header('Location: ../index.php');
            exit;
        }
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
    
        $query = "DELETE FROM history WHERE id_user='" . $id . "';";
        $result = mysqli_query($con, $query);
        if (!$result) {
            header('Location: ../index.php');
            exit;
        }
    
        $query = "DELETE FROM users WHERE username='" . $user . "';";
        $result = mysqli_query($con, $query);
        if (!$result) {
            header('Location: ../index.php');
            exit;
        }
        header('Location: ../user_management.php');
        exit;
    }
}

if (isset($_POST['type'])) {
    $newtype = $_POST['type'];
    if ($newtype == "mod" || $newtype == "normal") {

        $query = "UPDATE users SET acctype='".$newtype."' WHERE username='".$user."';";
        $result = mysqli_query($con, $query);
        if (!$result) {
            header('Location: ../index.php');
            exit;
        }
        header('Location: ../user_management.php');
        exit;
    }
}


$con->close();
