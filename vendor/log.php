<?php

session_start();
require_once 'connectDB.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

$pass = md5($pass . "protect");

$sending = mysqli_query($connect, "SELECT * FROM `user` WHERE `pass` = '$pass' AND `email` =  '$email'");
if (mysqli_num_rows($sending) == 0) {
    echo 'Incorrect password or email';
    exit();
} else {
    echo "Done!";
    $user = mysqli_fetch_assoc($sending);
    $_SESSION['userId'] = [
        "id" => $user['id'],
    ];
}
