<?php

include_once 'header.php';

if (!isset($_SESSION['username'])) {
  header("Location: /ergasia2/index.php");
}

include 'include/request_profile-inc.php';

?>
<div class="col-s-12 col-m-12 col-l-9 ">

  <h1>Το Profile μου</h1>

  <form method="" action="update_profile.php" name="update-profile-form">
    <div class="container">

      <label for="photo"> <b>Φωτογραφία Προφίλ</b></label><br>
      <image src="PrIm/<?= $row['photo'] ?>" maxwidth=200>
        <br>

        <label for="name"><b>Όνομα</b></label>
        <input type="text" placeholder="Όνομα" name="name" value="<?= $row['name'] ?>" readonly>

        <label for="lname"><b>Eπίθετο</b></label>
        <input type="text" placeholder="Έπίθετο" name="lname" value="<?= $row['lname'] ?>" readonly>

        <label for="username"><b>Όνομα Χρήστη</b></label>
        <input type="text" placeholder="Όνομα Χρήστη" name="username" value="<?= $row['username'] ?>" readonly>

        <label for="psw"><b>Κωδικός Πρόσβασης </b></label>
        <input type="password" placeholder="Κωδικός Πρόσβασης" name="psw" value="<?= $row['pass'] ?>" readonly>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" value="<?= $row['email'] ?>" readonly>

        <label for="gender"> <b>Φύλλο</b></label><br>
        <input type="text" name="gender" value="<?= $row['gender'] ?>" readonly>
        <br>

        <label for="birthday"> <b>Ημερομηνία Γέννησης</b></label><br>
        <input type="text" name="bday" value="<?= $row['bday'] ?>" readonly>
        <div id="bday-error"></div>
        <br><br>

        <button type="submit" name="submit" value="submit" class="signupbtn">Update</button>

    </div>
  </form>
</div>

<?php
include_once 'footer.php';
?>