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
if(isset($_SESSION['vargg'])){
$varg = $_SESSION['vargg'];
}}


if(isset($_POST['msg']) == true){
$msg1 = $_POST['msg'];
$msg1 = addslashes($msg1);
# open a database conn
require '../dbcon.php';

$stmt = $db->prepare("insert into message_list2 values (?,?,?,?,?,?,?,?,?,?)");
$stmt->execute(array('',"$varg","$name","$msg1","$varg","$name",'',"$time",'5',''));

}

$retval = array( 'status_value' => 'message sent');

echo json_encode($retval);

$db = null;

?>
