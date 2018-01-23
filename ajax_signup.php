
<?php
//include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$mail=$_POST['mail'] ;
$mail = trim($mail);
$mail = preg_replace("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", " ", $mail);
if(isset($mail)&& !empty($mail)){

$refferer = $_SERVER['HTTP_REFERER'];
$refferer = preg_replace('/\\?.*/', '', $refferer);


$user_password=$_POST['password'] ;
$user_password = trim($user_password);
$user_password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $user_password);

$user_password = md5($salt.$user_password);

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

$xstring = 1;
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sq = $db->prepare("SELECT user FROM users WHERE user=?  AND status=?");
$sq->bindValue(1, "$mail", PDO::PARAM_STR);
$sq->bindValue(2, "YES", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';//change to gr
}
$count = $sq->rowCount();
if ($count>0){
$failed_mysql_1=1;
	$return['error'] = true;
	$return['msg'] = "Already a user";
$db = NULL ;
}
else
{
$xstring = 0;
}
$db = NULL ;
if($xstring == 0){

$string_exists = 0 ;
while($string_exists==0){//better to put it after
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
$sq = $db->prepare("INSERT INTO users VALUES(?,?,?,?,?,?,NOW(),?,?,?,NOW(),?)");
$sq->bindValue(1, "", PDO::PARAM_STR);
$sq->bindValue(2, "$ip", PDO::PARAM_STR);
$sq->bindValue(3, "$mail", PDO::PARAM_STR);
$sq->bindValue(4, "NO", PDO::PARAM_STR);
$sq->bindValue(5, "$user_password", PDO::PARAM_STR);
$sq->bindValue(6, "", PDO::PARAM_STR);
$sq->bindValue(7, "", PDO::PARAM_STR);
$sq->bindValue(8, "", PDO::PARAM_STR);
$sq->bindValue(9, "", PDO::PARAM_STR);
$sq->bindValue(10, "$string", PDO::PARAM_STR);
$sq->bindValue(11, "", PDO::PARAM_STR);
$sq->bindValue(12, "$string", PDO::PARAM_STR);
$sq->execute();
$db = NULL ;

$Name = "arisbiris.com"; //senders name 
$email = "arisbiris.com"; //senders e-mail adress 
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 

$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=utf8\r\n";
 $to = $mail;
 $link = "$refferer?verify_signup=$string";
 $subject = "Signup";
 $body = "Dear customer,
 Please click on the following link , $link , to verify your account . Τhe link will be active for 30 minutes. 
 If the link doesnt work please copy - paste it in a browser url";
 if (mail($to, $subject, $body, $header)) {
	$return['error'] = false;
	$return['msg'] = 'Dear customer, an email has been sent to the following address , ' . $_POST['mail'] . ' ,please follow the instructions included.';//change to msg
  } else {
  $failed_mysql_2=1;
	$return['error'] = true;
	$return['msg'] = 'Η αποστολή μηνύματος για ολοκλήρωση απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.';
  }}}
  //include"security.php";
echo json_encode($return);
?>