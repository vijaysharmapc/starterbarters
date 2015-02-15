<?php
//list of all sub categories

if(isset($_POST['eid']) == true){
$emailid = trim($_POST['eid']);
$emailid = addslashes($emailid);

# open a database conn
require '../dbcon.php';
#build a query
$query = "select email from registration_desk ";
$query = $query . " where email = '" . $emailid . "' group by email";
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount > 0){
echo('1');
//printf ("<br> <a href=../index.php>Return to home page</a>");
//exit; 
}
}

//my profile data


//my profile data


$db = null;
?>