<?php

function validate_name($name)
{
    if (!preg_match('/^[a-zA-Zα-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ\S]{3,50}$/', $name)) {
        echo "failure: Invalid Name (" . $name . ")";
        return false;
    }
    return true;
}

function validate_lastname($lname)
{
    if (!preg_match('/^[a-zA-Zα-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ\S]{3,100}$/', $lname)) {
        echo "failure: Invalid Last Name (" . $lname . ")";
        return false;
    }
    return true;
}

function validate_username($username)
{
    if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_\S]{3,50}$/', $username)) {
        echo "failure: Invalid Username (" . $username . ")";
        return false;
    }
    return true;
}

function validate_password($password, $conf_pass)
{
    $reg = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,64}$/';
    if (!preg_match($reg, $password) || !preg_match($reg, $conf_pass)) {
        echo "failure: Passwords are Invalid ( password: " . $password . " conf-password: " . $conf_pass . ")";
        return false;
    } else if (strcmp($password, $conf_pass) != 0) {
        echo "failure: Passwords do not match ( password: " . $password . " conf-password: " . $conf_pass . ")";
        return false;
    }
    return true;
}

function validate_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "failure: Invalid Email (" . $email . ")";
        return false;
    }
    return true;
}

function validate_gender($gender)
{
    if ((strcmp($gender, "male") != 0) && (strcmp($gender, "female") != 0) && (strcmp($gender, "other") != 0)) {
        echo "failure: Invalid gender (" . $gender . ")";
        return false;
    }
    return true;
}

function validate_birtdate($bday)
{
    $length = strlen($bday);
    if (($length != 10) || (strtotime($bday) == false)) {
        echo "failure: Invalid Birth Date (" . $bday . ")";
        return false;
    }
    return true;
}

function validate_photo($username)
{

    //debugging :')
    echo 'file count=', count($_FILES), "\n";
    print "<pre>";
    print_r($_FILES);
    print "</pre>";
    echo "\n";

    $target_dir = "../PrIm/";
    $filename = basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"]) && ($_FILES["photo"]["tmp_name"] != null)) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 25000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG and PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
        // if everything is ok, try to upload file
    } else {
        //delete any files with the same name and any file ending
        $temp = $target_dir . $username . ".jpg";
        unlink($temp);
        $temp = $target_dir . $username . ".jpeg";
        unlink($temp);
        $temp = $target_dir . $username . ".png";
        unlink($temp);

        //save new file
        $filename = $username . "." . $imageFileType;
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars($filename) . " has been uploaded.";
            return $filename;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}

function validate_level($level)
{

    if ($level != "easy" && $level != "normal" && $level != "hard") {
        echo "failure: Invalid Level (" . $level . ")";
        return false;
    }
    return true;
}

function validate_type($type)
{

    if ($type != "s-l" && $type != "multiple1" && $type != "multiple2" && $type != "oneword") {
        echo "failure: Invalid Type (" . $type . ")";
        return false;
    }
    return true;
}

function validate_sentence($line, $max)
{
    $length = mb_strlen($line);
    $reg = '/^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\s]{1,255}$/';
    if (!preg_match($reg, $line) || ($length > $max)) {
        echo "failure: Invalid Sentence (line: \"" . $line . "\", length: \"" . $length . "\") ";
        return false;
    }
    return true;
}

function validate_oneword($oneword)
{
    $length = mb_strlen($oneword);
    $reg = '/^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\S]{1,255}$/';
    if (!preg_match($reg, $oneword) || ($length > 20)) {
        echo "failure: Invalid Word (line: '" . $oneword . "', length: '" . $length . "')";
        return false;
    }
    return true;
}

function validate_sl($sl)
{

    if ($sl != "right" && $sl != "wrong") {
        echo "failure: Invalid Right-Wrong Answer (" . $sl . ")";
        return false;
    }
    return true;
}
