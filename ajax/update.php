
<?php
if(!isset($_SESSION['loggedin'])) 
    {
        session_start(); 
    }
if(empty($_SESSION['loggedin']))
{
header("Not logged in");
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
$lid = $_SESSION["lid"];
//full path of image profile
$img_name = $_SESSION['image_name'];
//full path of item id
$file_path_item = $_SESSION['file_path'];
//combo of uid and lid
$luid = $_SESSION["luid"] ;
}
# open a database conn
require '../dbcon.php';


try{
$stmt = $db->prepare("update user_base set time_stamp = now() where CONCAT(user_name,'',user_id) = ?");
$stmt->execute(array("$ulogin"));
}
catch (PDOException $e) {
printf("Execution failed -  %s\n",$e->getMessage());
}

echo json_encode($retval);
$db = null;
//update query

?>