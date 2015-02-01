
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

if(isset($_POST['ttl']) == true){
$ttl = $_POST['ttl'];
$ttl = addslashes($ttl);
} else {exit;}
if(isset($_POST['ihv']) == true){
$ihv = $_POST['ihv'];
$ihv = addslashes($ihv);
}else {exit;};
if(isset($_POST['iwt']) == true){
$iwt = $_POST['iwt'];
$iwt = addslashes($iwt);
}else {exit;};
if(isset($_POST['opn']) == true){
$opn = $_POST['opn'];
$opn = addslashes($opn);
}else {exit;};
if(isset($_POST['cty']) == true){
$cty = $_POST['cty'];
$cty = addslashes($cty);
}else {exit;};


try{
$stmt = $db->prepare("update item_desk set title = ?,have = ?,want = ?,other = ?, city = ? where CONCAT(usr_id,'',line_id) = ?");
$stmt->execute(array($ttl,$ihv,$iwt,$opn,$cty,$luid));
$retval = array( 'status_value' => 'Information saved');
}
catch (PDOException $e) {
printf("Execution failed -  %s\n",$e->getMessage());
}

echo json_encode($retval);
$db = null;
?>