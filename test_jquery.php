<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
<?php

include'banned_ips.php';

include 'js.php';
include 'js_check.php';
include 'js_mymovies.php';
include 'js_buy.php';
include 'js_options.php';
include 'js_boxes.php';
include 'js_player.php';
include 'js_mobile.php';

include 'scripts.html';



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
				echo ("$('#msg_response').prepend('<p>Sa? pa?a?a???µe ?a ???s?µ?p???sete google chrome ,?, ?a a?aßa?µ?sete t?? Internet Explorer se ??d?s? >=9.</p>');");
echo ("alert('Sa? pa?a?a???µe ?a ???s?µ?p???sete google chrome ,?, ?a a?aßa?µ?sete t?? Internet Explorer se ??d?s? >=9.');");	
	}
				echo ("if (data.error === true)");
				echo ("$('#demoForm').show(0);");
				echo ("},");
				echo ("error : function(XMLHttpRequest, textStatus, errorThrown) {");
				echo ("$('#waiting').hide(0);");
				echo ("$('#message').removeClass().addClass('error')");
					echo (".text('?a?a?a?? pe??µ??ete.').show(0);");
				echo ("$('#demoForm').show(0);");
			echo ("}");
		echo ("});");	
		echo ("return false;");
	echo ("});");
echo ("</script>");
?>


</head>
<body>

<?php
echo $mysql_server;

//  PDO

$db = new PDO('mysql:dbname=movies;host=localhost', 'root', '');
$result = $db->query("show tables");
while ($row = $result->fetch(PDO::FETCH_NUM)) {
    var_dump($row[0]);
}


//  AJAX




//  AJAX  2
?>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.ajax({url: "titles.php", success: function(result){
            $("#div1").html(result);
        }});
    });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

<?php


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
				echo ("$('#msg_response').prepend('<p>Sa? pa?a?a???µe ?a ???s?µ?p???sete google chrome ,?, ?a a?aßa?µ?sete t?? Internet Explorer se ??d?s? >=9.</p>');");
echo ("alert('Sa? pa?a?a???µe ?a ???s?µ?p???sete google chrome ,?, ?a a?aßa?µ?sete t?? Internet Explorer se ??d?s? >=9.');");	
	}
				echo ("if (data.error === true)");
				echo ("$('#demoForm').show(0);");
				echo ("},");
				echo ("error : function(XMLHttpRequest, textStatus, errorThrown) {");
				echo ("$('#waiting').hide(0);");
				echo ("$('#message').removeClass().addClass('error')");
					echo (".text('?a?a?a?? pe??µ??ete.').show(0);");
				echo ("$('#demoForm').show(0);");
			echo ("}");
		echo ("});");	
		echo ("return false;");
	echo ("});");
	echo ("</script>");
	
	
	
?>
	

