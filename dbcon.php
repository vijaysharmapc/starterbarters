<?php
try{
$db = new PDO("mysql:host=localhost;dbname=starterbartersdb","root","pd79");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
printf("Unable to open database: %s\n",$e->getMessage());
}
?>
