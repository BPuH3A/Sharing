<?php

$instruction = $_POST['instruction'];

if ($instruction == 1) {
    loadAllTwits();
}
if ($instruction == 2) {
    loadMyTwits();
}
if ($instruction == 3) {
    loadSearchTwits();
}

function loadAllTwits()
{
    require_once 'connectDB.php';
    $sending = mysqli_query($connect, "SELECT `name`, `tweet_text`, `date` FROM `tweet` INNER JOIN `user` ON `tweet`.`user_name_id`= `user`.`id` ORDER BY `date` DESC");
    while ($user = mysqli_fetch_assoc($sending)) {
        $twitUserName = $user['name'];
        $twit = $user['tweet_text'];
        $twitDateSec = $user['date'];
        $twitDate = date("F j, Y, g:i a", $twitDateSec + 7200);
        echo "<div class='userTwitContainer'>
            <div class='userNameTwit'>$twitUserName</div>
            <div class='userTwitInfo_container'>
                <div class='userTwitDate'>$twitDate</div>
                <div class='userTwit'>$twit</div>
            </div>  
          </div>";
    };
}

function loadMyTwits()
{
    require_once 'connectDB.php';
    $staticId = $_POST['staticId'];

    $sending = mysqli_query($connect, "SELECT `name`, `tweet_text`, `date`, `tweet_id` FROM `tweet` INNER JOIN `user` ON `tweet`.`user_name_id`= `user`.`id` WHERE `user_name_id` = '$staticId' ORDER BY `date` DESC");
    while ($user = mysqli_fetch_assoc($sending)) {
        $twitUserName = $user['name'];
        $twit = $user['tweet_text'];
        $twitDateSec = $user['date'];
        $MyTweetId = $user['tweet_id'];
        $twitDate = date("F j, Y, g:i a", $twitDateSec + 7200);
        echo "<div class='userTwitContainer'>
              <div class='userNameTwit'>$twitUserName</div>
              <div class='userTwitInfo_container' id='my_tweet_info_container_$MyTweetId'>
                <div class='userTwitDate'>$twitDate</div>
                <div class='userTwit' id='my_tweet_id_div_$MyTweetId'>$twit</div>
              </div>
              <div class='my_tweet_changes_container' id='my_tweet_changes_container_id_$MyTweetId'>
                <button class='delete_tweet_btn' id='delete_tweet_btn_$MyTweetId' tweet_id='$MyTweetId'>Delete</button>
                <button class='change_tweet_btn' id='change_tweet_btn_$MyTweetId' tweet_id='$MyTweetId'>Change</button>
              </div>
              </div>";
    };
}

function loadSearchTwits()
{
    require_once 'connectDB.php';
    $searchUserTwit = $_POST['searchUserTwit'];

    $sending = mysqli_query($connect, "SELECT `name`, `tweet_text`, `date` FROM `tweet` INNER JOIN `user` ON `tweet`.`user_name_id`= `user`.`id` WHERE `name` = '$searchUserTwit' ORDER BY `date` DESC");
    while ($user = mysqli_fetch_assoc($sending)) {
        $twitUserName = $user['name'];
        $twit = $user['tweet_text'];
        $twitDateSec = $user['date'];
        $twitDate = date("F j, Y, g:i a", $twitDateSec + 7200);
        echo "<div class='userTwitContainer'>
            <div class='userNameTwit'>$twitUserName</div>
            <div class='userTwitInfo_container'>
                <div class='userTwitDate'>$twitDate</div>
                <div class='userTwit'>$twit</div>
            </div>  
          </div>";
    };
}
