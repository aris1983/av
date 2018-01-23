<?php
require_once'/var/www/outside_root/credits.php';

//require_once'ip_referrer.php';

$mail=$_POST['mail'] ;
$password=$_POST['password'] ;
$mail = trim($mail);
$password = trim($password);
$mail = preg_replace("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", " ", $mail);
$password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $password);
if(!empty($mail)&& !empty($password)){

$login_string=$_POST['login_string'] ;
$casemysql=$_POST['casemysql'] ;
$login_string = trim($login_string);
$casemysql = trim($casemysql);
$login_string = preg_replace("/[^a-zA-Z0-9\s]/", " ", $login_string);
$casemysql = preg_replace("/[^a-zA-Z0-9\s]/", " ", $casemysql);
$password = md5($salt.$password);
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
$mysql = "SELECT user FROM users WHERE user=? AND password=? AND status=?";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$mail", PDO::PARAM_STR);
$sq->bindValue(2, "$password", PDO::PARAM_STR);
$sq->bindValue(3, "YES", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = "Σφάλμα σύνδεσης.";
}
$count = $sq->rowCount();
if (!$count>0){
	$return['error'] = true;
	$return['msg'] = "Wrong credidentials.";
$failed_mysql_1=1;
$db = NULL ;
}
else
{
$one = 1;  // start of sucessful login CONSIDER CHANGING name\
$db = NULL ;
}
$db = NULL ;
if ($one == 1){

$string_exists = 0 ;
while($string_exists==0){ // find a sttring that doesnt exist to start signin process but is not efficient since the user might provide wrong credidentials
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
$sq = $db->prepare("UPDATE users SET  signupstring=? , time=(NOW()) WHERE user=? ");
$sq->bindValue(1, "$string", PDO::PARAM_STR);
$sq->bindValue(2, "$mail", PDO::PARAM_STR);
if (!$sq->execute()) {
	echo "Σφάλμα σύνδεσης.";// wrong change it to there has been an error
}
else
{
$ajax_new_login=1;
}
}
$db = NULL ;
if ($one==1){
if (isset($url,$movie)) {
if($casemysql =="mymovies"){
	$return['error'] = false;
	$return['url'] = "paypal.php";
	$return['casemysql'] = "mymovies";
	$return['login_string'] = "$string";

}
else{
	$return['error'] = false;
	$return['msg'] = "Users credidential ok. Please wait.. if it fails  to load please retry.";
	$return['login_string'] = "$string";
}}
else{
if($casemysql =="mymovies"){
	/*
	$return['error'] = false;
	$return['url'] = "paypal.php";
	$return['casemysql'] = "mymovies";
	$return['login_string'] = "$string";
*/
	$return['error'] = false;
	$return['msg'] = "Users credidential ok. Please wait..  if it fails  to load please retry.";
	$return['login_string'] = "$string";
}
else{
	$return['error'] = false;
	$return['msg'] = "Users credidential ok. Please wait..  if it fails  to load please retry.";
	$return['login_string'] = "$string";
}}}}

//include"security.php";


echo json_encode($return);


?>