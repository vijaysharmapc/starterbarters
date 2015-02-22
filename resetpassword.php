<?php
ob_start();
session_start();
require 'navigation.php';
# open a database conn
require 'dbcon.php';

if(isset($_POST['ulogin'])) {
$ulogin = $_POST['ulogin'];
$ulogin = addslashes($ulogin);
$newpswd = $_POST['upassword2'];
$newpswd = addslashes($newpswd);
$newpswd = md5($newpswd);
$varcode = $_POST['verify'];
$varcode = addslashes($varcode);

$result = $db->prepare("select email,vrfcode from verify_email where email = ? and vrfcode = ? group by chng_id,vrfcode,email");
$result->execute(array($ulogin,$varcode));
$linecount = $result->rowCount();

if ($linecount == 1){
$stmt = $db->prepare("update user_base set password = ? where email = ?");
$stmt->execute(array($newpswd,$ulogin));
header("Location: login.php");

$result = $db->prepare("DELETE  from verify_email where email = ?");
$result->execute(array($ulogin));


} else {
echo "wrong email or verification fail";
//exit;
}
}
$db=null;
?>
<!DOCTYPE html>
<html>
<head>
<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-02-21T16:06:09+0530" >
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

<section id="main">
<form action="resetpassword.php" method="POST">
<table border="0" cellpadding="10" cellspacing="2" width="500" align="center">
<tr>
<br><br>
<td align="right">Registered email : </td>
<td><INPUT type="text" name="ulogin" id="emailv"  required></td>
<td><INPUT type="button" name="send" id="vmail" value="verify"> </td>
</tr>
<tr>
<td align="right">New Password : </td>
<td><INPUT type="Password" name="upassword1" id="pass1"  required></td>
</tr>
<tr>
<td align="right">Retype New Password : </td>
<td><INPUT type="Password" name="upassword2" id="pass2"  required></td>
</tr>

<tr>
<td align="right">Verification code: </td>
<td> <INPUT type="text" id ="vrfcode" name="verify" title = "check your registered email inbox" required> </td>
</tr>


<tr>
<td></td>
<td><INPUT type="submit" name="submit" value="reset" id ="resetclick" ></td>
</tr>
<tr>

</tr>
</table>
</form>

<br><br><br><br><br><br><br><br><br>

</section>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>

</html>