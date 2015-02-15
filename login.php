<?php
ob_start();
error_reporting(E_ALL);
session_start();
require 'navigation.php';

if(isset($_POST['ulogin'])) {

$ulogin = $_POST['ulogin'];
$ulogin = addslashes($ulogin);
$upassword = $_POST['upassword'];
$upassword = addslashes($upassword);
$upassword = md5($upassword);

printf ('<h2 id="heading2"> Please login here  </h2>');
# open a database conn
require 'dbcon.php';
//build query
$query = " select CONCAT(user_name,'',user_id) as uid,password,first_name,image_name,email from user_base ";
if ($ulogin && $upassword )  {
//$query = $query . " where CONCAT(user_name,'',user_id) = '" . $ulogin . "' and password = '" . $upassword . "'";
$query = $query . " where email = '" . $ulogin . "' and password = '" . $upassword . "'";
}

$sth = $db->query($query);
$ucount = $sth->rowCount(); 
if ($ucount ==0){
printf('<section id="main">');
printf ("<p> Wrong user id or password ,please try again </p>");
//exit;
} elseif($ucount ==1) {
$_SESSION['loggedin'] = "YES";
$row = $sth->fetch(PDO::FETCH_ASSOC);
$_SESSION['uid'] = $row['uid'];
$_SESSION['name'] = $row['first_name'];
//full file path
$_SESSION['image_name'] = $row['image_name'];


header("Location: dashboard.php");
//die();
//login time stamp
//echo $_SESSION['uid'];
//echo $ulogin;
$stmt = $db->prepare("update user_base set time_stamp = now() where email = ?");
$stmt->execute(array($ulogin));

exit;
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
<meta name="date" content="2015-02-15T20:35:57+0530" >
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
<form action="login.php" method="POST">
<table border="0" cellpadding="10" cellspacing="2" width="500" align="center">
<tr>
<br><br>
<td align="right">Registered email : </td>
<td><INPUT type="text" name="ulogin"  required></td>
</tr>
<tr>
<td align="right">Password : </td>
<td><INPUT type="Password" name="upassword"  required></td>
</tr>
<tr>
<td></td>
<td><INPUT type="submit" name="submit" value="login"></td>
</tr>
</table>
</form>

<br><br><br><br><br><br><br><br><br>

</section>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>

</html>