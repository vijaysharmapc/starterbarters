<?php
//list of all sub categories
//$_POST['catid'] ="vijay";
if(isset($_POST['catid']) == true){
$searchcat = trim($_POST['catid']);
$searchcat = addslashes($searchcat);

# open a database conn
require '../dbcon.php';

#build a query
$query = " select group_name  from groups where group_name ='".$searchcat ."'";
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount !==0){
printf (22); 
}else {printf ('1');}

}
//my profile data


//my profile data


$db = null;
?>