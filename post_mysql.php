<?php

include'ip_referrer.php';

switch ($casemysql)
{
case "search":
$name = html_entity_decode(strip_tags($_POST['name']));
$name = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name);
$name2 = html_entity_decode(strip_tags($_POST['name2']));
$name2 = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name2);
$name = trim($name);
$name2 = trim($name2);
$name=urldecode($name);
$name2=urldecode($name2) ;

if ($name==''){
$name = 'Α';
$name2 = 'Ά';
}
break;

case "actormovie":
$name = html_entity_decode(strip_tags($_POST['name']));
$name = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name);
$name2 = html_entity_decode(strip_tags($_POST['name2']));
$name2 = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name2);
$name = trim($name);
$name2 = trim($name2);
$name=urldecode($name);
$name2=urldecode($name2) ;

if ($name==''){
$name = 'Α';
$name2 = 'Ά';
}
break;

case "actorsmovies":
$name = html_entity_decode(strip_tags($_POST['name']));
$name = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name);
$name2 = html_entity_decode(strip_tags($_POST['name2']));
$name2 = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name2);
$name = trim($name);
$name2 = trim($name2);
$name=urldecode($name);
$name2=urldecode($name2) ;
if ($name==''){
$name = 'Α';
$name2 = 'Ά';
}
break;

case "chronological":
$date = html_entity_decode(strip_tags($_POST['name']));
$date = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $date);
if (empty($date)) {
$date="10";

}
if ($date<59){
$date="20$date" ;
$date2=($date + 10) ;
}
else{
$date="$date" ;
$date2=($date + 10) ;
}
$name=$date;
$name2=$date2; 
break;

case "categorymovies":
$cat = html_entity_decode(strip_tags($_POST['name']));
$cat = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $cat);
if (empty($cat)) {
$cat="Περιπέτεια";
$name=$cat;
}
$name=$cat;

break;

case "namemovie":
$name = html_entity_decode(strip_tags($_POST['name']));
$name = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name);
$name2 = html_entity_decode(strip_tags($_POST['name2']));
$name2 = preg_replace("/[^!,''?;()*&%$@0-9A-Za-zΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ\s]/", " ", $name2);
$name = trim($name);
$name2 = trim($name2);
$name=urldecode($name);
if (empty($name)) {
$name = 'Α';
$name2 = 'Ά';
}
$name=$name;
$name2=$name2;
break;
}

$icons_to_forward_2=$_POST['icons_to_forward_2'] ;/// needs filter
$MAXIMUM_ICONS=$_POST['MAXIMUM_ICONS'] ;

$icons_to_forward_2 = trim($icons_to_forward_2);
$icons_to_forward_2 = preg_replace("/[^a-zA-Z0-9\s]/", " ", $icons_to_forward_2);

$MAXIMUM_ICONS = trim($MAXIMUM_ICONS);
$MAXIMUM_ICONS = preg_replace("/[^a-zA-Z0-9\s]/", " ", $MAXIMUM_ICONS);



if (empty($icons_to_forward_2)){
$icons_to_forward_2=0;
}
if (empty($MAXIMUM_ICONS)){
$MAXIMUM_ICONS=0;
}
if ($icons_to_forward_2 < 1){
$icons_to_forward_2=0;
}
if ($MAXIMUM_ICONS < 1){
$MAXIMUM_ICONS=0;
}

?>
