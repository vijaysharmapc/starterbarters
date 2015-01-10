<!DOCTYPE html>
<html>
<head>
<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-01-10T13:37:43+0530" >
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
printf ('<h2 id="heading2"> Please login here  </h2>');
if(isset($_POST['ulogin'])) {
//session_start();
$ulogin = $_POST['ulogin'];
$upassword = $_POST['upassword'];
//$upassword = md5($upassword);

# open a database conn
require 'dbcon.php';
//build query
$query = " select CONCAT(user_name,'',user_id),password,first_name,image_name from user_base ";
if ($ulogin && $upassword )  {
$query = $query . " where CONCAT(user_name,'',user_id) = '" . $ulogin . "' and password = '" . $upassword . "'";
}

$sth = $db->query($query);
$ucount = $sth->rowCount(); 
if ($ucount ==0){
printf('<section id="main">');
printf ("<p> Wrong user id or password ,please try again </p>");

 
} else {
$_SESSION['loggedin'] = "YES";
$_SESSION['uid'] = $ulogin;
$row = $sth->fetch(PDO::FETCH_ASSOC);
$_SESSION['name'] = $row['first_name'];
$_SESSION['image_name'] = $row['image_name'];
$url = "Location:dashboard.php";
header($url);
exit;
}
}
$db=null;
?>
<section id="main">
<form action="login.php" method="POST">
<table border="0" cellpadding="10" cellspacing="2" width="500" align="center">
<tr>
<br><br>
<td align="right">User id</td>
<td><INPUT type="text" name="ulogin"  required></td>
</tr>
<tr>
<td align="right">Password</td>
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