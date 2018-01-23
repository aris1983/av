<?php
include'ip_referrer.php';

$icon_width = 230;
$icon_height = 260;
$allowed_height =  $height * 0.9;
$allowed_height = floor($allowed_height);
$allowed_width =  $width * 0.9;
$allowed_width = floor($allowed_width);
$number_of_columns = $allowed_width/$icon_width;
$number_of_rows = $allowed_height/$icon_height;
$number_of_columns = floor($number_of_columns); 
$number_of_rows = 1;
$total_icons = $number_of_rows * $number_of_columns;
$total_icons_2_tables = $total_icons + $total_icons;
?>