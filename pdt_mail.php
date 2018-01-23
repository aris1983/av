<?php

include'/var/www/outside_root/credits.php';

$Name = "Audiovisual"; //senders name 
$email = "email@adress.com"; //senders e-mail adress 
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=utf8\r\n";
 $to = $id;
 $subject = "Tα ακόλουθα μας εστάλησαν από την Paypal";
 $body = "Αγαπητέ Πελάτη, τα ακόλουθα μας εστάλησαν από την Paypal,
status  = $status 
mc_gross = $mc_gross
protection_eligibility = $protection_eligibility
address_status = $address_status
payer_id = $payer_id
tax = $tax
address_street = $address_street
payment_date = $payment_date
payment_status = $payment_status
charset = $charset
address_zip = $address_zip
first_name = $first_name
option_selection1 = $option_selection1
option_selection2 = $option_selection2
address_country_code = $address_country_code
address_name = $address_name
custom = $custom
payer_status = $payer_status
business = $business
address_country = $address_country
address_city = $address_city
quantity = $quantity
payer_email = $payer_email
option_name1 = $option_name1
option_name2 = $option_name2
txn_id = $txn_id
payment_type = $payment_type
btn_id = $btn_id
last_name = $last_name
address_state = $address_state
receiver_email = $receiver_email
shipping_discount = $shipping_discount
insurance_amount = $insurance_amount
receiver_id = $receiver_id
pending_reason = $pending_reason
txn_type = $txn_type
item_name = $item_name
discount = $discount
mc_currency = $mc_currency
item_number = $item_number
residence_country = $residence_country
receipt_id = $receipt_id
shipping_method = $shipping_method
handling_amount = $handling_amount
transaction_subject = $transaction_subject
payment_gross = $payment_gross
shipping = $shipping ";
 if (mail($to,  $subject, $body, $header)) {
   echo("<p>Ευχαρηστούμε.</p>");
  } else {
   echo("<p>Ευχαρηστούμε, η αποστολή μηνύματος απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.</p>");
  $failed_pdt_15_b=1;
  }

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",  
array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "UPDATE paidmail SET mailpdt='YES' WHERE receipt_id=?;";
$sq = $db->prepare($mysql);
$sq->bindValue(1 ,'$txn_id', PDO::PARAM_STR);
$sq->execute();
$affected_rows = $sq->rowCount();
if (!$sq->execute()) {
	echo "Error!";
	$failed_pdt_15=1; //$failed_pdt_1=1; 

}
$db = NULL ;



?>