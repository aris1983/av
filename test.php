<?php

$refferer = $_SERVER['HTTP_REFERER'];
 echo("$refferer<br>");

$login_string=$_GET['login_string'] ;
 if(empty($login_string)){
 echo("empty<br>");
 }else{
echo("not empty<br>");
 $casemysql=$_POST['casemysql'] ;//need to put regreplace

$titlename=$_POST['titlename'] ;

$login_string = trim($login_string);
$casemysql = trim($casemysql);
$login_string = preg_replace("/[^a-zA-Z0-9\s]/", " ", $login_string);
$casemysql = preg_replace("/[^a-zA-Z0-9\s]/", " ", $casemysql);
$titlename = trim($titlename);
$titlename = preg_replace("/[^a-zA-Z0-9\s]/", " ", $titlename);

$db = new PDO("mysql:host=localhost;dbname=movies", "root", "",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT signupstring FROM users WHERE signupstring=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$login_string", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = "Σφάλμα σύνδεσης.";// wrong change it to there has been an error
}
$count = $sq->rowCount();
if ($count>0){
if($casemysql =="mymovies"){
	$return['error'] = false;
	$return['url'] = "paypal.php";
	$return['casemysql'] = "mymovies";
}
else{
	$return['error'] = false;
	$return['url'] = "paypal.php";
}
$db = NULL ;
}
else
{
$failed_mysql_1=1;//might be redundant
	$return['error'] = false;
	$return['url'] = "table2.php";

$db = NULL ;
}
include"security.php";





		if(!preg_match("/[^a-pA-P0-9\s]/", $login_string)){
		echo("error");
		}else{
		echo("ok");
		}
}
?>