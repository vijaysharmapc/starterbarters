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

printf('<p> Conversation between : </p>');
# open a database conn
require '../dbcon.php';
#build a query

$query = "select fromid,from_name,toid,to_name from message_list group by fromid,toid,from_name,to_name order by message_id";
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
$toname = htmlentities($row['to_name']);

//if($catcnt > 0) {
//echo ('<tr><td><a id = "' . urlencode($sec_id) . '" class = "catlist" style="color:black ;font-weight: bold" href="category.php?bookid=' . urlencode($sec_id) . '">' .$show . '<a/><a style="color:#0020C2">&nbsp  has '.$catcnt.' items </a>');
//echo ('<tr><td><a id = "' . urlencode($sec_id) . '" class = "catlist" style="color:black ;font-weight: bold" href="" ;return false;>' .$show . '<a/><a style="color:#0020C2">&nbsp  has '.$catcnt.' items </a>');
//}else {
//echo ('<tr><td><a id = "' . urlencode($sec_id) . '" class = "catlist" style="color:black ;font-weight: bold" href="" ;return false;>' .$show . '<a/><a style="color:black">&nbsp  has '.$catcnt.' items </a>');
//}

printf("<a id='msglst' href='' style='color:black'> $from  & $toname </a>");
//echo(" ".urlencode($from)." and you");
//echo ('<tr><td><a id = "' . urlencode($from) . ' & You " class = "catlist" style="color:black ;font-weight: bold" href="" ;return false;></a><tr><td>');
echo "<br>";
}
}

catch (PDOException $e) {
printf ("WE had a problem: %s\n",$e->getMessage());
}


$db = null;
?>