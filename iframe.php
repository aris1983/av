<?php

$curl = curl_init();
$timeout = 30;
$ret = "";
$url="www.tube8.com/erotic/celeb-sex-tapes/2054461/";
curl_setopt ($curl, CURLOPT_URL, $url);
curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($curl, CURLOPT_MAXREDIRS, 20);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5");
curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
$text = curl_exec($curl);
$text2 = preg_replace("www.tube8.com", "http://ec2-176-34-162-72.eu-west-1.compute.amazonaws.com/05_03", $text);

echo $text;
echo $text2;
?>