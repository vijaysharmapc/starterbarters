<?php


if(isset($_POST['tmps']) == true){
$catid = ($_POST['tmps']);
settype($catid, 'integer');
$catid = addslashes($catid);

# open a database conn
require '../dbcon.php';
if(($_POST['cty']!= '1')){
$ctysel = $_POST['cty'];
$ctysel = addslashes($ctysel);
if ($catid == 0){
$result = $db->prepare("SELECT line_id, title, file_path FROM item_desk where city = ? ORDER BY line_id DESC");
$result->execute(array($ctysel));
} else {
$result = $db->prepare("SELECT line_id, title, file_path FROM item_desk WHERE category_id =? and city =? ORDER BY line_id DESC");
$result->execute(array($catid,$ctysel));
}
}else {
if ($catid == 0){
$result = $db->prepare("SELECT line_id, title, file_path FROM item_desk ORDER BY line_id DESC");
$result->execute();
} else {
$result = $db->prepare("SELECT line_id, title, file_path FROM item_desk WHERE category_id =? ORDER BY line_id DESC");
$result->execute(array($catid));
}
}

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
$data[$i]['title']= trim($row['title']);
$data[$i]['file_path']=$row['file_path'];
$i++;
};


$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => count($data), 'data' => $data);
echo json_encode($retval);
$db = null;
}
?>