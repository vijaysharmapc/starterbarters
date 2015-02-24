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
exit;
}
else{
$name = $_SESSION['name'];
$uid = $_SESSION['uid'];
$luid = $_SESSION["luid"] ;
$lid = $_SESSION["lid"];
$fldr_path = $_SESSION['image_name'];
$fldr_path = substr($fldr_path,0,17);
$file_path = $_SESSION["file_path"];
$file_path = substr($file_path,0,17);

//echo $file_path;
}
?>
</head>

<body>
<?php
//$cnt = rand(1,4);
//$target_dir = "uploads/";
$target_dir = $file_path;
//break to array and then pic last ext and rename
$temp = explode(".",$_FILES["fileToUpload"]["name"]);
//print_r($temp); 
$newfilename = $luid . '.' .end($temp);
//echo $newfilename;
$target_file = $target_dir . basename($newfilename);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //echo "<br>";
    //print_r($check);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    echo " Old file with same name will be replaced, ";
    $uploadOk = 1;
}
// Check file size 
if ($_FILES["fileToUpload"]["size"] > 9000000) {
    echo "Sorry, your file is too large.Please keep it below 8 MB in size.";
    echo $_FILES["fileToUpload"]["size"];
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";

//script to update image name and path in db
$img_nme = basename($newfilename);
$img_nme = $file_path.$img_nme;
$_SESSION['image_name_item'] = $img_nme;
//$img_nme = $target_dir ."".$img_nme;
//resize image
$scr = imagecreatefromjpeg($img_nme);
list($width,$height) = getimagesize($img_nme);
$newwidth = 200;
$newheight = ($height/$width)*$newwidth;
$tmp = imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($tmp,$scr,0,0,0,0,$newwidth,$newheight,$width,$height);
imagejpeg($tmp,"$img_nme",100);
imagedestroy($tmp);
//resize image
require 'dbcon.php';
$stmt = $db->prepare("update item_desk set file_path= ? where CONCAT(usr_id,'',line_id) = ?");
$stmt->execute(array("$img_nme","$luid"));


$url2 = "Location:edit.php?lid=".$lid."";
header($url2);
//window.location.reload(true);
    } else {
        echo "Sorry, there was an error uploading your file.";
        printf (error_get_last());

        }
}
$db=null;
?>
</body>
</html>