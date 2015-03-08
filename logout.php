<?php
session_start();


session_destroy();
unset($_SESSION["loggedin"]);
unset($_SESSION["name"]);
unset($_SESSION['uid']);
unset($_SESSION['image_name']);
unset($_SESSION['luid']);
header("Location:index.php");
?>
<html>
<title>start barter,swap,exchange and more,swap books,swap dvd,swap games,swap furniture</title>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-03-08T22:10:21+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="swap,exchange,barter,starter,barters,swap books,swap dvd,swap games,swap furniture,swap kids gear">
<meta name="description" content="swap,exchange,barter,starter,barters,swap books,swap dvd,swap games,swap furniture,swap kids gear">
<meta name="ROBOTS" content="INDEX, FOLLOW">
</html>