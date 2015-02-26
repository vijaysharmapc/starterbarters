<?php
$_POST['tmps']=1;
if(isset($_POST['tmps']) == true){
# open a database conn
require '../dbcon.php';

$result = $db->prepare("SELECT line_id, title, file_path FROM item_desk ORDER BY line_id LIMIT 6");
$result->execute();
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
$data[$i]['file_path']=$row['file_path'];
$i++;
};


$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);
$db = null;
}
?>