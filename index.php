<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
<?php

// include'banned_ips.php';

include 'js.php';
include 'js_check.php';
include 'js_mymovies.php';
include 'js_buy.php';
include 'js_options.php';
include 'js_boxes.php';
include 'js_player.php';
include 'js_mobile.php';

include 'scripts.html';

echo ("<script type='text/javascript'>");// to pass need to be at head
echo ("function   error_redirect(){");
echo ("window.serverURL = window.location.protocol + '//' + window.location.host + '' + window.location.pathname;");
echo ("window.location.replace(window.serverURL);");
echo ("}");


echo ("function OpenInNewTab(url) {");
  echo ("var win = window.open('http://52.2.13.97:3838/fama_french/', '_blank');");
 echo (" win.focus();");
echo ("}");


echo ("</script>");
echo ("<script type='text/javascript'>");// to pass need to be at head
echo ("function   data_error_redirect(data){");
echo ("if (data == 'Σφάλμα σύνδεσης.'){");
echo ("window.serverURL = window.location.protocol + '//' + window.location.host + '' + window.location.pathname;");
echo ("window.location.replace(window.serverURL);");
echo ("}}");
echo ("</script>");


header('Content-Type: text/html; charset=UTF-8');

$forgotten_password=$_GET['forgotten_password'] ;
$forgotten_password = trim($forgotten_password);
$forgotten_password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $forgotten_password);
if(isset($forgotten_password)&&!empty($forgotten_password)){
echo ("<script type='text/javascript'>");// to pass need to be at head
echo ("window.forgotten_password = '$forgotten_password';");
echo ("</script>");
}

require_once'/var/www/outside_root/credits.php';

$verify_signup=$_GET['verify_signup'] ;
$verify_signup = trim($verify_signup);
$verify_signup = preg_replace("/[^a-zA-Z0-9\s]/", " ", $verify_signup);
if(isset($verify_signup)&&!empty($verify_signup)){
echo ("<script type='text/javascript'>");
echo ("window.verify_signup = '$verify_signup';");

echo ("</script>");
}
echo ("<script type='text/javascript'>");
echo ("$(document).ready(function(){");
		echo ("$('#waiting').show(0);");
		echo ("$('#demoForm').hide(0);");
		echo ("$('#message').hide(0);");	
		echo ("$.ajax({");
			echo ("type : 'POST',");
			echo ("url : 'ajax_1st_page.php',");
			echo ("dataType : 'html',");
			echo ("data: {");
				echo ("width : window.innerWidth || document.body.clientWidth,");
				echo ("height : window.innerHeight || document.body.clientHeight,");
				echo ("forgotten_password : window.forgotten_password ,");
				echo ("verify_signup : window.verify_signup");			
				echo ("},");
				echo ("success : function(data){");
				echo ("$('#waiting').hide(0);");
				echo ("$('#wrapper').hide();");
				echo ("$('#1st').append(data);");
				echo ("$('#signout').hide();");
				if ($browser == 'Internet Explorer' && $version <9){
				echo ("$('#msg_response').prepend('<p>Σας παρακαλούμε να χρησιμοποιήσετε google chrome ,ή, να αναβαθμήσετε τον Internet Explorer σε έκδοση >=9.</p>');");
echo ("alert('Σας παρακαλούμε να χρησιμοποιήσετε google chrome ,ή, να αναβαθμήσετε τον Internet Explorer σε έκδοση >=9.');");	
	}
				echo ("if (data.error === true)");
				echo ("$('#demoForm').show(0);");
				echo ("},");
				echo ("error : function(XMLHttpRequest, textStatus, errorThrown) {");
				echo ("$('#waiting').hide(0);");
				echo ("$('#message').removeClass().addClass('error')");
					echo (".text('Παρακαλώ περιμένετε.').show(0);");
				echo ("$('#demoForm').show(0);");
			echo ("}");
		echo ("});");	
		echo ("return false;");
	echo ("});");
echo ("</script>");
?>
<title></title>
<style type="text/css">
</style>
<link rel="stylesheet" type="text/css" href="css.css"> 
<link href="css/main.css" type="text/css" media="screen, projection" rel="stylesheet" />


</head>
<body>

<?php

        echo ("<div id='1st' align='center'>");
        echo ("<div id='wrapper' align='center'>");
            echo ("<div id='message' align='center' style='display: none;'>");
            echo ("</div>");
            echo ("<div id='waiting' align='center' style='display: none;'>");
                echo ("Παρακαλώ περιμένετε<br />");
                echo ("<img src='images/ajax-loader.gif' align='center' title='Loader' alt='Loader' />");
            echo ("</div>");
            echo ("<form action='' id='demoForm' method='post'>");
                    echo ("<legend>Παρακαλώ περιμένετε.</legend>");
                    echo ("<p>");
                    	echo ("</p>");
                    echo ("<p>");
                    echo ("</p>");
            echo ("</form>");
        echo ("</div>");
       echo ("</div>");

$tx_token = $_GET['tx'];

if(isset($tx_token)&&!empty($tx_token)){

$table = 'pdtcheck';
echo("<div id='pdt' style='display: none;'>");

$my_t=getdate(date("U"));
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT receipt, pdt_read FROM pdtcheck WHERE receipt=? AND pdt_read=?";				//1
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$tx_token", PDO::PARAM_STR);
$sq->bindValue(2, "YES", PDO::PARAM_STR);

if (!$sq->execute()) {
echo("Υπήρχε πρόβλημα σας παρακαλούμε πηγαίνετε στην επιλογή οι ταινίες μου");
$failed_pdt_1=1; //$failed_pdt_1=1; 
}
$count = $sq->rowCount();
if ($count>0){
$failed_pdt_2=1; //$failed_pdt_2=1; 
$failed_mysql_1_login=1;
$db = NULL ;
echo ("<script type='text/javascript'>");
echo ("error_redirect();");//change
echo ("</script>");
}
else{
$ok_tx=1;
$failed_mysql_2_login=1;
$db = NULL ;
}
if($ok_tx==1){
include'/var/www/outside_root/paypal.php';

//$auth_token = "";
$req .= "&tx=$tx_token&at=$auth_token";
// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
// If possible, securely post back to paypal using HTTPS
// Your PHP server will need to be SSL enabled
// $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
if (!$fp) {
// HTTP ERROR
echo ("<li>EROOR</li>\n");
} else {
fputs ($fp, $header . $req);
// read the body data
echo ("<li>read</li>\n");
$headerdone = false;
while (!feof($fp)) {
$line = fgets ($fp, 1024);
if (strcmp($line, "\r\n") == 0) {
// read the header
$headerdone = true;
}
else if ($headerdone)
{
echo ("<li>header has been read</li>\n");
// header has been read. now read the contents
$res .= $line;
echo ("<li>1 $line</li>\n");
}}
$res2 = "status =";
$res2 .= $res;

echo ("<li>2 $res</li>\n");
// parse the data
$lines = explode("\n", $res);
$keyarray = array();
if (strcmp ($lines[0], "SUCCESS") == 0) {
for ($i=1; $i<count($lines);$i++){
list($key,$val) = explode("=", $lines[$i]);
$keyarray[urldecode($key)] = urldecode($val);
}
// check the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email
// check that payment_amount/payment_currency are correct
// process payment
$option_selection2=urldecode($option_selection2);
include 'pdt_keyarray.php';
$option_selection2=rawurldecode($option_selection2);
$option_selection2= trim($option_selection2);

// check for more
$increment = preg_replace("/[^a-zA-Z0-9.\s]/", " ", $increment);
$mail = preg_replace("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", "", $mail);
$password= preg_replace("/[^a-zA-Z0-9\s]/", "", $password);

//
if(isset($login)){
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT signupstring FROM users WHERE signupstring=? ";					//2
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$login", PDO::PARAM_STR);
if (!$sq->execute()) {
echo("Υπήρχε πρόβλημα σας παρακαλούμε πηγαίνετε στην επιλογή οι ταινίες μου");
$failed_pdt_3=1; //$failed_pdt_1=1; 
}
$count = $sq->rowCount();
if ($count>0){
$ok_user=1;
$failed_mysql_1_login=1;
$db = NULL ;
}
else{
//$failed_  since it changes from ipn

echo("Υπήρχε πρόβλημα σας παρακαλούμε πηγαίνετε στην επιλογή οι ταινίες μου");
$failed_mysql_2_login=1;
$db = NULL ;
}
if($ok_user==1){
// need to put it further down put barrier it exist tx 

include 'paidpdt.php';															// 3 
$option_selection2= trim($option_selection2);

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT receipt FROM pdtcheck WHERE receipt=?  ;";					//4
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$txn_id", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης .';
	$failed_pdt_6=1; //$failed_pdt_1=1; 

}
$count = $sq->rowCount();

if ($count>0){
//ALREADY EXIST
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
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
$sq = $db->prepare("INSERT INTO pdtcheck VALUES( ?,?,?,(NOW()),?,?,?,?) ");				//5
$sq->bindValue(1, "$option_selection2", PDO::PARAM_STR);
$sq->bindValue(2, "$id", PDO::PARAM_STR);
$sq->bindValue(3, "$hoursrented", PDO::PARAM_STR);
$sq->bindValue(4, "$txn_id", PDO::PARAM_STR);
$sq->bindValue(5, "$login", PDO::PARAM_STR);
$sq->bindValue(6, "YES", PDO::PARAM_STR);
$sq->bindValue(7, "NO", PDO::PARAM_STR);
if (!$sq->execute()) {
	$return['error'] = true;
	$return['msg'] = 'Σφάλμα σύνδεσης .';
	$failed_pdt_8=1; //$failed_pdt_1=1; 

}

$sq->execute();
$db = NULL ;
}}
else if (strcmp ($lines[0], "FAIL") == 0) {
// log for manual investigation

include 'logpaidpdt.php';				//6 
}}
fclose ($fp);
if (!$fp) {
// HTTP ERROR
echo ("<li>Παρουσιαστήκε σφάλμα. Η πληρωμή απέτηχε. Εάν θέλετε να επικοινωνήσετε μαζί μας παρακαλώ χρησιμοποήστε την φόρμα επικοινωνίας. </li>\n");
} else {
if (strcmp ($lines[0], "SUCCESS") == 0) {
include 'pdtecho_outcome.php';
//javascript
}}//might be redudant should go to end of page
$mailpdt = 'YES';
$mailipn = 'YES';
$proceed = 0;
$login_string = trim($login_string);
$option_selection2= trim($option_selection2);

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT receipt_id FROM paidmail WHERE receipt_id=?;";					//7
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$txn_id", PDO::PARAM_STR);
if (!$sq->execute()) {
echo "Error!";
$failed_pdt_10=1; //$failed_pdt_1=1; 

}
$count = $sq->rowCount();
if (!$count>0){
$failed_pdt_11=1; // MAYBE NEED CHANGING 

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
$mysql = "INSERT INTO  paidmail  VALUES(? ,? ,? ,? ,'NO' ,'NO' ,(NOW()));";				//8
$sq = $db->prepare($mysql);
$sq->bindValue(1 ,"$id", PDO::PARAM_STR);//wrong
$sq->bindValue(2 ,"$option_selection2", PDO::PARAM_STR);
$sq->bindValue(3 ,"$hoursrented", PDO::PARAM_STR);
$sq->bindValue(4 ,"$txn_id", PDO::PARAM_STR);
$sq->execute();
$affected_rows = $sq->rowCount();

if (!$sq->execute()) {
	echo "Error!";
	$failed_pdt_12=1; //$failed_pdt_1=1; 

}
$db = NULL ;
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT mailpdt, mailipn FROM paidmail WHERE receipt_id=?;";			//9
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$txn_id", PDO::PARAM_STR);
if (!$sq->execute()) {
echo "Error!";
$failed_pdt_13=1; //$failed_pdt_1=1; 

}
$count = $sq->rowCount();
if (!$count>0){
$failed_pdt_14=1; //$failed_pdt_1=1; 

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
include'pdt_mail.php';															//10
}

$login_string=$_POST['login_string'] ;
$login_string = trim($login_string);
$login_string = preg_replace("/[^a-pA-P0-9\s]/", " ", $login_string);

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT signupstring FROM users WHERE user=? ";					//11
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$id", PDO::PARAM_STR);
if (!$sq->execute()) {
$failed_pdt_16=1; //$failed_pdt_1=1; 

	echo'Σφάλμα σύνδεσης .';
}
$count = $sq->rowCount();

if ($count>0){
//while result distict is less than total icons or no result
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$login_string= $r[0];

$db = NULL ;

}}
else{
$failed_pdt_17=1; //$failed_pdt_1=1; 

}
echo ("</div>");

// be carefull only if true


$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "UPDATE pdtcheck  SET pdt_read=?";						//12
$sq = $db->prepare($mysql);
$sq->bindValue(1, "YES", PDO::PARAM_STR);

if (!$sq->execute()) {
$failed_pdt_18=1; //$failed_pdt_1=1; 

echo("Υπήρχε πρόβλημα σας παρακαλούμε πηγαίνετε στην επιλογή οι ταινίες μου");
}

}}}//start of tx



 echo ("<script type='text/javascript'>");

echo ("window.bought = '$option_selection2';");
echo ("window.login_string = '$login_string';");
echo ("$('[id=signout]').show();");
	echo ("if (window.bought){");
 echo ("$(document).ready(function(){");

	echo ("});");
		echo ("};");
		
echo ("</script>");

include 'paypal_security.php';//need to integrate upper script variables

}
	?>
	

