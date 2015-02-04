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
echo ('<p> kindly login if you are a existing user or register if you are a new user,then login</p>');
echo ('<a href="index.php">Back</a>');
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
//full path of image
$img_name = $_SESSION['image_name'];
if(isset($_SESSION['image_name_item'])){ 
$img_name_item = $_SESSION['image_name_item'];
};
//echo $img_name;
}
?>

<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-02-05T00:31:33+0530" >
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
require 'navigation.php';
$name = ucwords($name);
echo ('<h2 id="heading2">'. $name .' you can send a message to this item owner</h2>');

//get clicked edit or delete on dashboard.php
if (isset($_GET['tmp2'])){
$lid = trim($_GET['tmp2']);
settype($lid, 'integer');
$lid = addslashes($lid);
printf ('<input id="editclk" type="text" name="catid" value='.$lid.'>');
$_SESSION["lidv"] = $lid;
}
/*
if(empty($_SESSION["luid"])){
//session_start();
};
printf ('<input id="editclk" type="hidden" name="catid" value='.$luid.'>');
$_SESSION["luid"] = $luid;
$_SESSION["lid"] = $lid;
//echo  $_SESSION["luid"];
}
*/
?>


<section id="main">

<form action="file_uploader_item.php" method="post" enctype="multipart/form-data">
<br>
<?php
//file path will have default image of item also src set by js
//$file_path = $_SESSION["file_path"];
printf ('<img id="idp" src="" class="dashimg" height="200" width="200" title="click here to change">');
//}
?>
</form>
<div id="editdata2">

</div>



</section>
<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
