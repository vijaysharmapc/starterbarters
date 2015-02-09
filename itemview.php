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
echo ('<p> kindly login if you are a existing user or register if you are a new user,then login</p>');
echo ('<a href="index.php">Back</a>');
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
//full path of image
$img_name = $_SESSION['image_name'];
if(isset($_SESSION['image_name_item'])){ 
$img_name_item = $_SESSION['image_name_item'];
};
//echo $img_name;
}
?>

<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-02-09T20:31:53+0530" >
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
echo ('<h2 id="heading2">'. $name .' you can send a message to this item owner</h2>');

//get clicked edit or delete on dashboard.php
if (isset($_GET['subcat'])){
$lid = trim($_GET['subcat']);
settype($lid, 'integer');
$lid = addslashes($lid);
# open a database conn
require 'dbcon.php';


$result = $db->prepare("select line_id,section_id,category_id,title,have,want,other,city,usr_id,file_path from item_desk where line_id = ?");
$result->execute(array("$lid"));

$linecount = $result->rowCount();
//echo $linecount;

if ($linecount ==0){
printf ("<p>sorry we did not find any matching data</p>");
exit;
}

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$title = htmlentities($row['title']);
$have = htmlentities($row['have']);
$want = htmlentities($row['want']);
$other = htmlentities($row['other']);
$city = htmlentities($row['city']);
$file = htmlentities($row['file_path']);
$usrnme = htmlentities($row['usr_id']);


$result2 = $db->prepare("select first_name from user_base where CONCAT(user_name,'',user_id) = ?");
$result2->execute(array("$usrnme"));
$rows = $result2->fetch(PDO::FETCH_ASSOC);
$fname = htmlentities($rows['first_name']);
$fname = ucwords($fname);
$cont = $fname."+".$usrnme."+".$lid;
echo '<section id="main">';
echo "<br>";
printf ('<img id="idp2" src='.$file.' class="dashimg" height="200" width="200" >');
echo "<br>";
printf ('<form action="messages.php" method="POST">');
printf ('<button name="send" type="submit" value="'.$cont.'">Send message</button>');
printf ('');
printf('&nbsp,&nbsp,&nbsp,&nbsp,&nbsp,&nbsp,&nbsp,&nbsp');
printf ('<a href="category.php?catid=1" style = "color:blue">Back</a>');

printf('</form>');

printf ('<div id="editdata2">');
echo "<br>";
printf ('<table id="itmview">');
printf ('<tr id="vt"><td>Owned by :</td>');
printf ('<td>'.$fname.' </td></tr>');
printf ('<tr id="vt"><td>Title :</td>');
printf ('<td>'.$title.' </td></tr>');
printf ('<tr id="vt"><td>I have :</td>');
printf ('<td>'.$have.' </td></tr>');
printf ('<tr id="vt"><td>I want :</td>');
printf ('<td>'.$want.' </td></tr>');
printf ('<tr id="vt"><td>Open to other offers?</td>');
printf ('<td>'.$other.' </td></tr>');
printf ('<tr id="vt"><td>Place :</td>');
printf ('<td>'.$city.' </td></tr>');

printf('</div>');
printf ('</table>');


}




$db=null;
}
?>






</section>
<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>
</div>

</html>
