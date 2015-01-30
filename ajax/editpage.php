
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
//combo of uid and lid
$luid = $_SESSION["luid"] ;
//echo ('<input id="uid" type="hidden" name="uid" value = ' .$uid.'>');
}
//echo $luid;
$show = htmlentities("Upload a new item");

# open a database conn
require '../dbcon.php';

//$sql = "select title,have,want,other,city,file_path from item_desk where usr_id = ". mysql_real_escape_string(trim($_POST['uid'])) ."";
$result = $db->prepare("select line_id,section_id,category_id,title,have,want,other,city,file_path from item_desk where CONCAT(usr_id,'',line_id) = ?");
$result->execute(array("$luid"));
$linecount = $result->rowCount();
if ($linecount ==0){
printf ("sorry we did not find any matching categories");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit;
}
$i=0;
$data = array();
if ($linecount ==1){
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$data[$i]['file_paths']=$row['file_path'];
$_SESSION['file_path'] = $row['file_path'];
$data[$i]['line_ids']=$row['line_id'];
$data[$i]['titles']=$row['title'];
$data[$i]['haves']=$row['have'];
$data[$i]['wants']=$row['want'];
$data[$i]['others']=$row['other'];
$data[$i]['citys']=$row['city'];
//echo $_SESSION['file_path'];
$i++;
};
};

$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);
$db = null;

//update query

?>