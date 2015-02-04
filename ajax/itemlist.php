<?php
//$_POST['tmps'] =2;
if(isset($_POST['tmps']) == true){
$subcat = trim($_POST['tmps']);
settype($subcat, 'integer');
$subcat = addslashes($subcat);

# open a database conn
require '../dbcon.php';

$result = $db->prepare("select line_id,title,have,want,other,city,file_path from item_desk where section_id = ?");
$result->execute(array("$subcat"));
$linecount = $result->rowCount();
if ($linecount ==0){
$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' =>0);
echo json_encode($retval);
exit;
}
$i=0;
$data = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$data[$i]['line_id']=$row['line_id'];
$data[$i]['title']=$row['title'];
$data[$i]['have']=$row['have'];
$data[$i]['want']=$row['want'];
$data[$i]['other']=$row['other'];
$data[$i]['city']=$row['city'];
$data[$i]['file_path']=$row['file_path'];
$i++;
};


$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);
$db = null;
}
?>