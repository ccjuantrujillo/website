<?php
session_start();
if(!isset($_SESSION['compania']))       $_SESSION['compania'] = 3;
header("location:misas.php");
?>