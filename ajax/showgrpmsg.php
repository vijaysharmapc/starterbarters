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
if(isset($_SESSION['vargg'])){
$varg = $_SESSION['vargg'];
}

//full path of image
$img_name = $_SESSION['image_name'];

}
?>


<?php
//list of all sub categories
//$_POST['grpcht'] ='newcab5+vijay';

$varg = $varg.'+'.$name;
$grpcode = $varg;
$searchcat = trim($grpcode);
$searchcat = addslashes($searchcat);
$name = explode("+",$searchcat);
//echo $searchcat;
$frmid = $name[0];
$frmnme = $name[1];

# open a database conn
require '../dbcon.php';

#build a query
$result = $db->prepare('select from_name,fromid,message  from message_list2 where fromid=? and toseen=5');
$result->execute(array($frmid));

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$frmnme = htmlentities($row['from_name']);
$frmid = htmlentities($row['fromid']);
$message = htmlentities($row['message']);
printf('<p>'.$frmnme.' : '.$message.'</p>');
}

//my profile data


//my profile data


$db = null;
?>