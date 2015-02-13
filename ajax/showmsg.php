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

$query = "select message_id,fromid,from_name,toid,to_name from message_list group by fromid,toid,from_name,to_name order by message_id";
//$query = $query . " where book_category.category_id = " . $searchcat . " group by book_category.category_name order by book_category.section_id";




try {
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount ==0){
printf ("sorry we did not find any matching categories");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit; 
}

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
$from = htmlentities($row['from_name']);
$frmid = htmlentities($row['fromid']);
$from = ucwords($from);
$toname = htmlentities($row['to_name']);
$msgid = htmlentities($row['message_id']);
printf('<div id ="inbox">');
printf('<table> <tr>');
printf("<td><a id='".$frmid."' class='msglst' href='showmsg.php' style='color:black'> $from  & You </a></td>");
printf('</tr>');
printf('</table></div>');
//echo "<br>";

$stmt = $db->prepare("update message_list set toseen=1,to_stamp=now() where toid=? and message_id=? and toseen=0");
$stmt->execute(array($uid,$msgid));
}}

catch (PDOException $e) {
printf ("WE had a problem: %s\n",$e->getMessage());
}







$db = null;
?>