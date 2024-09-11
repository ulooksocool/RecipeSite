<?php
include_once 'header.php';
if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
}
?>

<div class="col-m-1 col-l-1"></div>
<div class="container col-s-12 col-m-10 col-l-7">
   <a href="personal_quizz.php?level=easy"> <button class="firebrick" id="easy">Easy</button></a>
   <a href="personal_quizz.php?level=normal"> <button class="firebrick" id="normal">Normal</button></a>
   <a href="personal_quizz.php?level=hard"> <button class="firebrick" id="hard">Hard</button></a>
</div>

<?php
include_once 'footer.php';
?>