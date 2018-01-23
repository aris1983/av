<script language="JavaScript">

function disableEnterKey(e)
{
     var key;     
     if(window.event)
          key = window.event.keyCode; //IE
     else
          key = e.which; //firefox     

     return (key != 13);
}

</script>
<?php
//include 'ip_referrer.php';
echo ("<script type='text/javascript'>");
	echo ("if (window.bought){");
 echo ("$(document).ready(function(){");
echo ("searchbutton2();");
	echo ("});");
		echo ("};");
	echo ("</script>");
 include'mobile/detectmobilebrowser.php';
 include'mobile/detectmobilebrowser2.php';

$forgotten_password=$_POST['forgotten_password'] ;
$forgotten_password = trim($forgotten_password);
$forgotten_password = preg_replace("/[^a-zA-Z0-9\s]/", " ", $forgotten_password);
if(isset($forgotten_password)&&!empty($forgotten_password)){
include 'change_password2.php';
echo ("<script type='text/javascript'>");
echo ("$(document).ready(function(){");
echo ("hide_below_options();");
	echo ("});");
echo ("</script>");
}
?>
<?php
$verify_signup=$_POST['verify_signup'] ;
$verify_signup = trim($verify_signup);
$verify_signup = preg_replace("/[^a-zA-Z0-9\s]/", " ", $verify_signup);
if(isset($verify_signup)&&!empty($verify_signup)){
include 'verify_signup2.php';
echo ("<script type='text/javascript'>");

echo ("</script>");
}
?>

<?php
$width=$_POST[width];/// δθλεθι και χορις ''
$width = trim($width);
$width = preg_replace("/[^a-zA-Z0-9\s]/", " ", $width);
$height=$_POST[height];
$height = trim($height);
$height = preg_replace("/[^a-zA-Z0-9\s]/", " ", $height);
$casemysql=$_POST[casemysql];
$casemysql = trim($casemysql);
$casemysql = preg_replace("/[^a-zA-Z0-9\s]/", " ", $casemysql);
if (empty($casemysql)) {
$casemysql="movies";
}
$icons_to_forward_2=$_POST[icons_to_forward_2];
$icons_to_forward_2 = trim($icons_to_forward_2);
$icons_to_forward_2 = preg_replace("/[^a-zA-Z0-9\s]/", " ", $icons_to_forward_2);
if (empty($icons_to_forward_2)) {
$icons_to_forward_2="0";
}
$leftright=$_POST[leftright];
$leftright = trim($leftright);
$leftright = preg_replace("/[^a-zA-Z0-9\s]/", " ", $leftright);
if (empty($leftright)) {
$leftright="0";
}
?>

<div id= 'page'>
<div >
<ul id="nav">
<center>
<li><button class="selected" style="cursor:pointer;font-size: 20pt;">Options</button>
<ul id="options">
<table border="1">
<tr>
<td><li><p id='suggested' onclick="ajax1('suggested','','')" style="cursor:pointer;" style='display: none;' >Starting Page</p></li></td>
<!-- <td><li><p id='actorsmovies' onclick="ajax1('actorsmovies','Α','Ά')" style="cursor:pointer;">Ηθοποιοί</p></li></td> 
<td><li><p id='categorymovies' onclick="ajax1('categorymovies','Περιπέτεια','')" style="cursor:pointer;">Categories</p></li></td> -->
<td><li><p id='categorymovies' onclick="mymovies_login()" style="cursor:pointer;">My Account - Buy / Sell</p></li></td>
<td><li><p id='categorymovies' onclick="OpenInNewTab();" style="cursor:pointer;">Statistics</p></li></td>

<!--<td><li><p id='namemovie' onclick="ajax1('namemovie','','')" style="cursor:pointer;">Όνομα Ταινίας</p></li></td>--> 
<!--<td><li><p id='chronological' onclick="ajax1('chronological','00','')" style="cursor:pointer;">Χρονολογία</p></li></td>-->
</tr>
<tr>
<td><li><p id='' onclick="titledisplay()" style="cursor:pointer;">Show/Hide Name</p></li></td>
<!--<td><li><p id='' onclick="search()" style="cursor:pointer;">Εύρεση</p></li></td>
<td><li><p id='' onclick="mymovies_login()" style="cursor:pointer;">My Account</p></li></td>-->
<td><li><p id='' onclick="contact()" style="cursor:pointer;">Contact</p></li></td>
<td ><li><p id='signout' onclick="signout()" style="cursor:pointer;" style='display: none;' >Sign Out</p></li></td>

</tr>
</table>
</ul>
</center>        
<div class="clear"></div>
</li>
</ul>
</div>
<div id= 'search'>
</div>

<div id='loginhtml' style='display: none;'>
<?php
$s = html_entity_decode(strip_tags($_POST['titlename']));
$s = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name);
?>

<div class="mail">  
<div class="response">
</div> 
<ul id='form_ajax_1st_page'>  
<br>

<li id='desc1' style='display: inline-block;'>Email address</li> 
<li><form><input type='text' id='text1' name='text1' maxlength="40" onKeyPress="return disableEnterKey(event)" /></form><p id='alert1' style='display: none;'>Wrong email address.</p></li>
 
<li id='desc2'>Password</li>
<li><input type='password' id='text2' name='text2' maxlength="20" onKeyPress="return disableEnterKey(event)"/><p id='alert2' style='display: none;'>Your password must be at least 6 characters and only english characters.</p></li>  
<li ><li id='desc3' style='display: none;'>Please rewrite your password</li><input type='password' id='text3' name='text3' maxlength="20" style='display: none;' onKeyPress="return disableEnterKey(event)"/><p id='alert3' style='display: none;'>Passwords must match¨.</p></li>

<li><button id='option1' onclick="login()" style='display: none;'>Press here to login</button></li>  
<li><button id='option2' onclick="forgottenpassword()" >Press here if you have forgotten your password</button></li> 
<li><button id='option3' onclick="signup()" >Press here to signup</button></li>  
<li>&nbsp;</li>  
<li id='submit1' class="submit"><input type="submit" name="submit" value="Sent" onclick="button_login()" onKeyPress="return disableEnterKey(event)"/></li>  
<li id='submit2' style='display: none;' class="submit"><input type="submit" name="submit" value="Sent" onclick="button_signup()" onKeyPress="return disableEnterKey(event)"/></li>  
<li id='submit3' style='display: none;' class="submit"><input type="submit" name="submit" value="Sent" onclick="button_forgotten_password()" onKeyPress="return disableEnterKey(event)"/></li>  
<li>&nbsp;</li>  
</ul> 
<ul id='contact_form' style='display: none;'>  
<br>
<li id='desc4'>Email address</li> 
<li><form><input type='text' id='text1comment' name='text1' maxlength="40" onKeyPress="return disableEnterKey(event)"/> </form><p id='alert_contact' style='display: none;'>Wrong email address.</p></li>  
<li id='desc5'>Comment</li>
<li><textarea type='text' id='text2comment' cols="20" rows="5" name='text2' maxlength="160" style='font-size: 20pt;' onKeyPress="return disableEnterKey(event)"></textarea><p id='alert_contact_2' style='display: none;'>The comment must not be blank.</p></li>  
<li>&nbsp;</li>  
<li id='submit' class="submit"><input type="submit" name="submit" value="Sent" onclick="button_contact()" onKeyPress="return disableEnterKey(event)"/></li> 
<li><p id='msgsent' style='display: none;'>Message sent.</p></li> 
<li>&nbsp;</li>  
</ul>
 
</div>  
</div>

<ul>
<div id='msg_response'> </div>
</ul>
<br>



<div id='ajax_tables'>
<?php
//include'extra_navigation.php';
?>
<br>
<div id= 'table2'>
<div id= 'tablenext'>
<?php
include 'table2/2ndpage/table2.php';
?>
</div>
<div id= 'tableprevious'>
</div>
<div id= 'tablecurrent'>
<?php
include 'table2.php';
?>
</div>
</div>
</div>
<div id= 'arrow'>
<center>
<img id="lefticon" src="images/left.png" width="10%" height="10%" onclick="left('','','','','')" style="cursor:pointer;"\>
<img id="righticon" src="images/right.png" width="10%" height="10%" onclick="right('','','','','')" style="cursor:pointer;"\>
</center>
</div>
<div id= 'my_sql_arrows_icons'>

<?php
echo("<p id='mysqlstatus'  class=\"$casemysql\" style='display: none;'>$casemysql</p>");
echo("<p id='forwardicons'  class=\"$icons_to_forward_2\"style='display: none;'>$icons_to_forward_2</p>");
echo("<p id='leftright'  class=\"$leftright\" style='display: none;'>$leftright</p>");
echo("<p id='currenticons' class=\"$MAXIMUM_ICONS\"style='display: none;'>$MAXIMUM_ICONS</p>");
echo("<p id='numberoficons' class=\"$imagesdisplayed\"style='display: none;'>$imagesdisplayed</p>");
?>
</div>
</div>
<div id= 'table3'>

<div id="boxes" style=" overflow:visible">
<div id="dialog" class="window">
</div>
<div id="dialog1" class="window" style=" width:90%;overflow:visible">
<table style=" width:100%;overflow:visible">
<tr  >
<div id="uppertrailer" > 
<br>
<center>
<a class="close" page="" actors="" description="" href='javascript: close_without_animation()' style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Close</font></a>
<a class="description" page="" actors="" description="" href='javascript: description()'style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Description!</font></a>
<a class="comments" page="" actors="" description="" href='javascript: comments()'style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Comments!</font></a>
<a class="trailer" actors="" page="" description="" href='javascript: trailer()' style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Trailer!</font></a>
<a class="movie" actors="" page="" description="" href='javascript: trailer()'  style='display:none;cursor:pointer;border: 1px solid ;border-color:red;'><font  color='red'>Movie!</font></a>
<a class="buy2" actors="" page="" description="" href='javascript:buy_login()'style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Show!</font></a>
<p id='describe'   style='display: none;text-align:left'><font size='3' color='red'style="cursor:pointer;border: 1px solid ;border-color:red;"> </font> </p>
</center>
<br>
</div>
</tr>
<tr>
<div id="DivIframe" style=" ">
<div id='mediaspace' ></div>
</div> 
</tr>
</table>
</div>
<div id="dialog2" class="window">
<img src="" id="enlarge" top="10%" left="0px"  width="100px" height="200px" /> 
</div>
<div id="dialog3" class="window"  color='red'>Close</font></a>
<a class="description" page="" actors="" description="" href='javascript: description()'><font  color='red'>Description</font></a>
<a class="trailer" actors="" page="" description="" href='javascript: trailer()'><font  color='red'>Trailer!</font></a>
<a class="movie" actors="" page="" description="" href='javascript: trailer()'style='display:none;cursor:pointer;border: 1px solid ;border-color:red;'><font  color='red'>Movie!</font></a>
<a class="buy2" actors="" page="" description="" href='javascript:buy_login()'><font  color='red'>Show</font></a>
<div id="DivIframe2">
<iframe id="dialog5" page='100' width="100%" height="1900" top="10%" left="100px" scrolling="auto" src=""></iframe> </div>
</div>
<div id="blur" class="window">
<center>
<img id='waitwindow'  src='images/ajax-loader.gif' />
</center>
</div>
<div id="mask"></div>
</div>
<div id="log"></div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
 		window.leftright = $('#leftright').attr("class");
 		window.forwardicons2 = $('#forwardicons').attr("class");
		window.currenticons2 = $('#currenticons').attr("class");
		window.mysqlstatus2 = $('#mysqlstatus').attr("class");
		window.numberoficons2 = $('#numberoficons').attr("class");
$('#lefticon').hide(0);
$('#righticon').hide(0);
if (window.leftright == 2) {
		$('#lefticon').show(0);
}
if (parseInt(window.currenticons2,10) < parseInt(window.forwardicons2,10)) {
		$('#lefticon').show(0);
}

if (window.numberoficons2 == window.currenticons2) {
		$('#righticon').show(0);
}
if (window.leftright == 1) {
		$('#righticon').show(0);
}});
$('#nav li').click(
        function (event) {
            $('#options').stop().slideToggle(100);
        });
  
$(document).click(function(event) { 
    if($(event.target).parents().index($('#nav li')) == -1) {
        if($('#options').is(":visible")) {
            $('#options').hide();
        }}})
</script>


