	<form  action="http://ec2-176-34-162-72.eu-west-1.compute.amazonaws.com/5_02/ajax.php" method="POST" id="form_location">
  <input  id="forgotten_password" name="forgotten_password" value=""/>
  <input id="verify_signup" name="verify_signup" value=""/>
  <input  type="submit" name="submit" value="Αποστολή"  onKeyPress="return disableEnterKey(event)"/>
</form>
<?php

include 'scripts.html';

header('Content-Type: text/html; charset=UTF-8');




$GET_forgotten_password=$_GET['forgotten_password'] ;
$GET_forgotten_password = trim($GETforgotten_password);
$GET_forgotten_password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $GET_forgotten_password);
if($GET_forgotten_password<>''){
$GET_empty=1;
echo ("<script type='text/javascript'>");// to pass need to be at head
echo ("window.forgotten_password = '$GET_forgotten_password';");
echo ("$('#forgotten_password').val(window.forgotten_password);");
echo ("$('#verify_signup').val(window.verify_signup);");
echo ("document.forms['form_location'].submit();");

echo ("</script>");
}
$GET_verify_signup=$_GET['verify_signup'] ;
$GET_verify_signup = trim($GET_verify_signup);
$GET_verify_signup = preg_replace("/[^a-zA-Z0-9\s]/", " ", $GET_verify_signup);
if($GET_verify_signup<>''){
$GET_empty=1;
echo ("<script type='text/javascript'>");
echo ("$(form).attr('action', '/test/Delete')");
       echo (".attr('method', 'post');");
echo ("$(form).html('<input type='hidden' name='id' value='' + myid + '' />'");
echo ("document.body.appendChild(form);");
echo ("$(form).submit();");
echo ("document.body.removeChild(form);");

echo ("window.verify_signup = '$GET_verify_signup';");

echo ("$('#verify_signup').val(window.verify_signup);");
echo ("window.onload = function(){");
echo ("$('#form_location').submit();");
echo ("}");
echo ("var form = document.createElement('form');");

echo ("</script>");
}
?>

