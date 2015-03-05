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
//if(!$_SESSION['loggedin'])
{
header("Not logged in");
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
//full path of image
$img_name = $_SESSION['image_name'];
}
?>

<title>start barter,swap,exchange and more</title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-03-05T11:34:46+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="swap,exchange,barter,starter,barters">
<meta name="description" content="start,barter,swap,exchange">
<meta name="ROBOTS" content="INDEX, FOLLOW">
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
echo ('<h2 id="heading2"> Welcome to your dashboard - '. $name .'</h2>');
?>


<!-- /* pop up group*/ -->
<a href="#login-box" class="login-window" style="color:white">Create a group</a>
<div id="login-box" class="login-popup">
<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
  <form method="post" class="signin" action="">
        <fieldset class="textbox">
        <label class="username">
        <span>Enter group name</span>
        <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="group name" title="minumun 5 chracters">
        </label>
        <label class="password">
        <span>Password</span>
        <input id="password" name="password" value="" type="password" placeholder="Password">
        </label>
        <button class="submit button" type="button">Sign in</button>
        <p>
        <a class="forgot" href="#">Forgot your password?</a>
        </p>
        </fieldset>
  </form>
</div>
<!-- /* pop up group*/ -->





<div id="main">
<form action="file_uploader.php" method="post" enctype="multipart/form-data">
<br>
<?php
printf ('<img id="dp" src="'.$img_name .'" class="dashimg" height="150" width="150" title="click here to change">')
?>
<div id="move" class="move_back">
<p> Select image to upload:</p>
<p><input type="file" name="fileToUpload" id="fileToUpload"></p>
<input type="submit" value="Upload" name="submit">
(&nbsp<a id='lgn' href='dashboard.php' style='color:black'>Cancel</a><br>
</div>
</form>
<div id="msgcnt" style="height:12px" Title="new message"></div>
<div class="dashbrd1" id="myl">
<div id="txt1">
My Listings
</div>
</div>

<div class="dashbrd2" id="msg">
<div id="txt2">
My Messages
</div>
</div>
<div class="dashbrd3" id="mp">
<div id="txt3">
My Profile
</div>
</div>
<div class="DivToScroll DivWithScroll" id="data_area">
<p id="data2">
</p>
</div>



</div>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
<script type="text/javascript" src="/starterbarters/js/dialog.js"> </script>
</body>
</div>

</html>
