
<?php
include'ip_referrer.php';

switch ($casemysql)
{





case "categorymovies":
echo("<table cellpadding=\"0\" cellspacing=\"0\" id ='extra_navigation1' border=\"1\" width=\"90%\" height=\"5%\" align=\"center\" >");
echo ("<th><div width=\"100%\"  class=\"contentcat\"  id=\'categorymovies\' onclick=\"ajax1('','')\" style=\"cursor:pointer;\" >Diagrams</div></th>");
echo ("<th><div class=\"content\"  id=\'categorymovies\' onclick=\"OpenInNewTab();\" style=\"cursor:pointer;\" >Statistics</div></th>");
echo ("<th><div class=\"content\"  id=\'categorymovies\' onclick=\"mymovies_login();\" style=\"cursor:pointer;\" >Buy / Sell</div></th>");
echo("</table>"); 
break;


}
?>