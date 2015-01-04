<?php

if(isset($_POST['catid']) == true){
$searchcat = trim($_POST['catid']);


# open a database conn
try{
$db = new PDO("mysql:host=localhost;dbname=starterbartersdb","root","pd79");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
printf("Unable to open database: %s\n",$e->getMessage());
}

#build a query
$query = " select * from book_category";
$query = $query . " where category_id = " . $searchcat . "";
try {
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount ==0){
printf ("sorry we did not find any matching categories");
printf ("<br> <a href=../index.php>Return to home page</a>");
exit; 
}
while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
$show = htmlentities($row['category_name']);
//echo $show;
//echo "<br>";
echo ('<a class = "catlist" style="color:black ;font-weight: bold" href="checkout.php?bookid=' . urlencode($show) . '">' .$show . '<a/>');
echo "<br>";
}
}

catch (PDOException $e) {
printf ("WE had a problem: %s\n",$e->getMessage());
}

}

?>