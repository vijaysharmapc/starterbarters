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
<meta name="date" content="2015-03-08T12:51:46+0530" >
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
if(isset($_POST['submit']) == true){
$frmid = $_POST['frmid'];
$frnnme = $_POST['frnnme'];
$frmid = htmlentities($frmid);
$frmid = trim($frmid);
$frmid = addslashes($frmid);
$frnnme = htmlentities($frnnme);
$frnnme = trim($frnnme);
$frnnme = addslashes($frnnme);

//echo $frmid;
//echo "ssss";

# open a database conn
require 'dbcon.php';

$result = $db->prepare("select message_id,fromid,from_name,message,toid,to_name from message_list where (fromid = ? or fromid =?) and (toid =? or toid=?) and message<>'' order by message_id");
//$result->execute(array("$frmid","$uid","$frmid","$uid"));
$result->execute(array("$frmid","$uid","$frmid","$uid"));

$linecount = $result->rowCount();
if ($linecount ==0){
echo "NO data to display";
exit;
}
$i=0;
$data = array();
printf('<table id="msg3">');
printf('<tr><td>');
printf('<div id="chatarea2" class="DivToScroll DivWithScroll" >');
$frname = $name;
//$uid
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$fname =$row['from_name'];
$toid = $frmid;
$toname =$frnnme;
$msgid = $row['message_id'];
if (ucwords($fname) == $name){
printf('<li id="right">  '.$row['from_name'].' >  '.stripslashes($row['message']).'</li>');
} else {
printf('<li id="left" >'.$row['from_name'].' < '.stripslashes($row['message']).'</li>');
};
$i++;
$fname='';
echo '<br>';

$stmt = $db->prepare("update message_list set toseen=1,to_stamp=now() where toid=? and message_id=? and toseen=0");
$stmt->execute(array($uid,$msgid));


};
printf('</div>');
printf('</td></tr>');
printf('<tr><td>');
printf('<textarea id="msgarea" cols="65" rows="4" name ="msgarea" maxlength="300">');
printf('</textarea>');
printf('</td></tr>');
printf('<tr><td>');
printf('<label>Remaining characters : </label>');
printf('<label id="lftcnt" for="tomsg"></label>');
printf('</td></tr>');
printf('<tr><td>');
printf('<input type="submit" id="sendmsg2" class= "sendmsg2" type="submit" width = 30 name="send" value="Send">&nbsp&nbsp');
printf('<a  id ="backitmview" style ="color:blue" href="dashboard.php">Back</a><div id="msgstatus"></div></td>');
printf('</tr>');
$var1 = $toname."+".$toid."+0";
//printf('<input type="hidden" value ="'.$cnct.'" id="sendmsg">');
printf('<input type="hidden" value ="'.$var1.'" id="sendmsg3">');
printf('</table>');

}


$db = null;

?>
</div>
</div>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
