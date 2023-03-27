<?php

require_once 'connectDB.php';

$name = $_POST['name'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$pass = $_POST['pass'];

$pass = md5($pass . "protect");

$sending = mysqli_query($connect, "SELECT * FROM `user` WHERE `name` = '$name' OR `email` =  '$email'");
$user = mysqli_num_rows($sending);

if ($user != 0) {
    echo 'User has already registered!';
    exit();
} else {
    mysqli_query($connect, "INSERT INTO `user` (`id`, `name`, `email`,`birth_date`,`pass`) VALUES (NULL,'$name','$email','$birthday','$pass')");
    echo 'Done!';
}
