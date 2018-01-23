<?php
include'/var/www/outside_root/credits.php';

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "INSERT INTO logpaidpdt VALUES(?,?,?,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?, ?, ?, (NOW()),(NOW()));";
$sq = $db->prepare($mysql);
$sq->bindValue(1 ,"$status", PDO::PARAM_STR);
$sq->bindValue(2 ,"$mc_gross", PDO::PARAM_STR);
$sq->bindValue(3 ,"$protection_eligibility", PDO::PARAM_STR);
$sq->bindValue(4 ,"$address_status", PDO::PARAM_STR);
$sq->bindValue(5 ,"$payer_id", PDO::PARAM_STR);
$sq->bindValue(6 ,"$tax", PDO::PARAM_STR);
$sq->bindValue(7 ,"$address_street", PDO::PARAM_STR);
$sq->bindValue(8 ,"$payment_date", PDO::PARAM_STR);
$sq->bindValue(9 ,"$payment_status", PDO::PARAM_STR);
$sq->bindValue(10 ,"$charset", PDO::PARAM_STR);
$sq->bindValue(11 ,"$address_zip", PDO::PARAM_STR);
$sq->bindValue(12 ,"$first_name", PDO::PARAM_STR);
$sq->bindValue(13 ,"$option_selection1", PDO::PARAM_STR);
$sq->bindValue(14 ,"$option_selection2", PDO::PARAM_STR);
$sq->bindValue(15 ,"$address_country_code", PDO::PARAM_STR);
$sq->bindValue(16 ,"$address_name", PDO::PARAM_STR);
$sq->bindValue(17 ,"$custom", PDO::PARAM_STR);
$sq->bindValue(18 ,"$payer_status", PDO::PARAM_STR);
$sq->bindValue(19 ,"$business", PDO::PARAM_STR);
$sq->bindValue(20 ,"$address_country", PDO::PARAM_STR);
$sq->bindValue(21 ,"$address_city", PDO::PARAM_STR);
$sq->bindValue(22 ,"$quantity", PDO::PARAM_STR);
$sq->bindValue(23 ,"$payer_email", PDO::PARAM_STR);
$sq->bindValue(24 ,"$option_name1", PDO::PARAM_STR);
$sq->bindValue(25 ,"$option_name2", PDO::PARAM_STR);
$sq->bindValue(26 ,"$txn_id", PDO::PARAM_STR);
$sq->bindValue(27 ,"$payment_type", PDO::PARAM_STR);
$sq->bindValue(28 ,"$btn_id", PDO::PARAM_STR);
$sq->bindValue(29 ,"$last_name", PDO::PARAM_STR);
$sq->bindValue(30 ,"$address_state", PDO::PARAM_STR);
$sq->bindValue(31 ,"$receiver_email", PDO::PARAM_STR);
$sq->bindValue(32 ,"$shipping_discount", PDO::PARAM_STR);
$sq->bindValue(33 ,"$insurance_amount", PDO::PARAM_STR);
$sq->bindValue(34 ,"$receiver_id", PDO::PARAM_STR);
$sq->bindValue(35 ,"$pending_reason", PDO::PARAM_STR);
$sq->bindValue(36 ,"$txn_type", PDO::PARAM_STR);
$sq->bindValue(37 ,"$item_name", PDO::PARAM_STR);
$sq->bindValue(38 ,"$discount", PDO::PARAM_STR);
$sq->bindValue(39 ,"$mc_currency", PDO::PARAM_STR);
$sq->bindValue(40 ,"$item_number", PDO::PARAM_STR);
$sq->bindValue(41 ,"$residence_country", PDO::PARAM_STR);
$sq->bindValue(42 ,"$receipt_id", PDO::PARAM_STR);
$sq->bindValue(43 ,"$shipping_method", PDO::PARAM_STR);
$sq->bindValue(44 ,"$handling_amount", PDO::PARAM_STR);
$sq->bindValue(45 ,"$transaction_subject", PDO::PARAM_STR);
$sq->bindValue(46 ,"$payment_gross", PDO::PARAM_STR);
$sq->bindValue(47 ,"$shipping", PDO::PARAM_STR);
$sq->bindValue(48 ,"$id", PDO::PARAM_STR);
$sq->bindValue(49 ,"$hoursrented", PDO::PARAM_STR);
$sq->bindValue(50 ,"NO", PDO::PARAM_STR);
$sq->execute();
$affected_rows = $sq->rowCount();
if (!$sq->execute()) {
	echo "Error!";
	$failed_pdt_9=1; //$failed_pdt_1=1; 

}
$db = NULL ;
echo ("<b>unsucessfull</b><br>\n");//CHANGE

?>