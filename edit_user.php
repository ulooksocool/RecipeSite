<?php

include_once 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

if (isset($_SESSION['acctype'])) {
    if ($_SESSION['acctype'] != "admin") {
        header("Location: /ergasia2/index.php");
        exit;
    }
} else if (!isset($_SESSION['acctype'])) {
    header("Location: /ergasia2/index.php");
    exit;
}

$user = $_GET['username'];
?>


<div class="container col-s-12 col-m-12 col-l-9 ">

    <h1><b>Users Account Management!</b></h1>
    <form name="edit-user-form" method="POST" action="include/edit_user-inc.php?user=<?= $user?>">
        <div class="container">

            <label for="type"><b>
                    <h2>Define Account Type</h2>
                </b> </label>

            <?php
            if ($_GET['type'] == "normal") {
                echo '<h3 style="display: inline-block;"><input type="radio" name="type" value="normal" checked> Normal Account</h3>';
                echo '<h3 style="display: inline-block;"><input type="radio" name="type" value="mod">Modderator Account</h3>';
            } else if ($_GET['type'] == "mod") {
                echo '<h3 style="display: inline-block;"><input type="radio" name="type" value="normal"> Normal Account</h3>';
                echo '<h3 style="display: inline-block;"><input type="radio" name="type" value="mod" checked>Modderator Account</h3>';
            } else {
                header("Location: user_management.php");
                exit;
            }
            ?>
            
            <div id="type-error"></div>

            <label for="delete"><b>
                    <h2>DELETE Account</h2>
                </b> </label>
            <h3><input type="checkbox" name="delete" id="delete" value="delete" onclick="delete_user();"> DELETE Account</h3>

            
            <button type="submit" name="submit" value="submit" class="signupbtn">Ανανέωση</button>
            <button type="reset" name="reset" value="reset" class="cancelbtn">Ακύρωση</button>

        </div>
    </form>
</div>



<?php
include_once 'footer.php';
?>