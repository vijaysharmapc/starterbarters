<?php
if(!isset($_SESSION['loggedin'])) 
    {
        //session_start(); 
    }
if(empty($_SESSION['loggedin']))
{
header("Not logged in");
//exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
//full path of image
$img_name = $_SESSION['image_name'];

}


//<?php
//$_POST['tmps'] =2;
if(isset($_POST['tmps']) == true){
$subcat = trim($_POST['tmps']);
settype($subcat, 'integer');
$subcat = addslashes($subcat);
//$lcty = $_POST['llty2'];
//$cty = $_POST['cty2'];
# open a database conn
require '../dbcon.php';

$result = $db->prepare("select name,id,review,dpp from reviews order by id desc");
$result->execute(array("1"));

$linecount = $result->rowCount();
if ($linecount ==0){
$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' =>0);
echo json_encode($retval);
exit;
}
$i=0;
$data = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$data[$i]['line_id']=$row['id'];
$data[$i]['title']=$row['review'];
$data[$i]['have']=$row['dpp'];
$data[$i]['name']=$row['name'];
$i++;
};


$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);
$db = null;
}
?>