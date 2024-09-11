<?php
include_once 'header.php';
?>


<div class="col-s-12 col-m-12 col-l-9 ">

  <h1>Εγγραφή</h1>

  <form method="post" action="include/sign_up-inc.php" name="sign-up-form" enctype="multipart/form-data">
    <div class="container">

      <label for="name"><b>Όνομα</b></label>
      <input type="text" placeholder="Όνομα" name="name">
      <div id="name-error"></div>

      <label for="lname"><b>Eπίθετο</b></label>
      <input type="text" placeholder="Έπίθετο" name="lname">
      <div id="lname-error"></div>

      <label for="username"><b>Όνομα Χρήστη</b></label>
      <input type="text" placeholder="Όνομα Χρήστη" name="username">
      <div id="username-error"></div>

      <label for="psw"><b>Κωδικός Πρόσβασης </b></label>
      <input type="password" placeholder="Κωδικός Πρόσβασης" name="psw">
      <div id="psw-error"></div>

      <label for="psw_repeat"><b>Επανάληψη Κωδικού Πρόσβασης </b></label>
      <input type="password" placeholder="Επανάληψη Κωδικού Πρόσβασης" name="psw_repeat">
      <div id="psw_repeat-error"></div>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email">
      <div id="email-error"></div>

      <label for="gender"> <b>Φύλλο</b></label><br>
      <input type="radio" name="gender" value="male"> Άνδρας<br>
      <input type="radio" name="gender" value="female"> Γυναίκα<br>
      <input type="radio" name="gender" value="other"> Άλλο
      <div id="gender-error"></div>
      <br> <br>

      <label for="birthday"> <b>Ημερομηνία Γέννησης</b></label><br>
      <input type="date" name="bday">
      <div id="bday-error"></div>
      <br><br>

      <label for="photo"> <b>Φωτογραφία Προφίλ</b></label><br>
      <input type="file" accept=".jpg, .jpeg, .png" name="photo">

      <div id="photo-error"></div>
      <br><br>

      <button type="submit" name="submit" value="submit" class="signupbtn">Eγγραφή</button>
      <button type="reset" name="reset" value="reset" class="cancelbtn">Ακύρωση</button>

    </div>
  </form>
</div>

<?php
include_once 'footer.php';
?>