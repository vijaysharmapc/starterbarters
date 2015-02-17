<!DOCTYPE html>
<html>
<head>
<title>SwapSite</title>
<link rel="stylesheet" href="/starterbarters/page.css"/>

<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-02-17T23:37:59+0530" >
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
//check if email is valid
if (isset($_POST["customeremail"])){


$email = $_POST["customeremail"];
if (strpos($email,'@') == false) {
echo " invalid email";
exit;
}


//get data from form
$customeremail = $_POST["customeremail"];
$message = $_POST["message"];
$replywanted = false;
if (isset($_POST["replywanted"])) $replywanted=true;
//Build  the text of email
$t = "you have received an message from " . $customeremail . " :\n";
$t = $t . $message . ":\n";
if ($replywanted)
$t = $t . "a reply was requested";
else
$t = $t . "No reply was requested";

//send an email
mail("mail@starterbarters.com","Customer message", $t);


}
?>

<h2 id="heading2">  Give us feedback or ask a question here .. </h2>
<section id="main">

<p>
 Please feel free to leave your feedback,<br>
 you could either mail us using the below form .<br>
 Or contact us on 00838728282
</p>


<form action="contact.php" method="post">
<table cellpadding="20">
<tr>
<td>Your email: </td>
<td><INPUT type="text" name="customeremail"></td>
</tr>
<tr>
<td>Your message:</td>
<td><textarea rows="5" cols="50" name="message"></textarea> </td>
</tr>

<tr>
<td> Do you want an reply?</td>
<td><input type="checkbox" name="replywanted"></td>
</tr>

<tr>
<td><input type="submit" name="submit" value="Send Email"></td>
</tr>
</table>

</form>

</section>
<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
