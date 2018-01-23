<?php
//include'ip_referrer.php';

echo ("<script type='text/javascript'>");
echo (" function get_string() {");
echo ("window.verify_signup = '$verify_signup';");

echo ("};");
echo ("</script>");
?>
<div id="message_verify_signup">
</div> 
<script>
$(document).ready(function(){
get_string();
document.body.style.opacity=0.5;
$('#message_verify_signup').empty();
	$.ajax({
			type : 'POST',
			url : 'ajax_verify_signup.php',
			dataType : 'json',
			data: {		
				verify_signup : window.verify_signup
				},
				success : function(data){
document.body.style.opacity=1;
if (data.error === true){
$('#message_verify_signup').prepend(data.msg);
}
if (data.error === false){
$('#message_verify_signup').prepend(data.msg);
$('#signout').show();
window.login_string = data.login_string;
}},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
document.body.style.opacity=1;
$('#msg_response').prepend('<p>Απέτυχε.</p>');
			}});		
		return false;
		$('#message_verify_signup').show();
});
</script>
