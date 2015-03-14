<!DOCTYPE html>
<html>
<head>
<?php
ob_start();
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
<meta name="date" content="2015-03-14T18:53:49+0530" >
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
   $section_id = addslashes($section_id);
   $category1=trim($_POST['cat']);
   $category1 = addslashes($category1);
   $title = trim($_POST['title']);
   $title = addslashes($title);
   $ihave = trim($_POST['ihave']);
   $ihave = addslashes($ihave);
   $iwant=trim($_POST['iwant']);
   $iwant = addslashes($iwant);
   $other=trim($_POST['other']);
   $other = addslashes($other);
   $city=trim($_POST['city']);
   $city = addslashes($city);
   if($city == "Other") {
   $city = trim($_POST['othercity']);
   $city = addslashes($city);
   }
   $lcty = trim($_POST['location']);
   $lcty = addslashes($lcty);
   $lcty = ucwords($lcty);
   
   $cnt = mt_rand(1,6);
   $dir = "uploads/uploads".$cnt."/dpi.jpg";


# open a database conn
require 'dbcon.php';

$stmt = $db->prepare("insert into item_desk values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute(array('',"$section_id","$category1","$title","$ihave","$iwant","$other","$city","$lcty","$uid","$dir",'',''));
$url = "Location:dashboard.php";
header($url);
exit;
}
$db=null;
?>



<h2 id="heading2"> Upload a new item!! </h2>

<div id="main">
<form action="itemupload.php" method="post">

<table id="itemupload" border="0" cellpadding="1" cellspacing="1" width="550">
<tr>
<td>Title</td>
<td><INPUT type="text" name="title" title ="Name of the item max 25 chars" maxlength="25" required></td>
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
<textarea id="msgarea2" name="ihave" rows="5" cols="40" maxlength="200" title="short description of what you want to offer (max 200 characters)" required>
</textarea>
<br>
<label>Remaining characters:</label>
<label id="lftcnt2" for="tomsg"></label>
</td>
</tr>
<tr>
<td>I Want :</td>
<td>
<textarea id="msgarea3" name="iwant" rows="5" cols="40" maxlength="200" title="short description of what you want in exchange (max 200 characters)" required>
</textarea>
<br>
<label>Remaining characters:</label>
<label id="lftcnt3" for="tomsg"></label>
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
<td>Swap Location</td>
<td>
<select id="city" name="city" title="place where you want to connect?">
  <option value="bengaluru">Bengaluru</option>
  <option value="ahmedabad">Ahmedabad</option>
  <option value="chennai">Chennai</option>
  <option value="delhi">Delhi</option>
  <option value="hyderabad">Hyderabad</option>
  <option value="jaipur">Jaipur</option>
  <option value="kolkata">Kolkata</option>
  <option value="mumbai">Mumbai</option>
  <option value="pune">Pune</option>
  <option value="Other">other</option>
</select>

<input type="text" name="othercity" id="othercity" class="hidden" maxlength="50" size="14" title="enter your city name" >
</td>

</tr>

<tr>
<td>specific area </td>
<td>
<input type="text" name="location" id="location"  maxlength="30" size="14" title="enter your locality(max 30 characters) for better search ex:near mg road" >
</td>
</tr>


<td>
<p> </p>
</td>



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

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>

</body>
</div>

</html>
