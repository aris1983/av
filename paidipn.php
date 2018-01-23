<?php
include'/var/www/outside_root/credits.php';

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password", 
 array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "INSERT INTO paidipn VALUES(? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? , ?, ?, ?, (NOW()),(NOW()));";
$sq = $db->prepare($mysql);
$sq->bindValue(1 ,"$mc_gross", PDO::PARAM_STR);
$sq->bindValue(2 ,"$protection_eligibility", PDO::PARAM_STR);
$sq->bindValue(3 ,"$address_status", PDO::PARAM_STR);
$sq->bindValue(4 ,"$payer_id", PDO::PARAM_STR);
$sq->bindValue(5 ,"$tax", PDO::PARAM_STR);
$sq->bindValue(6 ,"$address_street", PDO::PARAM_STR);
$sq->bindValue(7 ,"$payment_date", PDO::PARAM_STR);
$sq->bindValue(8 ,"$payment_status", PDO::PARAM_STR);
$sq->bindValue(9 ,"$charset", PDO::PARAM_STR);
$sq->bindValue(10 ,"$address_zip", PDO::PARAM_STR);
$sq->bindValue(11 ,"$first_name", PDO::PARAM_STR);
$sq->bindValue(12 ,"$option_selection1", PDO::PARAM_STR);
$sq->bindValue(13 ,"$option_selection2", PDO::PARAM_STR);
$sq->bindValue(14 ,"$address_country_code", PDO::PARAM_STR);
$sq->bindValue(15 ,"$address_name", PDO::PARAM_STR);
$sq->bindValue(16 ,"$notify_version", PDO::PARAM_STR);
$sq->bindValue(17 ,"$custom", PDO::PARAM_STR);
$sq->bindValue(18 ,"$payer_status", PDO::PARAM_STR);
$sq->bindValue(19 ,"$business", PDO::PARAM_STR);
$sq->bindValue(20 ,"$address_country", PDO::PARAM_STR);
$sq->bindValue(21 ,"$address_city", PDO::PARAM_STR);
$sq->bindValue(22 ,"$quantity", PDO::PARAM_STR);
$sq->bindValue(23 ,"$verify_sign", PDO::PARAM_STR);
$sq->bindValue(24 ,"$payer_email", PDO::PARAM_STR);
$sq->bindValue(25 ,"$option_name1", PDO::PARAM_STR);
$sq->bindValue(26 ,"$option_name2", PDO::PARAM_STR);
$sq->bindValue(27 ,"$txn_id", PDO::PARAM_STR);
$sq->bindValue(28 ,"$payment_type", PDO::PARAM_STR);
$sq->bindValue(29 ,"$btn_id", PDO::PARAM_STR);
$sq->bindValue(30 ,"$last_name", PDO::PARAM_STR);
$sq->bindValue(31 ,"$address_state", PDO::PARAM_STR);
$sq->bindValue(32 ,"$receiver_email", PDO::PARAM_STR);
$sq->bindValue(33 ,"$shipping_discount", PDO::PARAM_STR);
$sq->bindValue(34 ,"$insurance_amount", PDO::PARAM_STR);
$sq->bindValue(35 ,"$receiver_id", PDO::PARAM_STR);
$sq->bindValue(36 ,"$pending_reason", PDO::PARAM_STR);
$sq->bindValue(37 ,"$txn_type", PDO::PARAM_STR);
$sq->bindValue(38 ,"$item_name", PDO::PARAM_STR);
$sq->bindValue(39 ,"$discount", PDO::PARAM_STR);
$sq->bindValue(40 ,"$mc_currency", PDO::PARAM_STR);
$sq->bindValue(41 ,"$item_number", PDO::PARAM_STR);
$sq->bindValue(42 ,"$residence_country", PDO::PARAM_STR);
$sq->bindValue(43 ,"$test_ipn", PDO::PARAM_STR);
$sq->bindValue(44 ,"$receipt_id", PDO::PARAM_STR);
$sq->bindValue(45 ,"$shipping_method", PDO::PARAM_STR);
$sq->bindValue(46 ,"$handling_amount", PDO::PARAM_STR);
$sq->bindValue(47 ,"$transaction_subject", PDO::PARAM_STR);
$sq->bindValue(48 ,"$payment_gross", PDO::PARAM_STR);
$sq->bindValue(49 ,"$shipping", PDO::PARAM_STR);
$sq->bindValue(50 ,"$ipn_track_id", PDO::PARAM_STR);
$sq->bindValue(51 ,"$id", PDO::PARAM_STR);
$sq->bindValue(52 ,"$hoursrented", PDO::PARAM_STR);
$sq->bindValue(53 ,"$No", PDO::PARAM_STR);
$sq->bindValue(54 ,"$", PDO::PARAM_STR);
$sq->execute();
$affected_rows = $sq->rowCount();
if (!$sq->execute()) {
	echo "Error!";
		$failed_ipn_4=1; //$failed_pdt_1=1; 

}
$sq->execute();
$db = NULL ;
?>