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
}
?>
</head>

<body>
<?php
$target_dir = "uploads/";
//break to array and then pic last ext and rename
$temp = explode(".",$_FILES["fileToUpload"]["name"]);
//print_r($temp); 
$newfilename = $uid . '.' .end($temp);
//echo $newfilename;
$target_file = $target_dir . basename($newfilename);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    echo "<br>";
    print_r($check);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    echo "old file with same name will be replaced";
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
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
        
//script to update image name in db
$img_nme = basename($newfilename);
require 'dbcon.php';
$stmt = $db->prepare("update user_base set image_name= ? where CONCAT(user_name,'',user_id) = ?");
$stmt->execute(array("$img_nme","$uid"));
$url = "Location:dashboard.php";
header($url);
    } else {
        echo "Sorry, there was an error uploading your file.";
        printf (error_get_last());

        }
}
$db=null;
?>
</body>
</html>