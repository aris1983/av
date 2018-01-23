<?php


include'/var/www/outside_root/credits.php';

//require_once'ip_referrer.php';

$table ='security';
if (function_exists('getBrowser')){
}
else{
function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    }    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }  
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}}

//need to include security itself and also my movies
$refferer = $_SERVER['HTTP_REFERER'];
$ua=getBrowser();
$browser =  $ua['name'];
$platform =$ua['platform'];
$refferer2 = strtok($refferer, '?');
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

if (function_exists('secutiy_security')){
}
else{
function secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password){

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

/*
switch ($currentFile)//put get and post in modsecurity
{
case "ajax_mymovies.php"://no need
	//$login_string
		if(preg_match("/[^a-pA-P0-9\s]/", $login_string)){
		$case='login_string';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);//include but change signedin variables
		}
	//SELECT user FROM users WHERE signupstring=?
	if($failed_mysql_1==1){
	$case='failed_mysql_1';
	secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}

break;
case "ajax_verify_signup.php":
	//$verify_signup
		if(preg_match("/[^a-pA-P0-9\s]/", $verify_signup)){
		$case='login_string';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$verify_signup,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}

	//SELECT user FROM users WHERE verify_signup=? 
	if($failed_mysql_1==1){
	$case='failed_mysql_1=SELECT user FROM users WHERE verify_signup=?  (else)';
	secutiy_security($ip,$refferer,$mail,$platform,$password,$verify_signup,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
		//SELECT user FROM users WHERE verify_signup=? AND status=? AND verify_signup_time  BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW()
		if($failed_mysql_2==1){
	$case='failed_mysql_2=SELECT user FROM users WHERE verify_signup=? AND status=? AND verify_signup_time  BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW() (else)';
	secutiy_security($ip,$refferer,$mail,$platform,$password,$verify_signup,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}

break;
case "ajax_login.php":
	//$mail
		if(preg_match("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", $mail)){
		$case='mail';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$mail,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}	
//$password
		if(preg_match("/[^a-zA-Z0-9\s]/", $password)){
		$case='password';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$mail,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//$login_string
		if(preg_match("/[^a-pA-P0-9\s]/", $login_string)){
		$case='login_string';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$mail,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//$casemysql
		if(preg_match("/[^a-zA-Z0-9\s]/", $casemysql)){
		$case='casemysql';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$mail,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//SELECT user FROM users WHERE user=? AND password=? AND status=?
		if($failed_mysql_1==1){
		$case='failed_mysql_1=SELECT user FROM users WHERE user=? AND password=? AND status=?';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$mail,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		if($ajax_new_login==1){
		$case='ajax_new_login=SELECT user FROM users WHERE user=? AND password=? AND status=?';
		secutiy_security($ip,$refferer,$mail,$platform,$mail,$string,$currentFile,$case,'new_signed_in',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
break;
case "ajax_login3.php":
		//$login_string
		if(preg_match("/[^a-pA-P0-9\s]/", $login_string)){
		$case='login_string';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//$casemysql
		if(preg_match("/[^a-zA-Z0-9\s]/", $casemysql)){
		$case='casemysql';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//$titlename
		if(preg_match("/[^a-zA-Z0-9\s]/", $titlename)){
		$case='titlename';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}		
		
		if($failed_mysql_1_login==1){//might be redundant
		$case='failed_mysql_1_login=SELECT signupstring,time FROM users WHERE signupstring=? (else)';
		secutiy_security($ip,$refferer,$mail,$platform,$user_mail,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		//SELECT signupstring FROM users WHERE signupstring=?  
		if($ajax_new_login_2_login==1){//might be redundant
		$case='ajax_new_login_2_login=UPDATE users SET signupstring=? , time=(NOW())  WHERE signupstring=?  casemysql =mymovies';
		secutiy_security($ip,$refferer,$mail,$platform,$user_mail,$login_string,$currentFile,$case,'new_signed_in',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		if($ajax_new_login_3_login==1){//might be redundant
		$case='ajax_new_login_3_login=UPDATE users SET signupstring=? , time=(NOW())  WHERE signupstring=?  casemysql =mymovies (else)';
		secutiy_security($ip,$refferer,$mail,$platform,$user_mail,$login_string,$currentFile,$case,'new_signed_in',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		if($ajax_new_login_4_login==1){//might be redundant
		$case='ajax_new_login_4_login=UPDATE users SET signupstring=? , time=(NOW())  WHERE signupstring=?  casemysql =mymovies';
		secutiy_security($ip,$refferer,$mail,$platform,$user_mail,$login_string,$currentFile,$case,'new_signed_in',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		//SELECT signupstring FROM users WHERE signupstring=?  
		if($ajax_new_login_5_login==1){//might be redundant
		$case='ajax_new_login_5_login=UPDATE users SET signupstring=? , time=(NOW())  WHERE signupstring=?  casemysql =mymovies (else)';
		secutiy_security($ip,$refferer,$mail,$platform,$user_mail,$login_string,$currentFile,$case,'new_signed_in',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		if($failed_mysql_6_login==1){//might be redundant
		$case='failed_mysql_6_login=!time=ok';
		secutiy_security($ip,$refferer,$mail,$platform,$user_mail,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		if($failed_mysql_7_login==1){//might be redundant
		$case='failed_mysql_7_login= !time=ok empty(login_string)';
		secutiy_security($ip,$refferer,$mail,$platform,$user_mail,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
break;
case "ajax_forgottenpassword.php":
	//$mail
		if(preg_match("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", $mail)){
		$case='mail';
		secutiy_security($ip,$refferer,$mail,$platform,$mail,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}	
	//SELECT user FROM users WHERE user=?  AND status=?
	if($failed_mysql_1==1){
	$case='failed_mysql_1=SELECT user FROM users WHERE user=?  AND status=? (else)';
	secutiy_security($ip,$refferer,$mail,$platform,$mail,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//Ευχαρηστούμε, η αποστολή μηνύματος απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.
	if($failed_mysql_2==1){
	$case='failed_mysql_2=Ευχαρηστούμε, η αποστολή μηνύματος απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.';
	secutiy_security($ip,$refferer,$mail,$platform,$mail,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}

break;
case "ajax_change_password.php":

		if(preg_match("/[^a-zA-Z0-9\s]/", $password)){
		$case='password';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}	
	//$forgotten_password
		if(preg_match("/[^a-pA-P0-9\s]/", $forgotten_password)){
		$case='forgotten_password';
		secutiy_security($ip,$refferer,"mail=$mail",$platform,"$forgotten_password=forgotten_password","string=$string",$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}	
		if($failed_mysql_1==1){
		//SELECT user FROM users WHERE change_password=? 
		$case='failed_mysql_1=SELECT user FROM users WHERE change_password=? (else)';
		secutiy_security($ip,$refferer,"mail=$mail",$platform,"$forgotten_password=forgotten_password","string=$string",$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		if($failed_mysql_2==1){
		//SELECT user FROM users WHERE change_password=?  AND status=? AND change_password_time  BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW()
		$case='failed_mysql_2=SELECT user FROM users WHERE change_password=?  AND status=? AND change_password_time  BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW() (else)';
		secutiy_security($ip,$refferer,"mail=$mail",$platform,"$forgotten_password=forgotten_password","string=$string",$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		
		
		//Ευχαριστούμε,αλλάξατε με επιτυχία τον κωδικό σας, αλλά το μήνυμα για επιβεβαίωση απέτυχε.
		if($failed_mysql_3==1){
		$case='failed_mysql_3=Ευχαριστούμε,αλλάξατε με επιτυχία τον κωδικό σας, αλλά το μήνυμα για επιβεβαίωση απέτυχε.';
		secutiy_security($ip,$refferer,$mail,$platform,$forgotten_password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}

break;

case "ajax_1st_page.php":// = change_password2

	//$forgotten_password
		if(preg_match("/[^a-pA-P0-9\s]/", $forgotten_password)){
		$case='forgotten_password';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}	
		if(preg_match("/[^a-pA-P0-9\s]/", $verify_signup)){
		//SELECT user FROM users WHERE change_password=? 
		$case='$verify_signup';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}

break;

case "ajax_signup.php":
	//$mail
		if(preg_match("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", $mail)){
		$case='mail';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}	

		if(preg_match("/[^a-zA-Z0-9\s]/", $user_password)){
		$case='user_password';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}

		//SELECT user FROM users WHERE user=?  AND status=?
		if($failed_mysql_1==1){
		$case='failed_mysql_1=Είστε ήδη εγγεγραμμένος';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//Η αποστολή μηνύματος απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.
		if($failed_mysql_2==1){
		$case='failed_mysql_2=Η αποστολή μηνύματος για ολοκλήρωση απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}

break;
case "paypal.php":
	
		if(preg_match("/[^a-pA-P0-9\s]/", $login_string)){
		$case='login_string';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
	
		if(preg_match("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", $titlename)){
		$case='titlename';
		secutiy_security($ip,$refferer,$mail,$platform,$titlename,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}
		//SELECT user FROM users WHERE signupstring=?
		if($failed_mysql_1==1){
		$case='failed_mysql_1=SELECT user FROM users WHERE signupstring=?  else()';
		secutiy_security($ip,$refferer,$mail,$platform,$password,$login_string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
		}

	break;	
default:

break;
}
*/


?>