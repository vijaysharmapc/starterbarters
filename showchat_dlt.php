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


//$_POST['var3'] = "vijay9";
if(isset($_POST['var3']) == true){
$frmid = $_POST['var3'];
$frmid = htmlentities($frmid);
$frmid = trim($frmid);
$frmid = addslashes($frmid);


# open a database conn
require '../dbcon.php';

$result = $db->prepare("select message_id,fromid,from_name,message,toid,to_name from message_list where fromid = ? and toid =? order by message_id");
$result->execute(array("$frmid","$uid"));

$linecount = $result->rowCount();
if ($linecount ==0){
$retval = array('status_value' => 1,'status_text' => 'TRUE','total_count' =>0);
echo json_encode($retval);
exit;
}
$i=0;
$data = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$data[$i]['from_name']=$row['from_name'];
$data[$i]['message']=$row['message'];
$data[$i]['to_name']=$row['to_name'];
$data[$i]['toid']=$row['toid'];

$i++;
};

$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);

}
$db = null;

?>
