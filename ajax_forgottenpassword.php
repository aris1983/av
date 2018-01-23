<?php
//include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$mail=$_POST['mail'] ;
$mail = trim($mail);
$mail = preg_replace("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", " ", $mail);
if(!empty($mail)&& isset($mail)){


$refferer = $_SERVER['HTTP_REFERER'];
$refferer = preg_replace('/\\?.*/', '', $refferer);

$xstring = 1;
function rndstring() {
$my_array = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$sec_string = '';
    for ($i=0; $i<=27; $i++)
    {
        // Generates the random number from the array
        $random = array_rand($my_array);
        // Add the char to parola...
        $sec_string .= $my_array[$random];
        // ...then unset the char from the array
        unset($my_array[$random]);  
    }
return $sec_string;
}
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT user FROM users WHERE user=?  AND status=?";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$mail", PDO::PARAM_STR);
$sq->bindValue(2, "YES", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = "Σφάλμα σύνδεσης.";
}
$count = $sq->rowCount();
if ($count>0){
$gosecond=1;
$db = NULL ;
}
else
{
$failed_mysql_1=1;
	$return['error'] = true;
	$return['msg'] = 'Μη εγγεγραμμένος χρήστης';
$db = NULL ;
}
if ($gosecond==1){
$string_exists = 0 ;
while($string_exists==0){
$string = rndstring() ;
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT signupstring FROM users WHERE signupstring=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$string", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = "Σφάλμα σύνδεσης.";
}
$count = $sq->rowCount();
if ($count>0){
$db = NULL ;
}
else
{
$string_exists = 1;
$db = NULL ;
}}

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "UPDATE users SET change_password=?, change_password_time=(NOW()) WHERE user=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$string", PDO::PARAM_STR);
$sq->bindValue(2, "$mail", PDO::PARAM_STR);
if (!$sq->execute()) {
$db = NULL ;
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';
}
$count = $sq->rowCount();
if ($count>0){

$Name = "arisbiris.com"; //senders name 
$email = "a.biris@hotmail.com"; //senders e-mail adress 
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 

$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=utf8\r\n";


 $to = $mail;
 $link = "$refferer?forgotten_password=$string";
 $subject = "Αλλαγή κωδικού";
 $body = "Forgotten password new issue";
 if (mail($to, $subject, $body, $header)) {
	$return['error'] = false;
	$return['msg'] = 'Ευχαρηστούμε, ένα μήνυμα έχει σταλεί στην ακόλουθη ηλεκτρονική διεύθυνση,' . $_POST['mail'] . ',παρακαλείστε να ακολουθήσετε την οδηγία που εσωκλείεται.';
  } else {
  $failed_mysql_2=1;
	$return['error'] = false;
	$return['msg'] = 'Ευχαρηστούμε, η αποστολή μηνύματος απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.';
  }
$db = NULL ;
}}}
$db = NULL ;
include"security.php";
echo json_encode($return);
?>