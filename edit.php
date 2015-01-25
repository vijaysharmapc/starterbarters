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
<meta name="date" content="2015-01-25T19:12:37+0530" >
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
$name = ucwords($name);
echo ('<h2 id="heading2">'. $name .' you can upload a item image & edit information</h2>');
$lid = trim($_GET['lid']);
echo $lid;
settype($lid, 'integer');
$lid = addslashes($lid);
$uid = $uid.$lid;

# open a database conn
require 'dbcon.php';

$result = $db->prepare("select line_id,section_id,category_id,title,have,want,other,city,file_path from item_desk where CONCAT(usr_id,'',line_id) = ?");
$result->execute(array("$uid"));
$linecount = $result->rowCount();
if ($linecount ==0){
printf ("sorry we did not find any matching data");
exit;
}
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$show = htmlentities($row['category_name']);
//echo $show;
//echo "<br>";
echo ('<a class = "catlist" style="color:black ;font-weight: bold" href="checkout.php?bookid=' . urlencode($show) . '">' .$show . '<a/>');
echo " &nbsp has 120 items";
echo "<br>";
}


?>


<section id="main">
<form action="file_uploader.php" method="post" enctype="multipart/form-data">
<br>
<?php
printf ('<img id="dp" src="'.$img_name .'" class="dashimg" height="200" width="200" title="click here to change">')
?>
<div id="move" class="move_back">
<p> Select image to upload:</p>
<p><input type="file" name="fileToUpload" id="fileToUpload"></p>
<input type="submit" value="Upload" name="submit">
(&nbsp<a id='lgn' href='' style='color:black'>Cancel</a><br>
</div>
</form>

</section>
<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
