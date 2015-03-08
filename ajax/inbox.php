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
//full path of image
$img_name = $_SESSION['image_name'];

}

printf('<p id ="msglst">  Conversation between : </p>');
# open a database conn
require '../dbcon.php';
#build a query
$uid = addslashes($uid);
$query = "select message_id,fromid,from_name,toid,to_name from message_list where fromid <>'".$uid."' and fromid <>toid and toid = '".$uid."'  group by fromid,toid,from_name,to_name order by message_id";




try {
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount ==0){
printf ("sorry we did not find any matching data");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit; 
}

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
$from = htmlentities($row['from_name']);
$frmid = htmlentities($row['fromid']);
$from = ucwords($from);
$toname = htmlentities($row['to_name']);
$msgid = htmlentities($row['message_id']);
printf('<table> <tr>');
printf('<div id ="inbox" >');
printf('<td><form class="msglst" id="'.$frmid.'" action="showmsg.php" method="post">');
printf('<input type="hidden" name= "frmid"  value="'.$frmid.'"/>');
printf('<input type="hidden" name= "frnnme"  value="'.$from.'"/>');
printf('<input type="submit" name="submit" value="'.$from.' & You" /></td>');
printf('</form>');
printf('</div>');
printf('</tr>');


$stmt = $db->prepare("update message_list set toseen=1,to_stamp=now() where toid=? and message_id=? and toseen=0");
$stmt->execute(array($uid,$msgid));
}}

catch (PDOException $e) {
printf ("WE had a problem: %s\n",$e->getMessage());
}







$db = null;
?>