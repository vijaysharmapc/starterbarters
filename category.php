<!DOCTYPE html>
<html>
<head>
<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-02-03T23:08:33+0530" >
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
<?php
include_once("analyticstracking.php");
require 'navigation.php';
$categories =array(
1 => "Books,",
2 => "DVD & films,",
3  => "Sports gear,",
4  => "Furniture,",
5  => "Electronics",
6  => "Toys & baby gear, ",
7  => "Two wheelers,",
8  => "Reality & property,",
9  => "Cars,"
);


//get category id clicked
$catid = trim($_GET['catid']);
$catid = addslashes($catid);
settype($catid, 'integer');
printf ('<input id="cats" type="hidden" name="catid" value='.$catid.'>');
$var = $categories[$catid];

printf ('<h2 id="heading2"> exchange or swap the '.$var.'  you like!! </h2>')
?>



<section id="main">
<p id="catdata">

<div> results here </div>
</p>
</section>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>

</html>
