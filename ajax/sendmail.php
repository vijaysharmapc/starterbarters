<?php
//list of all sub categories
if(isset($_POST['emailv']) == true){
$emailv = trim($_POST['emailv']);
if (strpos($emailv,'@') == false) {
echo " invalid email!!";
exit;
}


function generateRandomString($length = 10) {
    return substr(str_shuffle("13780_+$&%abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0, $length);
}

$rndmstr = generateRandomString();
//echo $rndmstr;


$to      = $emailv;
$subject = 'starterbarters.com verification';
$message = 'Your verification code is : ' .$rndmstr;
$headers = 'From: contact@starterbarters.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$emailv = addslashes($emailv);

# open a database conn
require '../dbcon.php';

$result = $db->prepare("select email from user_base  where email = ?  group by email");
$result->execute(array($emailv));
$linecount = $result->rowCount();

if ($linecount == 0){
echo "email does not exist!!";
exit;
}

$stmt = $db->prepare("insert into verify_email values (?,?,?)");
$stmt->execute(array('',"$emailv","$rndmstr"));

echo ("mail sent: check verification code in your inbox");


}
$db=null;
?>