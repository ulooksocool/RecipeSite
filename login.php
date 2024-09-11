<?php
include_once 'header.php';
?>

<div class="col-s-12 col-m-12 col-l-9 ">
  <h2>Σύνδεση</h2>

  <form name="login-form" method="post" action="include/login-inc.php">

    <div class="container">

      <label for="username"><b>Όνομα Χρήστη</b></label>
      <input type="text" placeholder="Όνομα Χρήστη" name="username">
      <div id="username-error"></div>

      <label for="psw"><b>Κωδικός </b></label>
      <input type="password" placeholder="Κωδικός" name="psw">
      <div id="psw-error"></div>

      <button type="submit" value="submit" name="submit">Σύνδεση</button>
      <button type="reset" value="reset" name="reset" class="cancelbtn">Ακύρωση</button>
    </div>
  </form>
</div>

<?php
include_once 'footer.php';
?>