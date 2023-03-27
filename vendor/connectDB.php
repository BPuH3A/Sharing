<?php

$connect = mysqli_connect('localhost', 'root', 'root', 'accounts');

if (!$connect) {
    die('Error connect to DataBase');
}
