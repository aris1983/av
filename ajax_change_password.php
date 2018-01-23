<?php
//include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$forgotten_password=$_POST['forgotten_password'] ;
$forgotten_password = trim($forgotten_password);
$forgotten_password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $forgotten_password);
if(isset($forgotten_password)&&!empty($forgotten_password)){

$one==0;
  $failed_mysql_1=0;
    $failed_mysql_2=0;

$string_exists = 0;
$refferer = $_SERVER['HTTP_REFERER'];
$refferer = preg_replace('/\\?.*/', '', $refferer);

$password=$_POST['password'] ;//pr
$password = trim($password);
$password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $password);
$salt = "aB1cD2eF3G";
$password = md5($salt.$password);
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
$mysql = "SELECT user FROM users WHERE change_password=? ";// if it is empty it returns something
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$forgotten_password", PDO::PARAM_STR);

if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';
}
$count = $sq->rowCount();
if($count > 0){
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$mail = $r[0];
$db = NULL ;
$one=1;
}}
else
{
  $failed_mysql_1=1;
  	$return['error'] = true;
	$return['msg'] = 'location';
$db = NULL ;

}
if($one==1){
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
	$return['msg'] = 'Σφάλμα σύνδεσης.';
}
$count = $sq->rowCount();
if ($count>0){
$db = NULL ;
}
else
{
$string_exists = 1;// should be used as a barrier
$db = NULL ;
}}

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT user FROM users WHERE change_password=?  AND status=? AND change_password_time  BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW()";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$forgotten_password", PDO::PARAM_STR);
$sq->bindValue(2, "YES", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';
}
$count = $sq->rowCount();
if($count > 0){
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$mail = $r[0];
$db = NULL ;
$two=1;//change to two and put further down as barrier
}}
else
{
  $failed_mysql_2=1;
  	$return['error'] = true;
	$return['msg'] = "Δώσατε λάθος στοιχεία,ή, ο χρόνος εγγραφής έληξε, σας παρακαλούμε ξαναπροσπαθήστε την διαδικασία απο την αρχή.";
$db = NULL ;
}

if($two==1){
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "UPDATE users SET password=?,signupstring=?, change_password='',time=(NOW()) WHERE user=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$password", PDO::PARAM_STR);
$sq->bindValue(2, "$string", PDO::PARAM_STR);
$sq->bindValue(3, "$mail", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';
}
$count = $sq->rowCount();
if ($count>0){

$Name = "Audiovisual"; //senders name 
$email = "email@adress.com"; //senders e-mail adress 
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 


$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=utf8\r\n";
 $to = $mail;
 $link = "$refferer?&user=$to&login=$login";
 $subject = "Επιτυχής αλλαγή κωδικού";
 $body = "Αγαπητέ πελάτη,
Αλλάξατε με επιτυχία τον κωδικό σας, ευχαριστούμε";
 if (mail($to, $subject, $body, $header)) {
	$return['error'] = false;
	$return['msg'] = "Ευχαριστούμε,αλλάξατε με επιτυχία τον κωδικό σας, ένα μήνυμα σας έχει σταλεί για επιβεβαίωση.";
		$return['login_string'] = "$string";
  } else {
    $failed_mysql_3=1;
	$return['error'] = true;
	$return['msg'] = 'Ευχαριστούμε,αλλάξατε με επιτυχία τον κωδικό σας, αλλά το μήνυμα για επιβεβαίωση απέτυχε.';
		$return['login_string'] = "$string";
  }
$db = NULL ;
}}}}
include"security.php";
echo json_encode($return);
?>