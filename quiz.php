<?php
include_once 'header.php';
?>

<div class="col-s-12 col-m-12 col-l-9 ">

  <h1><b>QUIZZ TIME!</b></h1>

  <form name="form1" post="" method="">
    <div class="container">

      <label for="q1"> <b>Πόσα λεπτά θέλουν τα μακαρόνια για να βράσουν;</b></label><br>
      <input type="radio" name="q1" value="7min"> 7 λεπτά
      <input type="radio" name="q1" value="9min"> 9 λεπτά
      <input type="radio" name="q1" value="11min"> 11 λεπτά
      <br>
      <br>
      <label for="q2a"> <b>Ποιά από τα παρακάτω υλικά χρειάζεται για να φτιάξεις ζυμάρι πίτσας;</b></label><br>
      <input type="radio" name="q2a" value="floor"> αλεύρι
      <input type="radio" name="q2b" value="magia"> μαγιά
      <input type="radio" name="q2c" value="bakinpoweder"> μπεΐκιν πάουντερ
      <br>
      <br>
      <label for="q3"> <b> Το Ελαιόλαδο είναι το πιο ανθεκτικο λάδι στο τηγάνι. </b></label><br>
      <input type="radio" name="q3" value="right"> Σωστό
      <input type="radio" name="q3" value="wrong"> Λάθος
      <br>
      <br>
      <label for="q4"> <b> Τι χρώμα έχει το Γουακαμόλε; </b></label><br>
      <input type="radio" name="q4" value="yellow"> Κίτρινο
      <input type="radio" name="q4" value="green"> Πράσινο
      <input type="radio" name="q4" value="orange"> Πορτοκαλί
      <br>
      <br>
      <label for="q5"><b>To υλικό που χρειάζεσαι οπωσδήποτε για να φτιάξεις μια σαλάτα caprese είναι;</b></label>
      <input type="text" name="q5">

      <button name="submit" type="submit" value="submit">Submit</button>
    </div>
  </form>


  <?php
  include_once 'footer.php';
  ?>