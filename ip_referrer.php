<?php
/*
include'/var/www/outside_root/credits.php';
$refferer22='http://ec2-54-217-138-204.eu-west-1.compute.amazonaws.com/';
$refferer = $_SERVER['HTTP_REFERER'];
$refferer2 = strtok($refferer, '?');
$refferer3 = str_replace("/",  "",$refferer2);



if(isset($tx_token)&&!empty($tx_token)){

$table = 'referrer_failure';
$refferer = $_SERVER['HTTP_REFERER'];

$refferer2 = strtok($refferer, '?');

$ip=$_SERVER['REMOTE_ADDR'];
$currentFile = $_SERVER["PHP_SELF"];///do i need escaping ??
$currentFile = str_replace("/",  "",$currentFile);
$parts = Explode('/', $currentFile);

$page_url =$parts[count($parts) - 1];

	if(!($refferer2==$refferer22)){
 		$case='refferer';
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
$sq->bindValue(6, "password=$password", PDO::PARAM_STR);
$sq->bindValue(7, "$string", PDO::PARAM_STR);
$sq->bindValue(8, "currentFile=$currentFile", PDO::PARAM_STR);

$sq->execute();
$db = NULL ;
echo ("<script type='text/javascript'>");

echo ("window.location = '$refferer22';");
echo ("</script>");


$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "select ip from $table where ip =? and time >= now() - INTERVAL 3 HOUR";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$ip", PDO::PARAM_STR);
$sq->execute();
$db = NULL ;	
$count = $sq->rowCount();
if ($count>10){
$banned='yes';
}
$db = NULL ;
if ($banned=='yes'){
while(!$mail_to_me_sent== 'ok'){
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

 $to = 'a.biris@hotmail.com';//change

 $subject = "Πρόβλημα";
 $body = "Ip=$ip<br>table=$table<br>currentFile =$currentFile   ";

 if (mail($to, $subject, $body)) {
   $mail_to_me_sent= 'ok';
   }}
}}}
else{
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT receipt FROM pdtcheck WHERE receipt=?  ;";					//1
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$txn_id", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης .';
	$failed_ipn_1=1; //$failed_pdt_1=1; 
}
$count = $sq->rowCount();

if ($count>0){
$proceed_tx_referrer = 'ok';
//ALREADY EXIST
while ($r = $sq->fetch(PDO::FETCH_NUM)) {// no need to exist
$db = NULL ;
}
$db = NULL ;
}
else{

}
if (!$proceed_tx_referrer=='ok'){
$table = 'referrer_failure';
$refferer = $_SERVER['HTTP_REFERER'];

$refferer2 = strtok($refferer, '?');
$ip=$_SERVER['REMOTE_ADDR'];
$currentFile = $_SERVER["PHP_SELF"];///do i need escaping ??
$currentFile = str_replace("/05_03/",  "",$currentFile);
$parts = Explode('/', $currentFile);

$page_url =$parts[count($parts) - 1];

	if(!($refferer2==$refferer22   )){
 		$case='refferer';
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
$sq->bindValue(6, "password=$password", PDO::PARAM_STR);
$sq->bindValue(7, "$string", PDO::PARAM_STR);
$sq->bindValue(8, "currentFile=$currentFile", PDO::PARAM_STR);

$sq->execute();
$db = NULL ;
echo ("<script type='text/javascript'>");

echo ("window.location = '$refferer22';");
echo ("</script>");


$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "select ip from $table where ip =? and time >= now() - INTERVAL 3 HOUR";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$ip", PDO::PARAM_STR);
$sq->execute();
$db = NULL ;	
$count = $sq->rowCount();
if ($count>10){
$banned='yes';
}
$db = NULL ;
if ($banned=='yes'){
while(!$mail_to_me_sent== 'ok'){
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

 $to = 'a.biris@hotmail.com';//change

 $subject = "Πρόβλημα";
 $body = "Ip=$ip<br>table=$table<br>currentFile =$currentFile  ";

 if (mail($to, $subject, $body)) {
   $mail_to_me_sent= 'ok';
   }}}}
}

}
*/
?>