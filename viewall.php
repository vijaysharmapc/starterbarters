<!DOCTYPE html>
<html>
<head>
<title>Barter Network </title>
<link rel="stylesheet" href="/starterbarters/page.css"/>
<meta name="generator" content="Bluefish 2.2.5" >
<meta name="author" content="pd78" >
<meta name="date" content="2015-02-28T16:59:57+0530" >
<meta name="copyright" content="">
<meta name="keywords" content="swap,exchange,barter,starter,barters">
<meta name="description" content="start,barter,swap,exchange">
<meta name="ROBOTS" content="INDEX, FOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<?php
require 'navigation.php';

//get category id clicked
$catid = trim($_GET['list']);
$catid = addslashes($catid);
settype($catid, 'integer');
printf ('<input id="catsall" type="hidden" name="catidall" value='.$catid.'>');

?>
<div class="head">
<h2 id="heading2" id="allhead">Listing uploaded swap / barter offers -  All categories</h2>
</div>
<div id="main">
<div id="placefilter">
<label><font color="Brown">Filter by location: </font></label>
<select name="filter" id="filter2" title="Location filter">
  <option value="1">All</option>
  <option value="bengaluru">Bengaluru</option>
  <option value="ahmedabad">Ahmedabad</option>
  <option value="chennai">Chennai</option>
  <option value="delhi">Delhi</option>
  <option value="hyderabad">Hyderabad</option>
  <option value="jaipur">Jaipur</option>
  <option value="kolkata">Kolkata</option>
  <option value="mumbai">Mumbai</option>
  <option value="pune">Pune</option>
</select>
</div>
<br>



<div id="allv" class="catlist" >
All
</div>

<div id="sbooks" class="catlist" >
swap book
</div>
<div id="sdvd" class="catlist">
swap dvd 
</div>
<div id="ssports" class="catlist">
swap sport gear 
</div>
<div id="sfurni" class="catlist">
swap furniture 
</div>
<div id="selec" class="catlist">
swap electronics
</div>
<div id="stoys" class="catlist">
swap toy
</div>
<div id="stwow" class="catlist">
swap two wheeler
</div>

<div  id="vall2" class="DivToScroll2 DivWithScroll2" >

</div>

</div>




</div>

<script type="text/javascript" src="/starterbarters/js/jquery-2.1.1.min.js"> </script>
<script type="text/javascript" src="/starterbarters/js/index.js"> </script>
</body>


</html>
