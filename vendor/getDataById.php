<?php

session_start();
require_once 'connectDB.php';

$staticId = $_POST['staticId'];

$sending = mysqli_query($connect, "SELECT `name` , `email` , `birth_date` FROM `user` WHERE `id` = '$staticId'");
$user = mysqli_fetch_assoc($sending);
$userJS = json_encode($user);
print_r($userJS);
