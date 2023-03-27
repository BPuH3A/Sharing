<?php

require_once 'connectDB.php';

$staticId = $_POST['staticId'];
$newTwit = $_POST['newTwit'];

mysqli_query($connect, "INSERT INTO `tweet` (`tweet_id`, `user_name_id`,`tweet_text`,`date`) VALUES (NULL,'$staticId','$newTwit', UNIX_TIMESTAMP())");
