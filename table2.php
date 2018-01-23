	<script>
if(window.title_visible=='yes'){
$('[id=displaytitle]').show();
}
</script>

<?php
//include'ip_referrer.php';
include'/var/www/outside_root/credits.php';



if (!isset($width)) {
$width=1720;
$height=1080;
}
include'post_mysql.php';
$currentFile = $_SERVER["PHP_SELF"];///do i need escaping ??
$parts = Explode('/', $currentFile);
$page_url =$parts[count($parts) - 1];
$page = 1;
$sql = 1;
$rows = 1;
$first = 1;
include 'demo_mysql.php';
$My_Array_title[] = array();
$My_Array_poster[] = array();
$My_Array_title[0] = '';
$My_Array_poster[0] = '';
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_database", "$mysql_username", "$mysql_password",
  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$MAXIMUM_ICONS = $MAXIMUM_ICONS ;

switch ($casemysql)
{
case "mymovies":





case "movies":
if($mobile=='ok'){
$mysql = "SELECT title,posterurl,rokutrailer, description, price1,price24,pricebuy,category, actors,year,comment  FROM movie2 GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons ;";//delete
}
else{
$mysql = "SELECT title,posterurl,trailer, description, price1,price24,pricebuy,category, actors,year,comment  FROM movie2 GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons ;";//delete
}
$sq = $db->prepare($mysql);
break;

case "namemovie":
if($mobile=='ok'){
$mysql = "SELECT title,posterurl,rokutrailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE title LIKE ?  GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
else{
$mysql = "SELECT title,posterurl,trailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE title LIKE ?  GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
$sq = $db->prepare($mysql);
$name = $name.'%';
$sq->bindValue(1, "$name", PDO::PARAM_STR);
break;

case "search":
if($mobile=='ok'){
$mysql = "SELECT title,posterurl,rokutrailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE title LIKE ? OR englishtitle LIKE ? ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
else{
$mysql = "SELECT title,posterurl,trailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE title LIKE ? OR englishtitle LIKE ? ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
$sq = $db->prepare($mysql);
$name_reg = ltrim($name);
$name_reg = '%'.$name_reg;
$name_reg = $name_reg.'%';
$name_reg2 = $name_reg;
$sq->bindValue(1, "$name_reg", PDO::PARAM_STR);
$sq->bindValue(2, "$name_reg2", PDO::PARAM_STR);

break;

case "categorymovies":
if($mobile=='ok'){
$mysql = "SELECT title,posterurl,rokutrailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE category= ? GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
else{
$mysql = "SELECT title,posterurl,trailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE category= ? GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$cat", PDO::PARAM_STR);
break;

case "chronological":
if($mobile=='ok'){
$mysql = "SELECT title,posterurl,rokutrailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE year BETWEEN  ? AND ? GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
else{
$mysql = "SELECT title,posterurl,trailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE year BETWEEN  ? AND ? GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
}
$sq = $db->prepare($mysql);
$sq->bindValue(1, "$date", PDO::PARAM_STR);
$sq->bindValue(2, "$date2", PDO::PARAM_STR);
break;

case "actormovie":
if($mobile=='ok'){
$mysql = "SELECT title,posterurl,rokutrailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE actors LIKE ? GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons ;";//delete
}
else{
$mysql = "SELECT title,posterurl,trailer, description, price1,price24,pricebuy,category, actors,year,comment FROM movie2 WHERE actors LIKE ? GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons ;";//delete
}
$sq = $db->prepare($mysql);
$name = ltrim($name);
$name = '% '.$name.'%';
$name = preg_replace( '/\s+/', ' ', $name ); 
$sq->bindValue(1, "$name", PDO::PARAM_STR);
break;

case "actorsmovies":
$mysql = "SELECT DISTINCT  actors,url  FROM actors WHERE actors LIKE ?  OR actors LIKE ? ORDER by actors ASC LIMIT $icons_to_forward_2,$total_icons;";//delete
$sq = $db->prepare($mysql);
$name = ltrim($name);
$name2 = ltrim($name2);

$name = '% '.$name;
$name2 = '% '.$name2;
$name = $name.'%';
$name2 = $name2.'%';

$sq->bindValue(1, "$name", PDO::PARAM_STR);
$sq->bindValue(2, "$name2", PDO::PARAM_STR);

break;

default:
if($mobile=='ok'){
$mysql = "SELECT title,posterurl,rokutrailer, description, price1,price24,pricebuy,category, actors,year,comment  FROM movie2 GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons ;";//delete
}
else{
$mysql = "SELECT title,posterurl,trailer, description, price1,price24,pricebuy,category, actors,year,comment  FROM movie2 GROUP by title ORDER by title ASC LIMIT $icons_to_forward_2,$total_icons ;";//delete
}
$sq = $db->prepare($mysql);
break;
}

if (!$sq->execute()) {
	echo "Error!";
}

$count = $sq->rowCount();
if($count == 0){
$My_Array_poster[1] = "http://s3-eu-west-1.amazonaws.com/avtestaris/KANENAAPAOTELESMA.png";
} 
while ($r = $sq->fetch(PDO::FETCH_NUM)) {
$My_Array_title[$sql] = $r[0];
$My_Array_poster[$sql] = $r[1];
$My_Array_trailer[$sql] = $r[11];
$My_Array_description[$sql] = $r[3];
$My_Array_price1[$sql] = $r[4];
$My_Array_price24[$sql] = $r[5];
$My_Array_pricebuy[$sql] = $r[6];
$My_Array_category[$sql] = $r[7];
$My_Array_actors[$sql] = $r[8];
$My_Array_year[$sql] = $r[9];
$My_Array_comment[$sql] = $r[10];

$sql = $sql + 1;
}
$sql2 = $sql - 1;	//CHANGE NAME
$db = NULL ;

echo('<div class="container" align="center">');
include 'demo_pictures.php';
?>

<script type="text/javascript">
$('#container').css('opacity', 0);
$(window).load(function() {
  $('#container').css('opacity', 1);
});
</script>