
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
$varg = $_SESSION['vargg'];
//$lid = $_SESSION["lid"];
//full path of image profile
$img_name = $_SESSION['image_name'];
//full path of item id
$file_path_item = $_SESSION['file_path'];
//combo of uid and lid
//$luid = $_SESSION["luid"] ;
}
# open a database conn
require '../dbcon.php';

if(isset($_POST['dlts']) == true){
$dlt1 = $_POST['dlts'];
$dlt1 = addslashes($dlt1);
settype($dlt1, 'integer');
$dlt1=$varg.$dlt1;
} else {exit;}


//$dlt1 = "'".$dlt1."'";

try{
$stmt = $db->prepare("delete from  item_desk where CONCAT(usr_id,'',line_id) = ?");
$stmt->execute(array($dlt1));
$retval = array( 'status_value' => 'Item deleted');
}
catch (PDOException $e) {
printf("Execution failed -  %s\n",$e->getMessage());
}

echo json_encode($retval);
$db = null;
?>