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

//$show = htmlentities("Upload a new item");
if(isset($_POST['tmp']) == true){
$uidg = trim($_POST['tmp']);
$_SESSION['vargg'] = $uidg;

# open a database conn
require '../dbcon.php';

$result = $db->prepare("select line_id,title,have,want,other,city,file_path from item_desk where usr_id = ?");
$result->execute(array("$uidg"));

$linecount = $result->rowCount();
if ($linecount ==0){
printf ("sorry we did not find any matching categories");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit;
}
$i=0;
$data = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$data[$i]['line_id']=$row['line_id'];
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
};
$db = null;
?>