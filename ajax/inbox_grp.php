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
$varg = $_SESSION['vargg'];
//full path of image
$img_name = $_SESSION['image_name'];

}

printf('<p id ="msglst">  Conversation between : </p>');


$frmid = $varg;
$from =  $name;
//printf('<table> <tr>');
printf('<div id ="inbox" >');

printf('<div id="chatarea3" class="DivToScroll DivWithScroll"> </div>');
//printf('</form>');
printf('</div><br>');
printf('<div id ="sendgrpm1" >');
printf('<input type="text" id="sendgrp" maxlength="35" required>');
printf('<button id="sendgrpm"  style="width:50px;height:30px">send</button>');
printf('</div>');
//printf('</tr>');



?>