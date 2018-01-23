
<?php
include'ip_referrer.php';
 include'mobile/detectmobilebrowser.php';
 include'mobile/detectmobilebrowser2.php';
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
<div id= 'arrow'>
<center>
<img id="lefticon" src="images/left.png" width="10%" height="10%" onclick="left('','','','','')" style="cursor:pointer;"\>
<img id="righticon" src="images/right.png" width="10%" height="10%" onclick="right('','','','','')" style="cursor:pointer;"\>
</center>
</div>
<div id= 'my_sql_arrows_icons'>
<?php
echo("<p id='mysqlstatus'  class=\"$casemysql\" style='display: none;'>$casemysql</p>");//problem is that it is not inserted in ttable 3 as ajax 1st page try putting them upper one notch or in new div not to mess with next previous table ajax
echo("<p id='forwardicons'  class=\"$icons_to_forward_2\"style='display: none;'>$icons_to_forward_2</p>");
echo("<p id='leftright'  class=\"$leftright\" style='display: none;'>$leftright</p>");
echo("<p id='currenticons' class=\"$MAXIMUM_ICONS\"style='display: none;'>$MAXIMUM_ICONS</p>");
echo("<p id='numberoficons' class=\"$imagesdisplayed\"style='display: none;'>$imagesdisplayed</p>");

?>
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

</script>


