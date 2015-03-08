<?php
if(!isset($_SESSION['loggedin'])) 
    {
        session_start(); 
    }
//session_start();
if(empty($_SESSION['loggedin']))
//if(!$_SESSION['loggedin'])
{
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
//full path of image
$img_name = $_SESSION['image_name'];
}



if(isset($_POST['var3']) == 1){

# open a database conn
require '../dbcon.php';

$result = $db->prepare("select group_id,uid,group_name from groups where uid = ? order by group_id desc");
$result->execute(array("$uid"));
$linecount = $result->rowCount();
if ($linecount ==0){
$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' =>0);
echo json_encode($retval);
exit;
}
$i=0;
$data = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$data[$i]['uid']=$row['uid'];
$data[$i]['group_name']=$row['group_name'];
$i++;
};


$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);
$db = null;
}
?>