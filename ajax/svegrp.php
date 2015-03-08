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



if(isset($_POST['var2']) == true){
$var2 = $_POST['var2'];
$var2 = trim($var2);
$var2 = addslashes($var2);
# open a database conn
require '../dbcon.php';

$stmt = $db->prepare("insert into groups values (?,?,?)");
$stmt->execute(array('',"$uid","$var2"));
$retval = array( 'status_value' => 1,'status_text' => 'TRUE');
echo json_encode($retval);

}


$db = null;
?>



