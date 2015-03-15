<?php
//list of all sub categories


$to      = $emailv;
$subject = 'starterbarters.com verification';
$message = 'Your verification code is : ' .$rndmstr;
$headers = 'From: contact@starterbarters.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$emailv = addslashes($emailv);


# open a database conn
require '../dbcon.php';

$result = $db->prepare("select first_name,email,time_stamp from user_base    order by time_stamp,email");
$linecount = $result->rowCount();

if ($linecount == 0){
echo "email does not exist!!";
exit;
}


}
$db=null;
?>