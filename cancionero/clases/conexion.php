<?php
$host = "localhost:3308";
$user = "root";
$password = "123456";
$dbname = "cancionero";
$link = mysqli_connect($host,$user,$password,$dbname);
mysqli_set_charset($link, "utf8");
?>