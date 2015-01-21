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

//echo ('<input id="uid" type="hidden" name="uid" value = ' .$uid.'>');
}





//$uid = trim($_POST['uid']);
//echo $uid;

$show = htmlentities("Upload a new item");
//echo ('<a class = "mylst" style="color:Green ;font-weight: bold" href="itemupload.php">' .$show . '<a/>');
//echo "from ajax";
//echo ("<br><br>");
//echo "Existing uploads : " ;
//echo ("<br><br>");
# open a database conn
require '../dbcon.php';

//$sql = "select title,have,want,other,city,file_path from item_desk where usr_id = ". mysql_real_escape_string(trim($_POST['uid'])) ."";

$result = $db->prepare("select title,have,want,other,city,file_path from item_desk where usr_id = ?");
//$stmt->execute(array("$uid",“%$searchauthor”));
$result->execute(array("$uid"));
$linecount = $result->rowCount();
if ($linecount ==0){
printf ("sorry we did not find any matching categories");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit;
}
$i=0;
$data = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$data[$i]['title']=$row['title'];
$data[$i]['have']=$row['have'];
$data[$i]['want']=$row['want'];
$data[$i]['other']=$row['other'];
$data[$i]['city']=$row['city'];
$data[$i]['file_path']=$row['file_path'];
$i++;
};
$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);

?>