<?php
include'ip_referrer.php';

$forgotten_password=$_POST['forgotten_password'] ;
$forgotten_password = trim($forgotten_password);
$forgotten_password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $forgotten_password);
include"change_password_relocation.php";
echo ("<script type='text/javascript'>");
echo ("window.string ='$forgotten_password' ;");
echo ("</script>");
?>


<div class="mail">  
<div class="response">
</div> 
<h2></h2>  
<ul id=form_change_password2>  
<li id='desc2'>Νέος Κωδικός</li>
<li><input type='password' id='text2' name='text2' maxlength="20"/><p id='alert2' style='display: none;'>Ο κωδικός πρέπει να είναι τουλάχιστον 6 χαρακτήρες.</p></li>  
<li ><li id='desc3' >Ξαναγράψτε τον κωδικό</li><input type='password' id='text3' name='text3' maxlength="20" /><p id='alert3' style='display: none;'>Οι κωδικοί πρέπει να ταιριάζουνε.</p></li>  
<li>&nbsp;</li>  
<li id='submit3'  class="submit"><input type="submit" name="submit" value="Αποστολή" onclick="button_change_password()"/></li>  
<li>&nbsp;</li>  
</ul>  
</div>  
<script src="email-validation.js"></script>  


