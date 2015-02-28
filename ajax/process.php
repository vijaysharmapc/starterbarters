<?php
//list of all sub categories
if(isset($_POST['catid']) == true){
$searchcat = trim($_POST['catid']);
settype($searchcat, 'integer');
$searchcat = addslashes($searchcat);

# open a database conn
require '../dbcon.php';

#build a query
$query = " select book_category.section_id,book_category.category_name,count(item_desk.category_id) as catcnt from book_category left join item_desk ON book_category.section_id = item_desk.section_id ";

if((isset($_POST['cty']) == true) && ($_POST['cty']!= '1')){
$ctysel = $_POST['cty'];
$ctysel = addslashes($ctysel);

$query = $query . " where book_category.category_id = " . $searchcat . " and item_desk.city = '".$ctysel."' group by book_category.category_name order by book_category.section_id";
} else {
$query = $query . " where book_category.category_id = " . $searchcat . " group by book_category.category_name order by book_category.section_id";
}

try {
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount ==0){
printf ("sorry no matching categories found !");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit; 
}
while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
$show = htmlentities($row['category_name']);
$catcnt = htmlentities($row['catcnt']);
$sec_id = htmlentities($row['section_id']);

if($catcnt > 0) {
//echo ('<tr><td><a id = "' . urlencode($sec_id) . '" class = "catlist" style="color:black ;font-weight: bold" href="category.php?bookid=' . urlencode($sec_id) . '">' .$show . '<a/><a style="color:#0020C2">&nbsp  has '.$catcnt.' items </a>');
echo ('<tr><td><a id = "' . urlencode($sec_id) . '" class = "catlist" style="color:black ;font-weight: bold" href="" ;return false;>' .$show . '<a/><a style="color:#0020C2">&nbsp  has '.$catcnt.' items </a>');
echo "<br>";
}else {
//echo ('<tr><td><a id = "' . urlencode($sec_id) . '" class = "catlist" style="color:black ;font-weight: bold" href="" ;return false;>' .$show . '<a/><a style="color:black">&nbsp  has '.$catcnt.' items </a>');
}
}
}

catch (PDOException $e) {
printf ("WE had a problem: %s\n",$e->getMessage());
}
}
//my profile data


//my profile data


$db = null;
?>