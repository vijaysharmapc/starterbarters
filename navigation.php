<!DOCTYPE html>
<html>
<head>
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
echo ("<div style = 'clear: right; float: right; text-align: right;font-weight: bold; padding:10px;'><br>");
//echo "<div style = 'clear: right; float: right; text-align: right;'> <br />";
echo "<A id='lgn' href='login.php' style='color:white'>Login</A><br>";
echo "<A id='lgn' href='register.php' style='color:white'>Register</A><br>";
echo "</div>";
//exit;
}
else{
$name = $_SESSION['name'];
echo ("<div style = 'clear: right; float: right; text-align: right;font-weight: bold; padding:10px;'><br>");
echo "<A id='lgn' href='logout.php' style='color:white' >Logout</A><br>";
echo "<A id='lgn' href='dashboard.php' style='color:white'>My Dashboard</A><br>";
echo "</div>";
}
?>
<!--
<div style = 'clear: right; float: right; text-align: right;font-weight: bold; padding:10px;'><br> 
<A id="lgn" href='login.php'>Login</A>&nbsp
<A id ="lgn" href='register.php'>Register</A>&nbsp&nbsp
</div>
<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
-->
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-01-10T10:17:42+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>

<div id="nav">
<br>
<a href= "/starterbarters/index.php">
<img class="fade" src="/starterbarters/images/home.jpg" height="40" width="50"> </a>
<br>

<a  style ="color:#E3CCCC"> Swap Categories </a>
<br>
<a id="Books" style="color:white" href="/starterbarters/category.php?catid=1" > Books </a>
<img class="point" id="1" src="/starterbarters/images/arrow.jpg" height="11" width="11">
<br>
<a id="DVD" style="color:white" href="/starterbarters/category.php?catid=2"> DVD & films </a>
<img class="point" id="2" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Sport" style="color:white" href="/starterbarters/category.php?catid=3"> Sports gear </a>
<img class="point" id="3" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Furn" style="color:white" href="/starterbarters/category.php?catid=4"> Furnitures</a>
<img class="point" id="4" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Elec" style="color:white" href="/starterbarters/category.php?catid=5">  Electronics </a> 
<img class="point" id="5" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Toys" style="color:white" href="/starterbarters/category.php?catid=6"> Toys & baby gear </a>
<img class="point" id="6" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Two" style="color:white" href="/starterbarters/category.php?catid=7">  Two wheelers! </a>
<img class="point" id="7" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Real" style="color:white" href="/starterbarters/category.php?catid=8">  Reality & property! </a>
<img class="point" id="8" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>
<a id="Cars" style="color:white" href="/starterbarters/category.php?catid=9">   Cars!! </a>
<img class="point" id="9" src="/starterbarters/images/arrow.jpg" height="10" width="10">
<br>

<a style="color:white" href="/starterbarters/contact.php"> Connect with us</a>

</div>

<div class="container">

<!--
end of thos div is in sheets


<section id="main">

</section>
-->
