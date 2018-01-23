<?php
include'ip_referrer.php';
include'/var/www/outside_root/credits.php';

$refferer = $_SERVER['HTTP_REFERER'];
$refferer  = strtok($refferer, '?');
$forgotten_password=$_POST['forgotten_password'] ;
$forgotten_password = trim($forgotten_password);

$forgotten_password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $forgotten_password);

$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$mysql = "SELECT user FROM users WHERE change_password=? ";
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$forgotten_password", PDO::PARAM_STR);

if (!$sq->execute()) {
echo 'Σφάλμα σύνδεσης.';
}
$count = $sq->rowCount();
if($count > 0){
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$db = NULL ;
}}
else
{
  $failed_mysql_1=1;

$db = NULL ;

}
include"security.php";
if($failed_mysql_1==1){
echo ("<script type='text/javascript'>");
echo ("window.rellocation ='1' ;");
echo ("window.currentFile ='$currentFile' ;");
echo ("</script>");
}
?>
<script type='text/javascript'>
										if (window.rellocation=="1")
					{
					window.location=('<?php echo strtok($refferer, '?'); ?>');


					}
					else
					{
					
					}
					</script>