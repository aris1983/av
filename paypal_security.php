<?php

include'/var/www/outside_root/credits.php';

$table = 'security_paypal';
if (function_exists('getBrowserSec')){
}
else{
function getBrowserSec() 
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
}		}

//need to include security itself and also my movies
$refferer = $_SERVER['HTTP_REFERER'];
$ua=getBrowserSec();
$browser =  $ua['name'];
$platform =$ua['platform'];
 $ua = $_SERVER["HTTP_USER_AGENT"];

//$ip=$_SERVER['REMOTE_ADDR'];//If at php.ini if register_global is set to Off 
$ip3=@$REMOTE_ADDR; //If at php.ini if register_global is set to On
$ip=$_SERVER['REMOTE_ADDR'];
$currentFile = $_SERVER["PHP_SELF"];///do i need escaping ??
$currentFile = str_replace("/05_03/",  "",$currentFile);
$parts = Explode('/', $currentFile);

$page_url =$parts[count($parts) - 1];
$ip2 = preg_replace("/[^.0-9\s]/", " ", $ip2);

$increment = preg_replace("/[^a-zA-Z0-9.\s]/", " ", $increment);
$mail = preg_replace("/[^a-zA-Z0-9(),:;@\.!#$%&'*+-=?^_`{|}~\s]/", " ", $mail);
$password= preg_replace("/[^a-zA-Z0-9\s]/", " ", $password);
$string = preg_replace("/[^a-zA-Z0-9\s]/", " ", $string);
if (function_exists('secutiy_pdo1')){
}
else{
function secutiy_pdo1($ip,$refferer,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password){
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


case "ajax.php":
	//SELECT receipt, pdt_read FROM pdtcheck WHERE receipt=? AND pdt_read=?

	if($failed_pdt_1==1){
	$case='failed_pdt_1=SELECT receipt, pdt_read FROM pdtcheck WHERE receipt=? AND pdt_read=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	
	if($failed_pdt_2==1){
	$case='failed_pdt_2=SELECT receipt, pdt_read FROM pdtcheck WHERE receipt=? AND pdt_read=? (count>0) ';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}	
	//SELECT signupstring FROM users WHERE signupstring=? 
	if($failed_pdt_3==1){
	$case='failed_pdt_3=SELECT signupstring FROM users WHERE signupstring=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_pdt_4==1){
	$case='failed_pdt_4=SELECT signupstring FROM users WHERE signupstring=? (else)';
	secutiy_pdo1($ip,$increment,"string=$string","string=$string",'login=$login',$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}	
	//SELECT receipt FROM pdtcheck WHERE receipt=?  ;
	if($failed_pdt_5==1){ // no 5
	$case='failed_pdt_5=INSERT INTO paidpdt VALUES( ?,... (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	
	//INSERT INTO paidpdt VALUES( 
	if($failed_pdt_6==1){
	$case='failed_pdt_6=SELECT receipt FROM pdtcheck WHERE receipt=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_pdt_7==1){// no 7
	$case='failed_pdt_7';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}	
	//INSERT INTO pdtcheck VALUES( ?,?,?,(NOW()),?,?,?,?)
	if($failed_pdt_8==1){
	$case='failed_pdt_8=INSERT INTO pdtcheck VALUES( ?,?,?,(NOW()),?,?,?,?)  (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	
	//INSERT INTO logpaidpdt VALUES(?
	if($failed_pdt_9==1){//no
	$case='failed_pdt_9=INSERT INTO logpaidpdt VALUES(?... (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//SELECT receipt_id FROM paidmail WHERE receipt_id='$txn_id';
	if($failed_pdt_10==1){//no
	$case='failed_pdt_10=SELECT receipt_id FROM paidmail WHERE receipt_id=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_pdt_11==1){
	$case='failed_pdt_11=SELECT receipt_id FROM paidmail WHERE receipt_id=? (!count>0)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}	
	//INSERT INTO  paidmail  VALUES(? ,? ,? ,? ,'NO' ,'NO' ,(NOW()))
	if($failed_pdt_12==1){
	$case='failed_pdt_12=INSERT INTO  paidmail  VALUES(? ,? ,? ,? ,NO ,NO ,(NOW()))(!execute) ';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	
	//SELECT mailpdt, mailipn FROM paidmail WHERE receipt_id='$txn_id'
	if($failed_pdt_13==1){
	$case='failed_pdt_13=ELECT mailpdt, mailipn FROM paidmail WHERE receipt_id=?(!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_pdt_14==1){
	$case='failed_pdt_14=SELECT mailpdt, mailipn FROM paidmail WHERE receipt_id=?(!execute) (!count>0)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//UPDATE paidmail SET mailpdt='YES' WHERE receipt_id=?;
	if($failed_pdt_15==1){
	$case='failed_pdt_15=UPDATE paidmail SET mailpdt=YES WHERE receipt_id=?(!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_pdt_15_b==1){
	$case='failed_pdt_15_b=Ευχαρηστούμε, η αποστολή μηνύματος απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//SELECT signupstring FROM users WHERE user=? 
	if($failed_pdt_16==1){
	$case='failed_pdt_16=SELECT signupstring FROM users WHERE user=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_pdt_17==1){
	$case='failed_pdt_17=SELECT signupstring FROM users WHERE user=? (else)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}	
	//UPDATE pdtcheck  SET pdt_read=?
	if($failed_pdt_18==1){
	$case='failed_pdt_18=UPDATE pdtcheck  SET pdt_read=?(!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	
	$case='pdt acess';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,'new_pdt_acess',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	
break;

case "ipnsandbox.php":
	//SELECT receipt FROM pdtcheck WHERE receipt=?  
	if($failed_ipn_1==1){
	$case='failed_ipn_1=SELECT receipt FROM pdtcheck WHERE receipt=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_ipn_2==1){
	$case='failed_ipn_2=SELECT receipt FROM pdtcheck WHERE receipt=? (count>0)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//INSERT INTO pdtcheck VALUES( ?,?,?,(NOW()),?,?,?,?) 
	if($failed_ipn_3==1){
	$case='failed_ipn_3=INSERT INTO pdtcheck VALUES( ?,?,?,(NOW()),?,?,?,?) (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	
	//INSERT INTO paidipn VALUES(?
	if($failed_ipn_4==1){
	$case='failed_ipn_4=INSERT INTO paidipn VALUES(? ...(!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//INSERT INTO logpaidipn VALUES(? 
	if($failed_ipn_5==1){
	$case='failed_ipn_5=INSERT INTO logpaidipn VALUES(?...(!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//SELECT receipt_id FROM paidmail WHERE receipt_id='$txn_id'
	if($failed_ipn_6==1){
	$case='failed_ipn_1=SELECT receipt_id FROM paidmail WHERE receipt_id=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_ipn_7==1){
	$case='failed_ipn_7';
	secutiy_pdo1($ip,$increment,$mail,$platform,$txn_id,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}	
	//INSERT INTO  paidmail  VALUES('$id' ,'$movie' ,'$hoursrented' ,'$txn_id' ,'NO' ,'NO' ,(NOW()))
	if($failed_ipn_8==1){
	$case='failed_ipn_8=INSERT INTO  paidmail  VALUES(? ,? ,? ,? ,NO ,NO ,(NOW())) (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	//SELECT mailpdt, mailipn FROM paidmail WHERE receipt_id='$txn_id';"
	if($failed_ipn_9==1){
	$case='failed_ipn_9=SELECT mailpdt, mailipn FROM paidmail WHERE receipt_id=?  (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_ipn_10==1){
	$case='failed_ipn_10=SELECT mailpdt, mailipn FROM paidmail WHERE receipt_id=?  (!count>0) ';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}	
	//UPDATE paidmail SET mailipn='YES' WHERE receipt_id=?;
	if($failed_ipn_11==1){
	$case='failed_ipn_11=UPDATE paidmail SET mailipn=YES WHERE receipt_id=? (!execute)';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	if($failed_ipn_12==1){
	$case='failed_ipn_12=Ευχαρηστούμε, η αποστολή μηνύματος απέτειχε παρακαλείστε να ξαναπροσπαθήσετε.';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,$table,$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	}
	
	$case='ipn acess';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,'new_ipn_acess',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
break;


default:
	$case='ipn acess defaul';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,'new_ipn_acess',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
	$case='pdt acess defaul';
	secutiy_pdo1($ip,$increment,$mail,$platform,$password,$string,$currentFile,$case,'new_ipn_acess',$mysql_server,$mysql_database,$mysql_username,$mysql_password);
break;
}


?>