<?php
//list of all sub categories


# open a database conn
require '../dbcon.php';

#build a query
$query = "SELECT usr_id FROM `item_desk` group by usr_id" ;
$query2 = "SELECT line_id FROM `item_desk` group by line_id" ;
 $sth = $db->query($query);
 $sth2 = $db->query($query2);
 $usrcnt = $sth->rowCount(); #only on mysql
 $itmcnt = $sth2->rowCount();
echo ('<a> '.$usrcnt. ':	active users </a>');
echo ('<a> '.$itmcnt. ':barter offers </a>');




$db = null;
?>