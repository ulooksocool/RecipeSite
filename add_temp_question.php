<?php
include_once 'header.php';

if (!isset($_SESSION['username'])) {
  header("Location: /ergasia2/index.php");
}
?>


<div class="col-s-12 col-m-12 col-l-9 ">

  <h1>Πρόσθεσε τη δική σου Ερώτηση</h1>

  <form method="POST" action="include/add_temp_question-inc.php" name="add_new_question">
    <div class="container">

      <label for="level"> <b>Επίπεδο Δυσκολίας</b></label><br>
      <input type="radio" name="level" value="easy" checked> Εύκολο<br>
      <input type="radio" name="level" value="normal"> Μέτριο<br>
      <input type="radio" name="level" value="hard"> Δύσκολο
      <div id="level-error"></div>
      <br> <br>

      <label for="type"> <b>Τύπος Ερώτησης</b></label><br>
      <input type="radio" name="type" value="s-l" checked> Σωστό - Λάθος<br>
      <input type="radio" name="type" value="multiple1"> Πολλαπλής Επιλογής Με Μία Σωστή Απάντηση <br>
      <input type="radio" name="type" value="multiple2"> Πολλαπλής Επιλογής Με Δύο Σωστές Απαντήσεις <br>
      <input type="radio" name="type" value="oneword"> Συμπλήρωση Κενού (Μια Λέξη)
      <div id="type-error"></div>
      <br> <br>

      <label for="quest"><b>Ερώτηση</b></label>
      <input type="text" placeholder="Συμπληρώστε την Ερώτηση" name="quest">
      <div id="quest-error"></div>

      <div id="sl">
        <label for="level"> <b>Επίπεδο Δυσκολίας</b></label><br>
        <input type="radio" name="right_wrong" value="right" checked> Σωστό<br>
        <input type="radio" name="right_wrong" value="wrong"> Λάθος<br>
        <div id="right_wrong-error"></div>
        <br> <br>
      </div>

      <div id="right1">
        <label for="right_ans1"><b>Σωστή Απάντηση 1</b></label>
        <input type="text" placeholder="Συμπληρώστε την Σωστή Απάντηση" name="right_ans1">
        <div id="right1-error"></div>
      </div>

      <div id="right2">
        <label for="right_ans2"><b>Σωστή Απάντηση 2</b></label>
        <input type="text" placeholder="Συμπληρώστε την Σωστή Απάντηση" name="right_ans2">
        <div id="right2-error"></div>
      </div>

      <div id="wrong1">
        <label for="wrong_ans1"><b>Λάθος Απάντηση 1</b></label>
        <input type="text" placeholder="Συμπληρώστε την Λάθος Απάντηση" name="wrong_ans1">
        <div id="wrong1-error"></div>
      </div>

      <div id="wrong2">
        <label for="wrong_ans2"><b>Λάθος Απάντηση 2</b></label>
        <input type="text" placeholder="Συμπληρώστε την Λάθος Απάντηση" name="wrong_ans2">
        <div id="wrong2-error"></div>
      </div>

      <div id="oneword">
        <label for="oneword"><b> Σωστή Απάντηση (Μία Λέξη)</b></label>
        <input type="text" placeholder="Συμπήρωστε την Σωστή Απάντηση" name="oneword">
        <div id="word-error"></div>
      </div>

      <br><br>

      <button type="submit" name="submit" value="submit" class="signupbtn">Προσθήκη</button>
      <button type="reset" name="reset" value="reset" class="cancelbtn">Ακύρωση</button>

    </div>
  </form>
</div>


<?php
include_once 'footer.php';
?>