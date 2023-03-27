<?php

require_once 'connectDB.php';

$staticId = $_POST['staticId'];
$nameChange = $_POST['nameChange'];
$passChange = $_POST['passChange'];
$dateChange = $_POST['dateChange'];

$passChangeH = md5($passChange . "protect");

$sending = mysqli_query($connect, "SELECT * FROM `user` WHERE `name` = '$nameChange'");
$user = mysqli_num_rows($sending);
if ($user != 0) {
    echo 0;
    exit();
} else {
    if ($nameChange != "") {
        mysqli_query($connect, "UPDATE `user` SET `name` = '$nameChange' WHERE `user`.`id` = $staticId");
    }
    if ($passChange != "") {
        mysqli_query($connect, "UPDATE `user` SET `pass` = '$passChangeH' WHERE `user`.`id` = $staticId");
    }
    mysqli_query($connect, "UPDATE `user` SET `date` = '$dateChange' WHERE `user`.`id` = $staticId");

    echo 1;
}
