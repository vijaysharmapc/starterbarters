<?php
session_start();


session_destroy();
unset($_SESSION["loggedin"]);
unset($_SESSION["name"]);
unset($_SESSION['uid']);
unset($_SESSION['image_name']);
unset($_SESSION['luid']);
header("Location:index.php");
?>
