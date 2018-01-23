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
include 'table2/3rdpageleft/table2.php';
?>

