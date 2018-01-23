<?php
include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$login_string=$_POST['login_string'] ;
$login_string = trim($login_string);
$login_string = preg_replace("/[^a-zA-Z0-9\s]/", " ", $login_string);

 if(isset($login_string)&& !empty($login_string)){
 
$casemysql=$_POST['casemysql'] ;//need to put regreplace

$titlename=$_POST['titlename'] ;


$casemysql = trim($casemysql);
$casemysql = preg_replace("/[^a-zA-Z0-9\s]/", " ", $casemysql);
$titlename = trim($titlename);
$titlename = preg_replace("/[^a-zA-Z0-9\s]/", " ", $titlename);

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
$mysql = "SELECT signupstring,time,user FROM users WHERE signupstring=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$login_string", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = "Σφάλμα σύνδεσης.";// wrong change it to there has been an error
}
$count = $sq->rowCount();
if ($count>0){
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$user_mail = $r[2];
}
$time=   'ok';
$db = NULL ;
}//need to put barier in start not equal to case mysql
else
{
  $failed_mysql_1_login=1;
	$return['error'] = false;
	$return['url'] = "table2.php";

$db = NULL ;
}
if ($time=='ok'){
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",  
array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT signupstring,time,user FROM users WHERE signupstring=? and time >= now() - INTERVAL 30 MINUTE";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$login_string", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = "Σφάλμα σύνδεσης.";// wrong change it to there has been an error
}
$count = $sq->rowCount();
if ($count>0){//put update signstring and log it and echo it
// do nothing
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$user_mail = $r[2];
}
}
else{
//put update signstring and log it and echo it
$update='ok';
}

if ($update=='ok'){

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
$mysql = "UPDATE users SET signupstring=? , time=(NOW())  WHERE signupstring=? ";//NEED TO PUT AFTER INSERT INTO NEW LOGIN STRING
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$string", PDO::PARAM_STR);
$sq->bindValue(2, "$login_string", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = "Σφάλμα σύνδεσης.";// wrong change it to there has been an error
}
else{
$insert_to_new_login_string= 'ok';
if($casemysql =="mymovies"){
	$return['error'] = false;
	$return['url'] = "paypal.php";
	$return['casemysql'] = "mymovies";
	$return['update_string'] = "yes";
    $return['login_string'] = "$string";
    $ajax_new_login_2_login=1;
}
else{
	$return['error'] = false;
	$return['url'] = "paypal.php";
	$return['update_string'] = "yes";
    $return['login_string'] = "$string";
    $ajax_new_login_3_login=1;
}}}
else{// start if (!$update=='ok'){
if($casemysql =="mymovies"){
	$return['error'] = false;
	$return['url'] = "paypal.php";
	$return['casemysql'] = "mymovies";
    $ajax_new_login_4_login=1;
}
else{
	$return['error'] = false;
	$return['url'] = "paypal.php";
    $ajax_new_login_5_login=1;
}}
}}else{//if(isset($login_string)){ - end of 1st hence from here it goes whether the case
 
  if(isset($login_string)&& !empty($login_string)){
    $failed_mysql_7_login=1;
}
	$return['error'] = false;
	$return['url'] = "table2.php";
}

if($insert_to_new_login_string == 'ok'){
$refferer = $_SERVER['HTTP_REFERER'];
$refferer2 = strtok($refferer, '?');
$ip=$_SERVER['REMOTE_ADDR'];
$currentFile = $_SERVER["PHP_SELF"];///do i need escaping ??
$currentFile = str_replace("/05_03/",  "",$currentFile);
$parts = Explode('/', $currentFile);
$page_url =$parts[count($parts) - 1];
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "INSERT INTO new_login_string VALUES(?,?,?,?,?,?,?,NOW(),?) ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "", PDO::PARAM_STR);
$sq->bindValue(2, "$ip", PDO::PARAM_STR);
$sq->bindValue(3, "$case", PDO::PARAM_STR);
$sq->bindValue(4, "$platform", PDO::PARAM_STR);
$sq->bindValue(5, "$refferer", PDO::PARAM_STR);
$sq->bindValue(6, "$password", PDO::PARAM_STR);
$sq->bindValue(7, "$string", PDO::PARAM_STR);
$sq->bindValue(8, "$currentFile", PDO::PARAM_STR);
$sq->execute();
}
include"security.php";
include"security_login.php";
echo json_encode($return);
?>