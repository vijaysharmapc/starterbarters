<?php
$mylist = trim($_POST['tmp']);
//echo $mylist;
$show = htmlentities("Upload a new item");
echo ('<a class = "mylst" style="color:black ;font-weight: bold" href="itemupload.php">' .$show . '<a/>');
//echo "from ajax";
?>