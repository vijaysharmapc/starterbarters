
<?php
ob_start();
if(!isset($_SESSION['loggedin'])) 
    {
       session_start(); 
    }
if(empty($_SESSION['loggedin']))
//if(!$_SESSION['loggedin'])
{

echo ("<div style = 'clear: right; float: right; text-align: right;font-weight: bold; padding:10px;'><br>");
printf('<table id ="navt"><tr><td>');
echo "<a id='lgn' href='login.php' style='color:white'>Login</a><br>";
printf('</td></tr>');
printf('<tr><td>');
echo "<a id='lgn' href='register.php' style='color:white'>Register</a><br>";
printf('</td></tr>');
printf('</table>');
echo "</div>";
//exit;
}
else{
$name = $_SESSION['name'];
echo ("<div style = 'clear: right; float: right; text-align: right;font-weight: bold; padding:10px;'><br>");
printf('<table id ="navt"><tr><td>');
echo "<a id='lgn' href='logout.php' style='color:white' >Logout</a><br>";
printf('</td></tr>');
printf('<tr><td>');
echo "<a id='lgnd' href='dashboard.php' style='color:white'>My Dashboard</a><br>";
printf('</td></tr>');
printf('</table>');
echo "</div>";
}
?>

<div id="nav">
<br>
<a href="/starterbarters/index.php">
<img class="fade" src="/starterbarters/images/home.jpg" height="40" width="50" style="border-style:none;"> </a>

<a  style ="color:#E3CCCC"> swap categories </a>
<br>
<a id="Books" style="color:white" href="/starterbarters/category.php?catid=1" >swap books </a>
<img class="hidden" id="1" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="DVD" style="color:white" href="/starterbarters/category.php?catid=2"> swap DVD & films </a>
<img class="hidden" id="2" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Sport" style="color:white" href="/starterbarters/category.php?catid=3"> swap sports gear </a>
<img class="hidden" id="3" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Furn" style="color:white" href="/starterbarters/category.php?catid=4"> swap furnitures</a>
<img class="hidden" id="4" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Elec" style="color:white" href="/starterbarters/category.php?catid=5"> swap electronics </a> 
<img class="hidden" id="5" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Toys" style="color:white" href="/starterbarters/category.php?catid=6"> swap toys,kids gear </a>
<img class="hidden" id="6" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Two" style="color:white" href="/starterbarters/category.php?catid=7">  swap two wheelers </a>
<img class="hidden" id="7" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Cars" style="color:white" href="/starterbarters/help.php?catid=9">   Help </a>
<img class="hidden" id="8" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Real" style="color:white" href="/starterbarters/aboutus.php">  About us </a>
<img class="hidden" id="" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a style="color:white" href="/starterbarters/contact.php"> Contact us</a>
<div id="scnt">
<br>
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-annotation="bubble" data-width="200" data-href="https://plus.google.com/u/0/105952480612761411165"></div>
</div>
<div class="fb-like" data-href="https://www.facebook.com/pages/starterbarterscom/411186932371710" data-width="20" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
<br><br>
<div id="counta">
</div>

</div>

<div class="container">
