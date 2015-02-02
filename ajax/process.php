<?php
//list of all sub categories
if(isset($_POST['catid']) == true){
$searchcat = trim($_POST['catid']);
settype($searchcat, 'integer');
$searchcat = addslashes($searchcat);

# open a database conn
require '../dbcon.php';
#build a query
$query = " select book_category.category_name,count(item_desk.category_id) as catcnt from book_category left join item_desk ON book_category.section_id = item_desk.section_id ";
$query = $query . " where book_category.category_id = " . $searchcat . " group by book_category.category_name";
try {
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount ==0){
printf ("sorry we did not find any matching categories");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit; 
}
while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
$show = htmlentities($row['category_name']);
$catcnt = htmlentities($row['catcnt']);

//echo $show;
//echo "<br>";
if($catcnt > 0) {
echo ('<tr><td><a class = "catlist" style="color:black ;font-weight: bold" href="checkout.php?bookid=' . urlencode($show) . '">' .$show . '<a/><a style="color:#0020C2">  has '.$catcnt.' items </a>');
}else {
echo ('<tr><td><a class = "catlist" style="color:black ;font-weight: bold" href="checkout.php?bookid=' . urlencode($show) . '">' .$show . '<a/><a style="color:black">  has '.$catcnt.' items </a>');
}
//echo  ('&nbsp <div> has '.$catcnt.' items</div></td></tr>');

//echo  ('&nbsp has '.$catcnt.' items</td></tr>');
echo "<tr><td> </td></tr>";
echo "<br>";
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