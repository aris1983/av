<?php
include'/var/www/outside_root/credits.php';
include'/var/www/outside_root/paypal.php';


// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
$my_t=getdate(date("U"));
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}
if(isset($value)&&!empty($value)){
$my_t=getdate(date("U"));
// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
// assign posted variables to local variables
include 'ipn_post.php';															
if (!$fp) {
// HTTP ERROR
} else {
fputs ($fp, $header . $req);
$res = '';
$headerdone = false;
while (!feof($fp)) {
$line = fgets ($fp, 1024);
if (strcmp($line, "\r\n") == 0) {
// read the header

$headerdone = true;
}
else if ($headerdone)
{
// header has been read. now read the contents
$res .= $line;
$lines = explode("\n", $res);
$keyarray = array();
}

if (strcmp ($res, "VERIFIED") == 0) {

for ($i=1; $i<count($lines);$i++){
list($key,$val) = explode("=", $lines[$i]);
$keyarray[urldecode($key)] = urldecode($val);
}
// check the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email
// check that payment_amount/payment_currency are correct
// process payment
$db = NULL ;

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
$failed_ipn_2=1; //$failed_pdt_1=1; 
//ALREADY EXIST
while ($r = $sq->fetch(PDO::FETCH_NUM)) {// no need to exist
$db = NULL ;
}
$db = NULL ;
}
else{
$insert_paid = 1;
}
if ($insert_paid == 1){
$option_selection2=rawurldecode($option_selection2);
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sq = $db->prepare("INSERT INTO pdtcheck VALUES( ?,?,?,(NOW()),?,?,?,?) ");				//2
$sq->bindValue(1, "$option_selection2", PDO::PARAM_STR);
$sq->bindValue(2, "$id", PDO::PARAM_STR);
$sq->bindValue(3, "$hoursrented", PDO::PARAM_STR);
$sq->bindValue(4, "$txn_id", PDO::PARAM_STR);
$sq->bindValue(5 ,"$login", PDO::PARAM_STR);
$sq->bindValue(6, "NO", PDO::PARAM_STR);
$sq->bindValue(7, "YES", PDO::PARAM_STR);
$sq->execute();
$db = NULL ;
}
if (!$sq->execute()) { // be carefull might dublicate
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης .';
	$failed_ipn_3=1; //$failed_pdt_1=1; 
}
include 'paidipn.php';				//3
}  

 if (strcmp ($res, "INVALID") == 0) {
// log for manual investigation
include 'logpaidipn.php';														//4
}}
fclose ($fp);
}

$mailpdt = 'YES';
$mailipn = 'YES';
$proceed = 0;

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT receipt_id FROM paidmail WHERE receipt_id=?;";					//5
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$txn_id", PDO::PARAM_STR);
if (!$sq->execute()) {
echo "Error!";
	$failed_ipn_6=1; //$failed_pdt_1=1; 

}
$count = $sq->rowCount();
if (!$count>0){
}
else
{
$proceed = 1;
}
$db = NULL ;

if ($proceed <> 1){
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "INSERT INTO  paidmail  VALUES(? ,? ,? ,? ,'NO' ,'NO' ,(NOW()));";				//6
$sq = $db->prepare($mysql);
$sq->bindValue(1 ,"$id", PDO::PARAM_STR);
$sq->bindValue(2 ,"$movie", PDO::PARAM_STR);
$sq->bindValue(3 ,"$hoursrented", PDO::PARAM_STR);
$sq->bindValue(4 ,"$txn_id", PDO::PARAM_STR);

$sq->execute();
$affected_rows = $sq->rowCount();

if (!$sq->execute()) {
	echo "Error!";
		$failed_ipn_8=1; //$failed_pdt_1=1; 

}
$db = NULL ;
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT mailpdt, mailipn FROM paidmail WHERE receipt_id=?;";				//7
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$txn_id", PDO::PARAM_STR);
if (!$sq->execute()) {
echo "Error!";
	$failed_ipn_9=1; //$failed_pdt_1=1; 

}
$count = $sq->rowCount();
if (!$count>0){
	$failed_ipn_10=1; //$failed_pdt_1=1; 
}
else
{
while ($r = $sq->fetch(PDO::FETCH_NUM)) {

$englishtitle = $r[1];
$mailpdt = $r[0];
$mailipn = $r[1];
}
$db = NULL ;
}}

if( $mailpdt <> 'YES' && $mailipn <> 'YES'){
include 'mailipn.php';														//8

}}
else{
	echo "Error!";

}


include 'paypal_security.php';
?>
