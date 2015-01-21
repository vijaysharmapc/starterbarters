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
$fldr_path = $_SESSION['image_name'];
$fldr_path = substr($fldr_path,0,17);
}
?>
<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-01-18T22:17:09+0530" >
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


?>
<?php
require 'navigation.php';
if(isset($_POST['ihave'])) {
   $section_id=trim($_POST['subcat']);
   $category1=trim($_POST['cat']);
   $title = trim($_POST['title']);
   $ihave = trim($_POST['ihave']);
   $iwant=trim($_POST['iwant']);
   $other=trim($_POST['other']);
   $city=trim($_POST['city']);
   $cnt = mt_rand(1,6);
   $dir = "uploads/uploads".$cnt."/dpi.jpg";

# open a database conn
require 'dbcon.php';

$stmt = $db->prepare("insert into item_desk values (?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute(array('',"$section_id","$category1","$title","$ihave","$iwant","$other","$city","$uid","$dir",'',''));
$url = "Location:myitem.php";
header($url);
//$stmt = $db->prepare("insert into user_base values (?,?,?,?,?,?)");
//$user_name = substr($firstname,0,5);
//$stmt->execute(array('',"$user_name","$firstname","$pswd1","$dir",null));
//printf ("<br> Item added" );
//printf ("<br> <a href= dashboard.php>Return to my dashboard</a>");
exit;
}
$db=null;
?>









<h2 id="heading2"> Upload a new item!! </h2>
<section id="main">
<div id="hometext">

<form action="itemupload.php" method="post">

<table id="itemupload" border="0" cellpadding="1" cellspacing="1" width="550" align="center">
<tr>
<td>Title</td>
<td><INPUT type="text" name="title" title ="Name of the item" required></td>
</tr>


<tr>
<td>Select Category</td>
<td>
<select name="category1" class="category1" title="select the category of the item you are uploading" required>
<option value="Select"></option>
<option id="books" value="books">Books</option>
<option id="dvds" value="dvds">Dvd & Films</option>
<option id="sports" value="sports">Sports Gear</option>
<option id="furnitures" value="furnitures">Furnitures</option>
<option id="electronics" value="electronics">Electronics</option>
<option id="toys" value="toys">Toys & Baby Gear</option>
<option id="twos" value="twos">Two Wheelers</option>
<option id="cars" value="cars">Cars</option>
</select>
</td>
</tr>

<tr>
<td>Select a Sub Category</td>
<td>
<select name="category2" id="category2" title="select the subcategory of the item">
</select>
</td>
</tr>
<tr>
<td>I Have : </td>
<td>
<textarea name="ihave" rows="5" cols="30" maxlength="150" title="short description of what you want to offer (max 150 characters)" required>
</textarea>
</td>
</tr>
<tr>
<td>I Want :</td>
<td>
<textarea name="iwant" rows="5" cols="30" maxlength="150" title="short description of what you want in exchange (max 150 characters)" required>
</textarea>
</td>
</tr>
<tr>
<td>Open to other swaps?</td>
<td>
<select name="other" title="open to other swap offers besides what you want?">
  <option value="yes">Yes</option>
  <option value="no">No</option>
</select>
</td>
</tr>

<tr>
<td>Swap City</td>
<td>
<select name="city" title="place where you want to connect?">
  <option value="bengaluru">Bengaluru</option>
  <option value="ahmedabad">Ahmedabad</option>
  <option value="chennai">Chennai</option>
  <option value="delhi">Delhi</option>
  <option value="hyderabad">Hyderabad</option>
  <option value="jaipur">Jaipur</option>
  <option value="kolkata">Kolkata</option>
  <option value="mumbai">Mumbai</option>
  <option value="pune">Pune</option>
</select>
</td>
</tr>

<tr>
<td>
<p> Click icon to upload an image of the item</p>
</td>
<!--
<td>
<form action="itemupload.php" method="post" enctype="multipart/form-data">
<br>
<?php
printf ('<img id="dp" src="'. $fldr_path .'/dpi.jpg" class="" height="200" width="200" title="click here to change">');
?>
<div id="move" class="move_back">
<p><input type="file" name="fileToUpload" id="fileToUpload"></p>
<input type="submit" value="Upload" name="submit">
&nbsp<a id='lgn' href='itemupload.php' style='color:black'>Cancel</a><br>
</div>
</form>
</td>
</tr>
-->
<tr>
<td>
<INPUT type="submit" name="submit" value="Upload" id = "itemadd" style="height:40px; width:150px">
</td>
<td>
<a id='lgn' href='dashboard.php' style='color:black'>Cancel</a>
</td>
<td>
<input id="cat" type="hidden" name="cat">
<input id ="subcat" type="hidden" name="subcat" >
</td>
</tr>

</table>
</form>

</div>
</section>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
