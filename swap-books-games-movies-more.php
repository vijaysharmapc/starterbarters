<!DOCTYPE html>
<html>
<head>
<?php
ob_start();
if(!isset($_SESSION['loggedin'])) 
    {
      //  session_start(); 
    }
//session_start();
if(empty($_SESSION['loggedin']))
//if(!$_SESSION['loggedin'])
{
//exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
//full path of image
$img_name = $_SESSION['image_name'];
if(isset($_SESSION['vargg'])){
$varg = $_SESSION['vargg'];
}
}
?>

<title>swap books,games,movies & more </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-03-28T17:35:45+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="swap,exchange,barter,books,movies,swap books,swap dvd,swap games,swap furniture,book lovers">
<meta name="description" content="swap,exchange,barter,books,swap books,swap dvd,swap games,swap furniture,swap kids gear">
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
//$name = ucwords($name);
?>

<h1 id="heading2">share your swap experience here</h1>
<div id="main">
<div  id="vall3" class="DivToScroll2 DivWithScroll2" >

</div>
<?php
if(!isset($_SESSION['loggedin'])) 
{
	printf('<br><br>');
   printf('<p>login to post a comment</p>'); 
}else{
printf('<br><p> post your though</p>');
printf('<td> <textarea id="msgarearr" cols="100" rows="5" name ="msgarea" maxlength="200"></textarea>');
printf('<input type="submit" id="sendmsgr" type="submit" width = 30 name="send" value="Send">');
}

?>

</div>


<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
<script type="text/javascript" src="/starterbarters/js/dialog.js"> </script>
</body>
</div>

</html>
