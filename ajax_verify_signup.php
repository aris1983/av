<?php
//include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$verify_signup=$_POST['verify_signup'] ;
$verify_signup = trim($verify_signup);
//$verify_signup = preg_replace("/[^a-zA-Z0-9\s]/", " ", $verify_signup);
if(!empty($verify_signup)&& isset($verify_signup)){

function rndstring() {
$my_array = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$sec_string = '';
$one = 0;
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
$mysql = "SELECT user FROM users WHERE verify_signup=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$verify_signup", PDO::PARAM_STR);
$sq->bindValue(3, "NO", PDO::PARAM_STR);//need to put
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';//change
}
$count = $sq->rowCount();
if ($count>0){
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$user =  $r[0];
$one = 1;
$db = NULL ;
}}
else
{
$failed_mysql_1=1;

$db = NULL ;
}
$db = NULL ;
if ($one == 1){

$string_exists = 0 ;
while($string_exists==0){
$string2 = rndstring() ;
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT signupstring FROM users WHERE signupstring=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$string2", PDO::PARAM_STR);//change it to string
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';//change
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
$mysql = "SELECT user FROM users WHERE verify_signup=? AND status=? AND verify_signup_time  BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW()";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$verify_signup", PDO::PARAM_STR);
$sq->bindValue(3, "NO", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.'.$verify_signup.$string2;//change
}
$count = $sq->rowCount();
if ($count>0){
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$user =  $r[0];
$two = 1;
$db = NULL ;
}}
else
{
$failed_mysql_2=1;
		$return['error'] = true;
	$return['msg'] = 'You are not a signed up user, or, your time token has expired, please retry.';
$db = NULL ;
}

if ($two == 1){
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sq = $db->prepare("UPDATE users SET status=?, signupstring=? , time=(NOW()),verify_signup=? WHERE user=? ");
$sq->bindValue(1, "YES", PDO::PARAM_STR);
$sq->bindValue(2, "$string2", PDO::PARAM_STR);
$sq->bindValue(3, "", PDO::PARAM_STR);
$sq->bindValue(4, "$user", PDO::PARAM_STR);
$sq->execute();
$db = NULL ;
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης.';//change
}
else{
	$return['error'] = false;
	$return['msg'] = "Thank you $user.  ";
		$return['login_string'] = "$string2";
}}}}
//include"security.php";
echo json_encode($return);
?>