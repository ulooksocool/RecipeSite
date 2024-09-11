<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/ergasia2/styles/Style.css?v=<?php echo time(); ?>">

  <?php

  if ($_SERVER['PHP_SELF'] == "/ergasia2/sign_up.php") {
    echo '<script src="js/sign_up.js"></script>';
  } else if ($_SERVER['PHP_SELF'] == "/ergasia2/login.php") {
    echo '<script src="js/login.js"></script>';
  } else if ($_SERVER['PHP_SELF'] == "/ergasia2/quiz.php") {
    echo '<script src="js/quizz_visitor.js"></script>';
  } else if ($_SERVER['PHP_SELF'] == "/ergasia2/add_temp_question.php") {
    echo '<script src="js/temp_quizz.js"></script>';
  } else if ($_SERVER['PHP_SELF'] == "/ergasia2/personal_quizz.php") {
    echo '<script src="js/registered_quizz.js"></script>';
  } else if ($_SERVER['PHP_SELF'] == "/ergasia2/user_management.php") {
    echo '<script src="js/edit_user.js"></script>';
  }else if ($_SERVER['PHP_SELF'] == "/ergasia2/edit_user.php") {
    echo '<script src="js/edit_user.js"></script>';
  }else if ($_SERVER['PHP_SELF'] == "/ergasia2/quizz_proposals.php") {
    echo '<script src="js/edit_quizz.js"></script>';
  }else if ($_SERVER['PHP_SELF'] == "/ergasia2/edit_quizz.php") {
    echo '<script src="js/edit_quizz.js"></script>';
  }

  ?>
</head>

<body>



  <div class="row">
    <div class="col-s-12 col-m-12 col-l-12 header-image">
      <a class="white" style="text-decoration: none;" href="index.php">
        <h1> Streat Foodara</h1>
      </a>
    </div>



    <div class="col-s-12 col-m-12 col-l-12 nav">
      <ul>
        <?php
        if (isset($_SESSION["username"])) {
          echo " <li><a href='include/logout-inc.php'>Log Out</a></li>";
          echo '<li><a href="profile_page.php"> Profile</li>';
        } else {
          echo '<li><a href="sign_up.php">Sign Up</a></li>';
          echo ' <li><a href="login.php">Log In</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>

  <div class="row">


    <div class="col-s-12 col-m-12 col-l-3 menu">
      <ul>
        <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="basics.php">Μαγειρική</a></li>
        <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="more.php">Food Life</a></li>
        <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="quiz.php">QUIZZάκι</a></li>

        <?php
        if (isset($_SESSION["username"])) {
          echo ' <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="menu_quizz.php">Νέα QUIZZ</a></li>';
          echo ' <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="history.php">Ιστορικό</a></li>';
          echo ' <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="add_temp_question.php">Πρόσθεσε Ερώτηση </a></li>';
          if (isset($_SESSION['acctype'])) {
            if ($_SESSION['acctype'] == "admin") {
              echo ' <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="user_management.php">Διαχείριση Χρηστών</a></li>';
            }
            if (($_SESSION['acctype'] == "mod") || ($_SESSION['acctype'] == "admin")) {
              echo ' <li class="col-s-12 col-m-4 col-l-12"> <a class="whiteLink" href="quizz_proposals.php">Προτάσεις Quizz</a></li>';
            }
          }
        }
        ?>

      </ul>

      <?php
      if ($_SERVER['PHP_SELF'] == "/ergasia2/more.php") {
        echo '<div class="col-s-12 col-m-12 col-l-8 menu">';
        echo '<ul>';
        echo '<li style="background-color:#333;"> Δες Συνταγές για καταπληκτικές σαλάτες <a href="im/salates.pdf" class="white">ΕΔΩ</a></li>';
        echo '</ul>';
        echo '</div>';
      }
      ?>

    </div>