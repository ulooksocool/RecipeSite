<?php

include_once 'header.php';

if (!isset($_SESSION['username'])) {
  header("Location: /ergasia2/index.php");
}

include 'include/request_profile-inc.php';

?>
<div class="col-s-12 col-m-12 col-l-9 ">

  <h1>Ανανέωση Profile</h1>

  <form method="POST" action="include/update_profile-inc.php" name="update-profile-form" enctype="multipart/form-data">
    <div class="container">

      <label for="name"><b>Όνομα</b></label>
      <input type="text" placeholder="Όνομα" name="name" value="<?= $row['name'] ?>">
      <div id="name-error"></div>

      <label for="lname"><b>Eπίθετο</b></label>
      <input type="text" placeholder="Έπίθετο" name="lname" value="<?= $row['lname'] ?>">
      <div id="lname-error"></div>

      <label for="username"><b>Όνομα Χρήστη</b></label>
      <input type="text" placeholder="Όνομα Χρήστη" name="username" value="<?= $row['username'] ?>" disabled>
      <div id="username-error"></div>

      <label for="psw"><b>Κωδικός Πρόσβασης </b></label>
      <input type="text" placeholder="Κωδικός Πρόσβασης" name="psw" value="<?= $row['pass'] ?>">
      <div id="psw-error"></div>

      <label for="psw_repeat"><b>Επανάληψη Κωδικού Πρόσβασης </b></label>
      <input type="text" placeholder="Επανάληψη Κωδικού Πρόσβασης" name="psw_repeat">
      <div id="psw_repeat-error"></div>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" value="<?= $row['email'] ?>">
      <div id="email-error"></div>

      <label for="gender"> <b>Φύλλο</b></label><br>
      
      <?php
      if ($row['gender'] == "male") {
        echo '<input type="radio" name="gender" value="male" checked> Άνδρας<br>';
        echo '<input type="radio" name="gender" value="female"> Γυναίκα<br>';
        echo '<input type="radio" name="gender" value="other"> Άλλο';
      } else if ($row['gender'] == "female") {
        echo '<input type="radio" name="gender" value="male" > Άνδρας<br>';
        echo '<input type="radio" name="gender" value="female"checked> Γυναίκα<br>';
        echo '<input type="radio" name="gender" value="other"> Άλλο';
      } else {
        echo '<input type="radio" name="gender" value="male" > Άνδρας<br>';
        echo '<input type="radio" name="gender" value="female"> Γυναίκα<br>';
        echo '<input type="radio" name="gender" value="other"checked> Άλλο';
      }
      ?>
      
      <div id="gender-error"></div>
      <br> <br>

      <label for="birthday"> <b>Ημερομηνία Γέννησης</b></label><br>
      <input type="date" value="<?php echo strftime('%Y-%m-%d', strtotime($row['bday'])); ?>" name="bday">
      <div id="bday-error"></div>
      <br><br>

      <label for="photo"> <b>Φωτογραφία Προφίλ</b></label><br>
      <input type="file" accept=".jpg, .jpeg, .png" name="photo">
      <div id="photo-error"></div>
      <br>
      <image src="PrIm/<?= $row['photo'] ?>" maxwidth=300>
        <br>
        <button type="submit" name="submit" value="submit" class="signupbtn">Update</button>

    </div>
  </form>
  <div class="container" style="margin-top: -35px;">
    <a href="profile_page.php"><button type="submit" name="reset" value="reset" class="cancelbtn">Ακύρωση</button></a>
  </div>
</div>

<?php
include_once 'footer.php';
?>