<!DOCTYPE html>
<html>
<head>
<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-03-10T00:44:30+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<?php
require 'navigation.php';
if(isset($_POST['email'])) {
	$firstname = trim($_POST['firstname']);
	$firstname = addslashes($firstname);
	$lastname=trim($_POST['lastname']);
	$lastname = addslashes($lastname);
	$pswd1 = trim($_POST['password1']);
	$pswd1 = addslashes($pswd1);
	$pswd2 = trim($_POST['password2']);
	$pswd2 = addslashes($pswd2);
   $email=trim($_POST['email']);
   $email = addslashes($email);
   $phone=trim($_POST['phone']);
   $phone = addslashes($phone);
   $country=trim($_POST['country']);
   $country = addslashes($country);
   $state=trim($_POST['state']);
   $state = addslashes($state);
   $city=trim($_POST['city']);
   $city = addslashes($city);
   $postalcode=trim($_POST['postalcode']);
   $postalcode = addslashes($postalcode);
   $terms=trim($_POST['terms']);
   $terms = addslashes($terms);

   $cnt = mt_rand(1,6);
   $dir = "uploads/uploads".$cnt."/dp.jpg";
   
   	
if($pswd1 != $pswd2 ){
	printf("There could be a typo in password fields they do not match!!");
	printf ("<br> <a href=register.php>Return to registration page</a>");
	exit();
}
$pswd1 = md5($pswd1);
# open a database conn
require 'dbcon.php';


$stmt = $db->prepare("insert into registration_desk values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute(array('',"$firstname","$lastname","$pswd1","$email","$phone","$country","$state","$city","$postalcode",'','',"$terms","$dir"));

$stmt = $db->prepare("insert into user_base values (?,?,?,?,?,?,?)");
$user_name = substr($firstname,0,5);
$stmt->execute(array('',"$user_name","$firstname","$pswd1","$dir",null,$email));
printf ("<br> User added" );
printf ("<br> <a href=index.php>Return to home page and login</a>");

exit;
}
$db=null;
?>

<h2 id="heading2"> Proceed with registration here.. </h2>

<section id="main">
<form action="register.php" method="post">

<table id="terms">
<tr>
<td>First Name</td>
<td><INPUT type="text" name="firstname" required></td>
</tr>
<tr>
<td>Last Name</td>
<td><INPUT type="text" name="lastname" required></td>
</tr>
<tr>
<td>Password</td>
<td><INPUT id="pass1" type="password" name="password1" title ="Chose a combination of numbers and text" required></td>
</tr>
<td>Retype the Password</td>
<td><INPUT id="pass2" type="password" name="password2" title ="Chose a combination of numbers and text" required></td>
</tr>
<tr>
<td>Email</td>
<td><INPUT id="eid" type="text" name="email" required></td>
</tr>
<tr>
<td>Mobile Phone</td>
<td><INPUT type="text" name="phone" required></td>
</tr>
<tr> <td> Location details </td></tr>
<tr>
<td>Country</td>
<td><INPUT type="text" name="country" required></td>
</tr>
<tr>
<td>State</td>
<td><INPUT id="state" type="text" name="state" required></td>
</tr>
<tr>
<td>City</td>
<td><INPUT type="text" name="city" required></td>
</tr>
<tr>
<td>Pin/Postal code</td>
<td><INPUT type="text" name="postalcode" required></td>
</tr>
<tr>
<td> Do you agree with the <br>terms & condition? </td>
<td><input type="checkbox" id="state" name="terms" value="1" required>
<a id="" style="color:black" href="terms_of_service.php" target="_blank" > Terms of Service </a>
</td>
</tr>
<tr>
<td></td>
<td><INPUT class="rgstr" type="submit" name="submit" value="Register"></td>
<td><a href="index.php" style="color:black">Back</a></td>
</tr>

</table>
</form>
<p align='right'>**Contact details will not be shared with other users,use messages to build initial communication</p>

</div>
</section>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
