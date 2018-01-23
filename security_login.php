<?php
include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$table = 'security_login';
//need to include security itself and also my movies
$refferer = $_SERVER['HTTP_REFERER'];
$ua=getBrowser();
$browser =  $ua['name'];
$platform =$ua['platform'];
 
//$ip=$_SERVER['REMOTE_ADDR'];//If at php.ini if register_global is set to Off 
$ip3=@$REMOTE_ADDR; //If at php.ini if register_global is set to On
$ip=$_SERVER['REMOTE_ADDR'];
$currentFile = $_SERVER["PHP_SELF"];///do i need escaping ??
$currentFile = str_replace("/",  "",$currentFile);
$parts = Explode('/', $currentFile);

$page_url =$parts[count($parts) - 1];
$ip2 = preg_replace("/[^.0-9\s]/", " ", $ip2);
$increment = preg_replace("/[^a-zA-Z0-9.\s]/", " ", $increment);
$mail = preg_replace("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", " ", $mail);
$password= preg_replace("/[^a-zA-Z0-9\s]/", " ", $password);
$string = preg_replace("/[^a-zA-Z0-9\s]/", " ", $string);

if (function_exists('secutiy_pdo_login')){
}
else{
function secutiy_pdo_login($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password){
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "INSERT INTO $table VALUES(?,?,?,?,?,?,?,NOW(),?) ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "", PDO::PARAM_STR);
$sq->bindValue(2, "$ip", PDO::PARAM_STR);
$sq->bindValue(3, "$case", PDO::PARAM_STR);
$sq->bindValue(4, "$platform", PDO::PARAM_STR);
$sq->bindValue(5, "$refferer", PDO::PARAM_STR);
$sq->bindValue(6, "$password", PDO::PARAM_STR);
$sq->bindValue(7, "$string", PDO::PARAM_STR);
$sq->bindValue(8, "$currentFile", PDO::PARAM_STR);

$sq->execute();//at id increment 93000 stops vgazi PHP Fatal error:  Uncaught exception 'PDOException' with message 'SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '94205' for key 1
$db = NULL ;
}}

switch ($currentFile)//put get and post in modsecurity
{

case "ajax_login3.php":
	
		if(preg_match("/[^a-pA-P0-9\s]/", $login_string)){
		$case='login_string';
		secutiy_pdo($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//$casemysql
		if(preg_match("/[^a-zA-Z0-9\s]/", $casemysql)){
		$case='casemysql';
		secutiy_pdo($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//$titlename
		if(preg_match("/[^a-zA-Z0-9\s]/", $titlename)){
		$case='titlename';
		secutiy_pdo($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}		
		
		if($failed_mysql_1_login==1){//might be redundant
		$case='failed_mysql_1_login=SELECT signupstring,time FROM users WHERE signupstring=? (else)';
		secutiy_pdo($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		if($failed_mysql_6_login==1){//might be redundant
		$case='failed_mysql_6_login=!time=ok';
		secutiy_pdo($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		if($failed_mysql_7_login==1){//might be redundant
		$case='failed_mysql_7_login= !time=ok empty(login_string)';
		secutiy_pdo($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}


break;
default:

break;
}

?>