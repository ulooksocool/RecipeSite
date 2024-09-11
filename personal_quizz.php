<?php
include_once 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
}

include_once 'include/request_quizz-inc.php';
?>

<div class="col-s-12 col-m-12 col-l-9 ">

    <h1><b>QUIZZ TIME!</b></h1>
 
 <?php   echo '<form name="form1" method="POST" action="include/save_quizz-inc.php?level='.$level.'&num='.$random_num.'">';?>
        <div class="container">
            <input type="text" name="id1" style="display: none;" value="<?= $sl['rightans1'] ?>">
            <input type="text" name="id2" style="display: none;" value="<?= $multiple1['rightans1'] ?>">
            <input type="text" name="id3a" style="display: none;" value="<?= $multiple2['rightans1'] ?>">
            <input type="text" name="id3b" style="display: none;" value="<?= $multiple2['rightans2'] ?>">
            <input type="text" name="id4" style="display: none;" value="<?= $oneword['rightans1'] ?>">
            <?php
                if($level == "easy"){
                    echo '<input type="text" name="id5" style="display: none;" value="'.$temp['rightans1'].'">';
                }else if($level == "normal"){
                    if($random_num == 1){
                        echo '<input type="text" name="id5" style="display: none;" value="'.$temp['rightans1'].'">';
                    }else {
                        echo '<input type="text" name="id5a" style="display: none;" value="'.$temp['rightans1'].'">';
                        echo '<input type="text" name="id5b" style="display: none;" value="'.$temp['rightans2'].'">';
                    }
                }else if($level == "hard"){
                    echo '<input type="text" name="id5" style="display: none;" value="'.$temp['rightans1'].'">';
                }
            ?>
            <!-- Σωστό ή Λάθος -->
            <label for="q1"> <b><?= $sl['question'] ?></b></label><br>
            <input type="radio" name="q1" value="right"> Σωστό
            <input type="radio" name="q1" value="wrong"> Λάθος<br><br>
            <div id="sl1-error"></div>
            <?php
            if ($level == "easy") {
                echo '<label for="q5"> <b>' . $temp['question'] . '</b></label><br>';
                echo '<input type="radio" name="q5" value="right"> Σωστό';
                echo '<input type="radio" name="q5" value="wrong"> Λάθος<br><br>';
                echo '<div id="sl2-error"></div>';
            }
            ?>

            <?php
            if ($level == "normal") {
                // πολλαπλής με μία σωστή απάντηση
                $answers = array($multiple1['rightans1'], $multiple1['wrongans1'], $multiple1['wrongans2']);
                shuffle($answers);
                echo '<label for="q2"> <b>' . $multiple1['question'] . '</b></label><br>';
                echo '<input type="radio" name="q2" value="' . $answers[0] . '">' . $answers[0];
                echo '<input type="radio" name="q2" value="' . $answers[1] . '">' . $answers[1];
                echo '<input type="radio" name="q2" value="' . $answers[2] . '">' . $answers[2];
                echo '<div id="mult1-error"></div><br><br>';
                if ($random_num) {
                    $answers = array($temp['rightans1'], $temp['wrongans1'], $temp['wrongans2']);
                    shuffle($answers);
                    echo '<label for="q5"> <b>' . $temp['question'] . '</b></label><br>';
                    echo '<input type="radio" name="q5" value="' . $answers[0] . '">' . $answers[0];
                    echo '<input type="radio" name="q5" value="' . $answers[1] . '">' . $answers[1];
                    echo '<input type="radio" name="q5" value="' . $answers[2] . '">' . $answers[2];
                    echo '<div id="mult1-temp-error"></div><br><br>';
                }

                // πολλαπλής με δύο σωστές απαντήσεις
                $answers = array($multiple2['rightans1'], $multiple2['rightans2'], $multiple2['wrongans1']);
                shuffle($answers);
                echo '<label for="q3a"> <b>' . $multiple2['question'] . '</b></label><br>';
                echo '<input type="radio" name="q3a" onclick="mult_a();" value="' . $answers[0] . '">' . $answers[0];
                echo '<input type="radio" name="q3b" onclick="mult_b();"value="' . $answers[1] . '">' . $answers[1];
                echo '<input type="radio" name="q3c" onclick="mult_c();"value="' . $answers[2] . '">' . $answers[2];
                echo '<div id="mult2-error"></div><br><br>';
                if (!$random_num) {
                    $answers = array($temp['rightans1'], $temp['rightans2'], $temp['wrongans1']);
                    shuffle($answers);
                    echo '<label for="q5a"> <b>' . $temp['question'] . '</b></label><br>';
                    echo '<input type="radio" name="q5a" onclick="mult_a_temp();" value="' . $answers[0] . '">' . $answers[0];
                    echo '<input type="radio" name="q5b" onclick="mult_b_temp();" value="' . $answers[1] . '">' . $answers[1];
                    echo '<input type="radio" name="q5c" onclick="mult_c_temp();" value="' . $answers[2] . '">' . $answers[2];
                    echo '<div id="mult2-temp-error"></div><br><br>';
                }
            }else{
                // πολλαπλής με μία σωστή απάντηση
                $answers = array($multiple1['rightans1'], $multiple1['wrongans1'], $multiple1['wrongans2']);
                shuffle($answers);
                echo '<label for="q2"> <b>' . $multiple1['question'] . '</b></label><br>';
                echo '<input type="radio" name="q2" value="' . $answers[0] . '">' . $answers[0];
                echo '<input type="radio" name="q2" value="' . $answers[1] . '">' . $answers[1];
                echo '<input type="radio" name="q2" value="' . $answers[2] . '">' . $answers[2];
                echo '<div id="mult1-error"></div><br><br>';
                // πολλαπλής με δύο σωστές απαντήσεις
                $answers = array($multiple2['rightans1'], $multiple2['rightans2'], $multiple2['wrongans1']);
                shuffle($answers);
                echo '<label for="q3a"> <b>' . $multiple2['question'] . '</b></label><br>';
                echo '<input type="radio" name="q3a" onclick="mult_a();" value="' . $answers[0] . '">' . $answers[0];
                echo '<input type="radio" name="q3b" onclick="mult_b();" value="' . $answers[1] . '">' . $answers[1];
                echo '<input type="radio" name="q3c" onclick="mult_c();" value="' . $answers[2] . '">' . $answers[2];
                echo '<div id="mult2-error"></div><br><br>';
            }
            ?>

            <!-- Απάντηση μίας λέξης -->
            <label for="q4"><b><?= $oneword['question'] ?></b></label>
            <input type="text" name="q4">
            <div id="oneword-error"></div>
            <?php
            if ($level == "hard") {
                echo '<label for="q5"> <b>' . $temp['question'] . '</b></label><br>';
                echo '<input type="text" name="q5">';
                echo '<div id="oneword2-error"></div>';
            }
            ?>
            <button name="submit" type="submit" value="submit">Submit</button>
            <button name="reset" type="reset" value="reset" class="cancelbtn">Reset</button>
        </div>
    </form>







    <?php
    include_once 'footer.php';
    ?>