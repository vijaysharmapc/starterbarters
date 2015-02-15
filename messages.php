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
<meta name="date" content="2015-02-15T12:34:13+0530" >
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
//include_once("analyticstracking.php");
require 'navigation.php';
$name = ucwords($name);
echo ('<h2 id="heading2"> Each message you send can contain 300 characters , '. $name .'</h2>');
if(isset($_POST['send']) == true){
$var1 = $_POST['send'];
//echo $var1;
printf('<input type="hidden" value ="'.$var1.'" id="sendmsg">');
$name = explode("+",$var1);
$back = $name[2];
$back = addslashes($back);
$tofname =$name[0];
$tofname = trim($tofname);
$tofname = addslashes($tofname);

}
?>

<div id="main">
<div class="messages" id="message">

<table border="0" cellpadding="10" cellspacing="2" width="500" align="center">
<tr>
<br><br>
<td align="right">Send To</td>
<?php
printf('<td><label id="tomsg" for="tomsg">'.$tofname.'</label></td>');
?>
</tr>
<tr>
<td align="right">Message</td>
<td>
<textarea id="msgarea" cols="50" rows="5" name ="msgarea" maxlength="300">
</textarea>
<br>
<label>Remaining characters</label>
<label id="lftcnt" for="tomsg"></label>
</td>
</tr>
<tr>
<td>
<?php
printf('<input type="submit" id="sendmsg" type="submit" width = 30 name="send" value="Send">');
?>
</td>
<td>
<?php
printf('<a  id ="backitmview" style ="color:blue" href="itemview.php?subcat='.$back.'">Back</a>');
?>
</td>
<td>
</td>
</tr>
<tr>
<td>
<div id="msgstatus">
</div>
</td>

</tr>


</table>

</div>
</div>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>