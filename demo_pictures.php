<?php
//include'ip_referrer.php';

$sql = $sql -1;
for($k = 1; $k <= $number_of_rows; $k++) {
if ($sql <= ($k*$number_of_columns) ){
$number_of_rows = $k;
}}
for($k = 1; $k <= $number_of_columns; $k++) {
if ($sql <= $k ){
$number_of_columns = $k;
}}
switch ($casemysql)
{
case "actorsmovies":
echo("<table class=\"table\" id=\"current\" align=\"center\" minicon=\"1\"  maxicon='$number_of_columns' maximum_icons_page='$total_icons'>");
for ($two = 1; $two <= $number_of_rows; $two++) {
echo("<tr>");
for ($i = 1; $i <= $number_of_columns; $i++) {
echo("<center>");
echo("<td style=\"padding-top: 10px ; padding-left: 10px\">");
echo("<center>");
if ($My_Array_poster[$i]=='http://s3-eu-west-1.amazonaws.com/avtestaris/KANENAAPAOTELESMA.png'){
echo("<img src=\"$My_Array_poster[$i]\" width=\"$icon_width px\" height=\"$icon_height px\" last='yes'/>");
}
elseif($My_Array_poster[$i]==''){
}
else{
echo("<img src=\"$My_Array_poster[$i]\" actor=\"$My_Array_title[$i]\" title=\"$My_Array_title[$i]\" width=\"$icon_width px\" height=\"$icon_height px\"  onclick=\"ajax1('actormovie','$My_Array_title[$i]','$My_Array_title[$i]')\"  style='cursor:pointer;'/>");
}
echo("</center>");
echo("</td>");
echo("</center>");
}
echo("</tr>");
}
echo("<tr>");
for ($i2 = 1; $i2 <= $number_of_columns; $i2++) {
if($My_Array_poster[$i2]=='http://s3-eu-west-1.amazonaws.com/avtestaris/KANENAAPAOTELESMA.png'){
}else{
echo("<th id=\"displaytitle\" style=\"display: none;border:1px solid #C0C0C0;\">$My_Array_title[$i2]</th>");
}}
echo("</tr>");
echo("</table>");
break;
default:
$from_forwaded = ($number_of_columns+$icons_to_forward_2);
echo("<table class=\"table\" id=\"current\" align=\"center\" minicon=\"1\"  from_forwaded='$from_forwaded' from_forwaded_right='$from_forwaded' maxicon='$number_of_columns' maximum_icons_page='$total_icons'>");
for ($two = 1; $two <= $number_of_rows; $two++) {
echo("<tr>");
for ($i = 1; $i <= $number_of_columns; $i++) {
echo("<center>");
echo("<td style=\"padding-top: 10px ; padding-left: 10px\">");
echo("<center>");
if ($My_Array_poster[$i]=='http://s3-eu-west-1.amazonaws.com/avtestaris/KANENAAPAOTELESMA.png'){
echo("<img  src=\"$My_Array_poster[$i]\" width=\"$icon_width px\" height=\"$icon_height px\" last='yes'/>");
}
elseif($My_Array_poster[$i]==''){
}
else{
echo("<img src=\"$My_Array_poster[$i]\"  id=\"page$i\" width=\"$icon_width px\" height=\"$icon_height px\" class=\"$My_Array_trailer[$i]\" description=\"$My_Array_description[$i]\" actors=\"$My_Array_actors[$i]\" comment=\"$My_Array_comment[$i]\" year=\"$My_Array_year[$i]\" price=\"$My_Array_price1[$i]\" title=\"$My_Array_title[$i]\" category=\"$My_Array_category[$i]\"onclick=\"animatee('#page$i','#dialog2','#enlarge','#playerid','#dialog1')\" style='cursor:pointer;' />");
}
echo("</center>");
echo("</td>");
echo("</center>");
}
echo("</tr>");
}
echo("<tr>");
for ($i2 = 1; $i2 <= $number_of_columns; $i2++) {
if($My_Array_poster[$i2]=='http://s3-eu-west-1.amazonaws.com/avtestaris/KANENAAPAOTELESMA.png'){
}else{
echo("<th id=\"displaytitle\" style=\"display: none;border:1px solid #C0C0C0;\">$My_Array_title[$i2]</th>");
}}
echo("</tr>");
echo("</table >");
break;
}
$icons_to_forward_2 = $sql + $icons_to_forward_2;
$MAXIMUM_ICONS = $total_icons;
$imagesdisplayed = $sql;


?>