










<!--<p> Για την ασφάλεια σας θα προωθηθείτε στην μεγαλύτερη σε όγκο σελίδα για πληρώμες , δεν χρειάζετε να είστε μέλος, παρακαλούμε επιστρέψετε στην σελίδα μας όταν κάνετε την πληρωμή. <br>Έαν κανετε την πληρωμή για πρώτη φορά  πατήστε <br>user:aristo_1302096141_biz@hotmail.com  password:Sandman55 <br>για να εισέλθετε στο sandbox , <br>έπειτα ξαναπατήστε το κουμπί παρακάτω για αγορά και πατήστε <br>user:aristo_1331817642_per@hotmail.com password:Sandwoman55 </p>-->
<?PHP



include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$login_string=$_POST['login_string'] ;
$titlename=$_POST['titlename'] ;
$login_string = trim($login_string);
$login_string = preg_replace("/[^a-zA-Z0-9\s]/", " ", $login_string);
$titlename = trim($titlename);
$titlename = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $titlename);
// edo if monday..outocome else
echo("<br>");

echo($titlename);
echo("<br>");

if (strtolower($titlename)=='monday' ||strtolower($titlename)=='tuesday'||strtolower($titlename)=='wednesday' ||strtolower($titlename)=='thursday'||strtolower($titlename)=='friday' ||strtolower($titlename)=='outcome'){
/*	
echo("http://docs.google.com/gview?url=https://s3-eu-west-1.amazonaws.com/biris.finance.pdf/".strtolower($titlename).".pdf&embedded=true
");
*/

echo('<iframe src="http://docs.google.com/gview?url=https://s3-eu-west-1.amazonaws.com/biris.finance.pdf/'.strtolower($titlename).'.pdf&embedded=true
" style="width:100%; height:1700px;" align="right" frameborder="0"></iframe>');
if(!empty($login_string)){

};
}
elseif (strtolower($titlename)=='symbol'){
	
include"symbol_request/request_symbol.php";
if(!empty($login_string)){

};
}
else{
echo("<br>");
echo($titlename);
echo("my account buy or sell<br>");
include('account/account.php');
include('buy_sell/buy_sell.php');

}

if(!empty($login_string)){

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",  
array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT user FROM users WHERE signupstring=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$login_string", PDO::PARAM_STR);
if (!$sq->execute()) {
echo('Σφάλμα σύνδεσης.');
}
$count = $sq->rowCount();
if($count > 0){
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$mail = $r[0];
$db = NULL ;
}}
else
{
  $failed_mysql_1=1;
$db = NULL ;
echo('Σφάλμα σύνδεσης.');//need to put if error not write code
}
$string1= "id=" . $mail . "&login=" . $login_string . "&hoursrented=2" ;
$string2= "id=" . $mail . "&login=" . $login_string . "&hoursrented=24" ;
$string3= "id=" . $mail . "&login=" . $login_string . "&hoursrented=888" ;
$titlename=rawurlencode($titlename);

//  include"security.php";
/*
echo("<table class='paysample'  width='40%' height='5%' align='center'>");
echo("<tr>");
echo("<th>");
echo("<center>Αγορά  για 3 ώρες 1.0 ευρώ.</center>");
echo("</th>");

echo("</tr>");
echo("<tr>");
echo("<td>");
echo("<form target='paypal' action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>");
echo("<input type='hidden' name='cmd' value='_s-xclick'>");
echo("<input type='hidden' name='hosted_button_id' value='Q5XR6MDHCTMEJ'>");
echo("<table>");
echo("<tr><td><input type='hidden' name='on0' value='&#932;&#945;&#953;&#957;&#943;&#945;'></td></tr><tr><td><input type='hidden' name='os0' maxlength='200' value='$string1'></td></tr>");
echo("<tr><td><input type='hidden' name='on1' value='&#935;&#961;&#942;&#963;&#964;&#951;&#962;'></td></tr><tr><td><input type='hidden' name='os1' maxlength='200' value='$titlename'></td></tr>");
echo("</table>");
echo("<center>");
echo("<input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='pay'>");
echo("</center>");
echo("<img alt='' border='0' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'>");
echo("</form>");
echo("</td>");

echo("</tr>");
echo("</table> ");
*/
}
?>