<?php
include'ip_referrer.php';

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

<?php
include'extra_navigation.php';
?>
<br>

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

<div id= 'arrow'>
<center>
<img id="lefticon" src="images/left.png" width="10%" height="10%" onclick="left('','','','','')" style="cursor:pointer;"\>
<img id="righticon" src="images/right.png" width="10%" height="10%" onclick="right('','','','','')" style="cursor:pointer;"\>
</div>
<div id= 'table3'>
<?php
echo("<p id='mysqlstatus'  class=\"$casemysql\" style='display: none;'>$casemysql</p>");
echo("<p id='forwardicons'  class=\"$icons_to_forward_2\"style='display: none;'>$icons_to_forward_2</p>");
echo("<p id='leftright'  class=\"$leftright\" style='display: none;'>$leftright</p>");
echo("<p id='currenticons' class=\"$MAXIMUM_ICONS\"style='display: none;'>$MAXIMUM_ICONS</p>");
echo("<p id='numberoficons' class=\"$imagesdisplayed\"style='display: none;'>$imagesdisplayed</p>");
?>
<div id="boxes" style=" overflow:visible">
<div id="dialog" class="window">
</div>
<div id="dialog1" class="window" style=" width:90%;overflow:visible">
<table style=" width:100%;overflow:visible">
<tr  >
<div id="uppertrailer" > 
<br>
<center>
<a class="close" page="" actors="" description="" href='javascript: close()' style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Κλείσιμο!</font></a>
<a class="description" page="" actors="" description="" href='javascript: description()'style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Περιγραφή!</font></a>
<a class="comments" page="" actors="" description="" href='javascript: comments4()'style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Σχόλια!</font></a>
<a class="trailer" actors="" page="" description="" href='javascript: trailer()'style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Trailer!</font></a>
<a class="buy2" actors="" page="" description="" href='javascript:buy2()'style="cursor:pointer;border: 1px solid ;border-color:red;"><font  color='red'>Αγορά!</font></a>
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
<div id="dialog3" class="window" >
<a class="close" page="" actors="" description="" href='javascript: close()' style="cursor:pointer;"><font ' color='red'>Κλείσιμο!</font></a>
<a class="description" page="" actors="" description="" href='javascript: description()'><font  color='red'>Περιγραφή!</font></a>
<a class="trailer" actors="" page="" description="" href='javascript: trailer()'><font  color='red'>Trailer!</font></a>
<a class="buy2" actors="" page="" description="" href='javascript:buy2()'><font  color='red'>Αγορά!</font></a>
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


