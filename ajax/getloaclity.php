<?php
//list of all sub categories
//$_POST['cty']= "bengaluru";
if(isset($_POST['cty']) == true){
$city = trim($_POST['cty']);
$city = addslashes($city);

# open a database conn
require '../dbcon.php';

#build a query
$query = " select locality from item_desk  ";
$query = $query . " where city = '" . $city . "' group by locality order by locality desc";


try {
 $sth = $db->query($query);
 $catcount = $sth->rowCount(); #only on mysql
 if ($catcount ==0){
printf ("sorry no matching categories found !");
//printf ("<br> <a href=../index.php>Return to home page</a>");
exit; 
}
while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
$show = htmlentities($row['locality']);
$show = ucwords($show);
if($catcount > 0) {
//	<option value="bengaluru">Bengaluru</option>
echo ('<option>'.$show.'</option>');
echo "<br>";
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