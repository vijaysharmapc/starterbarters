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


# open a database conn
require '../dbcon.php';
#build a query


$query = "select count(*) as cnt from message_list where toid ='".$uid."' and toseen=0 ";
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
$cnt = htmlentities($row['cnt']);
//printf($cnt);
$retval = array( 'status_value' => 1,'status_text' => 'TRUE','total_count' => $cnt);
echo json_encode($retval);
}
}

catch (PDOException $e) {
printf ("WE had a problem: %s\n",$e->getMessage());
}


$db = null;
?>