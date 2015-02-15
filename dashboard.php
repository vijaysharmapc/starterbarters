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

<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-02-15T00:52:11+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
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
<p id="data">
</p>
</div>



</div>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
