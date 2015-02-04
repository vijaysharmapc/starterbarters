<?php
if(!isset($_SESSION['loggedin'])) 
    {
        session_start(); 
    }
//session_start();
if(empty($_SESSION['loggedin']))
{
echo ('if you are a existing user,please login.New users please register & then login');
echo ('<a href="/index.php">Back</a>');
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
//full path of image
$img_name = $_SESSION['image_name'];
//combo of uid and lid
$lid =$_SESSION["lidv"];
}

//$_POST['tmp2']=9;

//if(isset($_POST['tmp2']) == true){
//$lid = $_POST['tmp2'];
//}

# open a database conn
require '../dbcon.php';
//$sql = "select title,have,want,other,city,file_path from item_desk where usr_id = ". mysql_real_escape_string(trim($_POST['uid'])) ."";
$result = $db->prepare("select line_id,section_id,category_id,title,have,want,other,city,file_path from item_desk where line_id = ?");
$result->execute(array("$lid"));
$linecount = $result->rowCount();
if ($linecount ==0){
$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => 0);
echo json_encode($retval);
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
$i++;
};
};
$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);
$db = null;
//update query
?>