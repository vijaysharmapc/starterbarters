<?php

if(!isset($_SESSION['loggedin'])) 
    {
        session_start(); 
    }
//session_start();
if(empty($_SESSION['loggedin']))
//if(!$_SESSION['loggedin'])
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

$result = $db->prepare("select user_base.first_name,last_name,user_base.email,phone,country,state,city,postal_code from registration_desk inner join  user_base  on user_base.email = registration_desk.email where CONCAT(user_base.user_name,'',user_base.user_id) = ?");
//$stmt->execute(array("$uid",“%$searchauthor”));
$result->execute(array("$uid"));
$linecount = $result->rowCount();
if ($linecount ==0){
printf ("sorry we did not find any matching categories");
printf ("<br> <a href='index.php'>Return to home page</a>");
exit;
}
if ($linecount ==1){
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$myfname = htmlentities($row['first_name']);
$mylname = htmlentities($row['last_name']);
$email = htmlentities($row['email']);
$phone = htmlentities($row['phone']);
$country = htmlentities($row['country']);
$state = htmlentities($row['state']);
$city = htmlentities($row['city']);
$pin = htmlentities($row['postal_code']);
printf('<p> First Name  :'.ucwords($myfname).'</p>');
printf('<p> Last Name   :'.$mylname.'</p>');
printf('<p> Email id    :'.$email.'</p>');
printf('<p> Contact num :'.$phone.'</p>');
printf('<p> Country     :'.$country.'</p>');
printf('<p> State       :'.$state.'</p>');
printf('<p> City        :'.$city.'</p>');
printf('<p> Postal code :'.$pin.'</p><br>');
printf('<a  href="contact.php" style="color:darkblue">Mail us to deactivate or Edit</a>');
//printf('<a  href="editprofile.php" style="color:darkblue">Mail us to deactivate</a>');
//printf('&nbsp&nbsp&nbsp&nbsp<a  href="deleteprofile.php" style="color:darkblue">Delete profile</a>');
}
}




$db = null;
?>