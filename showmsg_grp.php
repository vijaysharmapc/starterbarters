<!DOCTYPE html>
<html>
<head>
<?php
if(!isset($_SESSION['loggedin'])) 
    {
        session_start(); 
    }
//session_start();
if(empty($_SESSION['loggedin']))
{
header("Not logged in");
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
$varg = $_SESSION['vargg'];
//full path of image
$img_name = $_SESSION['image_name'];
}
?>

<title>start barter,swap,exchange and more</title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-03-08T19:38:00+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="swap,exchange,barter,starter,barters">
<meta name="description" content="start,barter,swap,exchange">
<meta name="ROBOTS" content="INDEX, FOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<?php
include_once("analyticstracking.php");
require 'navigation.php';
$name = ucwords($name);
echo ('<h2 id="heading2"> You can view and reply to messages here , '. $name .'</h2>');
?>
<div id="main">
<table border="0" cellpadding="10" cellspacing="2" width="500" align="center">
<div id="msglist">
<?php
if(isset($_POST['submit2']) == true){
$frmid = $_POST['frmid'];
$frmnme = $_POST['frnnme'];
$frmid = htmlentities($frmid);
$frmid = addslashes($frmid);
$frnnme = htmlentities($name);
$frnnme = trim($frnnme);
$frnnme = addslashes($frnnme);
$cnct=  $frmid.'+'.$frmnme;
//printf($cnct);
printf('<input type="hidden" name= "frnnme3" id="grpcht"  value="'.$cnct.'"/>');
printf('<div id="chatarea3"> </div>');

}
?>



</body>
</html>