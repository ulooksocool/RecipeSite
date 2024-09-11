<?php

include_once 'header.php';

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

$id = $_GET['id'];


$con = mysqli_connect('localhost', 'root', '', 'ergasia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query = "SELECT * FROM temp_quizz WHERE id_test='" . $id . "';";
$result = mysqli_query($con, $query);
if (!$result) {
    header('Location: quizz_proposals.php');
    exit;
}
$con->close();
$row = mysqli_fetch_array($result);


?>


<div class="container col-s-12 col-m-12 col-l-9 ">

    <h1><b>Quizz Editor</b></h1>
    <form name="edit-user-form" method="POST" action="include/edit_quizz-inc.php?id=<?= $id ?>">
        <div class="container">


            <label for="level"> <b>Επίπεδο Δυσκολίας</b></label><br>
            <?php
            if ($row['level'] == "easy") {
                echo '<input type="radio" name="level" value="easy" checked> Εύκολο<br>';
                echo '<input type="radio" name="level" value="normal"> Μέτριο<br>';
                echo '<input type="radio" name="level" value="hard"> Δύσκολο';
            } else if ($row['level'] == "normal") {
                echo '<input type="radio" name="level" value="easy"> Εύκολο<br>';
                echo '<input type="radio" name="level" value="normal" checked> Μέτριο<br>';
                echo '<input type="radio" name="level" value="hard"> Δύσκολο';
            } else if ($row['level'] == "hard") {
                echo '<input type="radio" name="level" value="easy"> Εύκολο<br>';
                echo '<input type="radio" name="level" value="normal"> Μέτριο<br>';
                echo '<input type="radio" name="level" value="hard" checked> Δύσκολο';
            }
            ?>
            <div id="level-error"></div>
            <br> <br>

            <label for="type"> <b>Τύπος Ερώτησης</b></label><br>
            <?php
            if ($row['type'] == "s-l") {
                echo '<input type="radio" name="type" value="s-l" checked> Σωστό - Λάθος<br>';
            } else if ($row['type'] == "multiple1") {
                echo '<input type="radio" name="type" value="multiple1" checked> Πολλαπλής Επιλογής Με Μία Σωστή Απάντηση <br>';
            } else if ($row['type'] == "multiple2") {
                echo '<input type="radio" name="type" value="multiple2" checked> Πολλαπλής Επιλογής Με Δύο Σωστές Απαντήσεις <br>';
            } else if ($row['type'] == "oneword") {
                echo '<input type="radio" name="type" value="oneword" checked> Συμπλήρωση Κενού (Μια Λέξη)';
            }
            ?>
            <div id="type-error"></div>
            <br> <br>

            <label for="quest"><b>Ερώτηση</b></label>
            <input type="text" placeholder="Συμπληρώστε την Ερώτηση" name="quest" value="<?= $row['question'] ?>">
            <div id="quest-error"></div>

            <?php
            if ($row['type'] == "s-l") {

                if ($row['rightans1'] == "right") {
                    echo '<label for="right_wrong"><b>Σωστή Απάντηση</b></label><br>';
                    echo '<input type="radio" name="right_wrong" value="right" checked> Σωστό<br>';
                    echo '<input type="radio" name="right_wrong" value="wrong"> Λάθος<br>';
                } else {
                    echo '<label for="right_wrong"><b>Σωστή Απάντηση</b></label><br>';
                    echo '<input type="radio" name="right_wrong" value="right"> Σωστό<br>';
                    echo '<input type="radio" name="right_wrong" value="wrong" checked> Λάθος<br>';
                }
                echo '<div id="right_wrong-error"></div>';
            } else if ($row['type'] == "multiple1") {

                echo '<label for="right_ans1"><b>Σωστή Απάντηση 1</b></label>';
                echo '<input type="text" placeholder="Συμπληρώστε την Σωστή Απάντηση" name="right_ans1" value="' . $row['rightans1'] . '">';
                echo '<div id="right1-error"></div>';

                echo '<label for="wrong_ans1"><b>Λάθος Απάντηση 1</b></label>';
                echo '<input type="text" placeholder="Συμπληρώστε την Λάθος Απάντηση" name="wrong_ans1" value="' . $row['wrongans1'] . '">';
                echo '<div id="wrong1-error"></div>';

                echo '<label for="wrong_ans2"><b>Λάθος Απάντηση 2</b></label>';
                echo '<input type="text" placeholder="Συμπληρώστε την Λάθος Απάντηση" name="wrong_ans2" value="' . $row['wrongans2'] . '">';
                echo '<div id="wrong2-error"></div>';
            } else if ($row['type'] == "multiple2") {

                echo '<label for="right_ans1"><b>Σωστή Απάντηση 1</b></label>';
                echo '<input type="text" placeholder="Συμπληρώστε την Σωστή Απάντηση" name="right_ans1" value="' . $row['rightans1'] . '">';
                echo '<div id="right1-error"></div>';

                echo '<label for="right_ans2"><b>Σωστή Απάντηση 2</b></label>';
                echo '<input type="text" placeholder="Συμπληρώστε την Σωστή Απάντηση" name="right_ans2" value="' . $row['rightans2'] . '">';
                echo '<div id="right2-error"></div>';

                echo '<label for="wrong_ans1"><b>Λάθος Απάντηση 1</b></label>';
                echo '<input type="text" placeholder="Συμπληρώστε την Λάθος Απάντηση" name="wrong_ans1" value="' . $row['wrongans1'] . '">';
                echo '<div id="wrong1-error"></div>';
            } else if ($row['type'] == "oneword") {

                echo '<label for="oneword"><b> Σωστή Απάντηση (Μία Λέξη)</b></label>';
                echo '<input type="text" placeholder="Συμπήρωστε την Σωστή Απάντηση" name="oneword" value="' . $row['rightans1'] . '">';
                echo '<div id="word-error"></div>';
            } else {
                header('Location: quizz_proposals.php');
                exit;
            }
            ?>


            <label for="accept"><b>
                    <h2>Accept Quizz</h2>
                </b> </label>
            <h3><input type="checkbox" name="accept" id="accept" value="accept" onclick="accept_quizz();">Accept Quizz</h3>


            <label for="delete"><b>
                    <h2>DELETE Quizz</h2>
                </b> </label>
            <h3><input type="checkbox" name="delete" id="delete" value="delete" onclick="delete_quizz();"> DELETE Quizz</h3>



            <button type="submit" name="submit" value="submit" class="signupbtn">Ανανέωση</button>
            <button type="reset" name="reset" value="reset" class="cancelbtn">Ακύρωση</button>

        </div>
    </form>
</div>



<?php
include_once 'footer.php';
?>