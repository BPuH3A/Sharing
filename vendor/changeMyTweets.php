<?php

$myTweetInstruction = $_POST['myTweetInstruction'];

if ($myTweetInstruction == 1) {
    deleteMyTweet();
}
if ($myTweetInstruction == 2) {
    changeMyTweet();
}

function deleteMyTweet()
{
    require_once 'connectDB.php';
    $deleteTweetBtnAtrr = $_POST['deleteTweetBtnAtrr'];

    mysqli_query($connect, "DELETE FROM `tweet` WHERE `tweet_id` = '$deleteTweetBtnAtrr'");

    echo $deleteTweetBtnAtrr;
}
function changeMyTweet()
{
    require_once 'connectDB.php';

    $changeTweetBtnAtrr = $_POST['changeTweetBtnAtrr'];
    $MyChangedTweet = $_POST['MyChangedTweet'];

    mysqli_query($connect, "UPDATE `tweet` SET `tweet_text` = '$MyChangedTweet' WHERE `tweet`.`tweet_id` = '$changeTweetBtnAtrr'");
}
