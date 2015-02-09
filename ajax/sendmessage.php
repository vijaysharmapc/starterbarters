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



if(isset($_POST['var1']) == true){
$var1 = $_POST['var1'];


$name = explode("+",$var1);
//print_r($name);
$touid = $name[1];
$touid = trim($touid);
$touid = addslashes($touid);
$tofname =$name[0];
$tofname = trim($tofname);
$tofname = addslashes($tofname);
$back = $name[2];
$back = addslashes($back);
$uid = $_SESSION['uid'];
$uid = trim($uid);
$uid = addslashes($uid);
$fname = $_SESSION['name'];
$fname = trim($fname);
$fname = addslashes($fname);

if(isset($_POST['msg1']) == true){
$msgarea = htmlspecialchars($_POST['msg1']);
$msgarea = addslashes($msgarea);
};

# open a database conn
require '../dbcon.php';

$stmt = $db->prepare("insert into message_list values (?,?,?,?,?,?,?,?)");
$stmt->execute(array('',"$uid","$$msgarea","$touid",'','','',''));

}

$retval = array( 'status_value' => 'message sent');

echo json_encode($retval);

$db = null;

?>
