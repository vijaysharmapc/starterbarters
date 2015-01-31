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
<meta name="date" content="2015-01-31T13:12:23+0530" >
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
echo ('<h2 id="heading2">'. $name .' you can upload a item image & edit information</h2>');

//get clicked edit on dashboard.php
if (isset($_GET['lid'])){
$lid = trim($_GET['lid']);
settype($lid, 'integer');
$lid = addslashes($lid);
$luid = $uid.$lid;

if(empty($_SESSION["luid"])){
//session_start();
};
printf ('<input id="editclk" type="hidden" name="catid" value='.$luid.'>');
$_SESSION["luid"] = $luid;
$_SESSION["lid"] = $lid;
//echo  $_SESSION["luid"];
}

?>


<section id="main">

<form action="file_uploader_item.php" method="post" enctype="multipart/form-data">
<br>
<?php
//file path will have default image of item
$file_path = $_SESSION["file_path"];
printf ('<img id="idp" src="" class="dashimg" height="200" width="200" title="click here to change">');
//}
?>
<div id="move" class="move_back">
<p> Select image to upload:</p>
<p><input type="file" name="fileToUpload" id="fileToUpload"></p>
<input type="submit" value="Upload" name="submit">
(&nbsp<a id='lgn' href='' style='color:black'>Cancel</a><br>
</div>
</form>
<div id="editdata">

</div>



</section>
<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
