

<script>

function   ajax1(mysql1,mysql2,mysql3,mysql4,mysql5) {// only need mysql1 all other are redundant
$('[class=demo]').empty();

$('#form_change_password2').hide(0);
if($('#options').is(":visible")) {
$('#options').hide(); //hide options
}
$('[id=msg_response]').empty();	
window.forwardicons = $('#forwardicons').attr("class");
window.currenticons = $('#currenticons').attr("class");
document.body.style.opacity=0.5;
$('#wrapper').appendTo('#page');
	$('#waiting').show(0);
		$('#demoForm').hide(0);
		$('#message').hide(0);	
		$.ajax({
			type : 'POST',
			url : './ajax_1st_page_2nd_try.php',//change
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : mysql1, // suggested etc
 				name : mysql2, // importance to extra navigation
				name2 : mysql3,// importance to extra navigation
 				icons_to_forward_2 : 0,//always since recalculated
				MAXIMUM_ICONS : 0 //always since recalculated
				},
				success : function(data){
								data_error_redirect(data.msg);
				$('#waiting').hide(0);
				$('#wrapper').hide();
				document.body.style.opacity=1.2;
				hide_below_options();
				$('#ajax_tables').empty();// consider having it at a lower node if possible
				$('#ajax_tables').append(data); //node found in ajax.php
				$('#ajax_tables').show();

				if (data.error === true)
				$('#demoForm').show(0);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				$('#waiting').hide(0);
				$('#message').removeClass().addClass('error')
					.text('Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε.').show(0);
				$('#demoForm').show(0);
			}});		
		return false;
	};
	
function   animatee(thisa,thisb,thisc,thisd,thise) {  //#page0..number of icon,#dialog2,#enlarge,#playerid, #dialog1 hence when altered code inly use thisa  which as a semantic doesnt make sense(denotes number of icon)
$('#table3').show();
$('[id=msg_response]').empty();
$('#search').empty(); 
options_visible_toogle(); // will be better to have a parent node that will hide all further nodes then wil ned to fix appropritely ie show in close()
$('#extra_navigation1').hide();
$('[id=message_verify_signup]').hide();
$('[id=message]').hide();
var name = $(thisa).attr("src");//s3 url
window.picture_src= name;
$('#enlarge').attr("src",name);//picture url
window.comment = $(thisa).attr("comment");// number of icon
window.imagewidth = $(thisa).attr("width");
window.imageheight = $(thisa).attr("height");
window.imagewidth = window.imagewidth.replace(/\s/g, ""); // remove the spaces from the string
window.imageheight = window.imageheight.replace(/\s/g, "");
window.imagename = $(thisa).attr("src");
window.describename = $(thisa).attr("description");
window.actorsname = $(thisa).attr("actors");
window.pricename = $(thisa).attr("price");
window.categoryname = $(thisa).attr("category");
window.yearname = $(thisa).attr("year");
window.titlename = $(thisa).attr("title");
window.comment = $(thisa).attr("comment");
$("#describe").hide();
$("#dialog2").attr("width",window.imagewidth);
$("#dialog2").attr("height",window.imageheight);
$("#enlarge").attr("width",window.imagewidth);
$("#enlarge").attr("height",window.imageheight);
$('#enlarge').attr("page",thisa);
var name = $(thisa).attr("src");
$('#enlarge').attr("src",name); // greek title hence assign
window.winH = ($(window).height()/2);
window.winW = ($(window).width()/2);
//Get the A tag
//Get the screen height and width
var maskHeight = $(document).height();
var maskWidth = $(window).width();
//Set heigth and width to mask to fill up the whole screen
$('#mask').css({'width':maskWidth,'height':maskHeight}); // mask is previous to log
//transition effect		
$('#mask').fadeIn(0);	
//Get the window height and width   - this comments are usefull for making diagramms of elements and how they are used
var winH = $(window).height();
var winW = $(window).width();
//Set the popup window to center
$(thisb).css('top',  winH/2-$(thisb).height()/2); //#dialog2
$(thisb).css('left', winW/2-$(thisb).width()/2);
//transition effect
$(thisb).fadeIn(0); 
$('#mask').hide();
var pos = $(thisa).position(); // returns an object with the attribute top and left
window.post = pos.top;  // top offset position
window.posl = pos.left; // left offset position
$(thisc).attr("style",("position:absolute; left:"+posl+"px;"+"top:"+post+"px;"));//#enlarge is inside dialog2
$('#table2').hide();
$('#arrow').hide();
$('#nav').hide();
$(thisc).animate({   width: "100%", height: "100%", left: 0, top: 0,   opacity: 0.2  }, 300, function() {
var name = $(thisa).attr("class");//#page0- number of icon 
//Get the A tag
$('.window').hide(); // inside , after #boxes multiple occurances occur dialog ..1 2 dialog3 &blur
//Get the screen height and width
var maskHeight = $(document).height();
var maskWidth = $(window).width();
//Set heigth and width to mask to fill up the whole screen
$('#mask').css({'width':maskWidth,'height':maskHeight});
//transition effect		
//Get the window height and width
var winH = $(window).height();
var winW = $(window).width();
//Set the popup window to center
$(thise).css('top',  winH/2-$(thise).height()/2);//#dialog1
$(thise).css('left', winW/2-$(thise).width()/2);//#dialog1
//transition effect
$('body').css("background-color","black");
$(thise).show(0); //#dialog1
window.trailername = $('#playerid').attr("src");
window.uppertrailer = $('#uppertrailer').outerHeight(true);	
window.lowertrailer = (((window.innerHeight || document.body.clientHeight)-window.uppertrailer));
//$('#playerid').attr("height",(((window.innerHeight || document.body.clientHeight)-window.uppertrailer)+"px;"));//thisd
window.trailerheight = $('#playerid').attr("height");
$('#mediaspace').css({'height':window.trailerheight});//after inside DivIframe which is inside table 2nd row
window.innertrailerheight = $('#mediaspace').attr("height");
if (window.mobile=='ok2'){
mobile1();
description();

}
else{
//newplayer();
description();
}	
//	window.trailerheight = $('#playerid').attr("height"),$('#mediaspace').css({'height':window.trailerheight})window.trailerheight = $('#playerid').attr("height"),$('#playerid').attr("height",(((window.innerHeight || document.body.clientHeight)-window.uppertrailer)+"px;")),window.uppertrailer = $('#uppertrailer').outerHeight(true),window.lowertrailer = (((window.innerHeight || document.body.clientHeight)-window.uppertrailer)); and others are reset thus might make up redundant
$('.trailer').hide();// in options
$('#dialog1').css("overflow","visible"); //incl uppertrailer, DivIframe, 'mediaspace
$('body').css("overflow","visible");
})};

function   right(mysql1,mysql2,mysql3,mysql4,mysql5) {//propably only mysql1 should be used
$('[id=msg_response]').empty();
$('[id=message]').hide();
$('[id=message_verify_signup]').hide();
$('#lefticon').hide(0);// have arrows instead
$('#righticon').hide(0);
$('#current').hide();
$('#next').show();
$('#tableprevious').remove();
$('#tablecurrent').attr("id","tableprevious");// need to play around need to put extra next and previous
$('#tablenext').attr("id","tablecurrent");
$('#current').attr("id","previous");
$('#next').attr("id","current");
window.name_post = $('#name_post').attr("class");
window.name2_post = $('#name2_post').attr("class");
window.forwardicons = $('#forwardicons').attr("class");
window.currenticons = $('#currenticons').attr("class");
window.mysqlstatus = $('#mysqlstatus').attr("class");
var alertstatus = $("#current").attr('maxicon'); //stupid semantics
var alertnextstatus = $("#next").attr('maxicon');
document.body.style.opacity=0.5;
$('#wrapper').appendTo('#page');
waiting_form_1();	
		$.ajax({
			type : 'POST',
			url : 'ajax_2nd_page_table.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : window.mysqlstatus,//stupid semantics
 				name : window.name_post,
				name2 : window.name2_post,
 				icons_to_forward_2 : alertstatus,//stupid semantics
				MAXIMUM_ICONS : window.name2_post,//repeated
				leftright : 2
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;
				manipulatearrows();
				$('#tablecurrent').after(data);
				option_manipulation();//fix
				if (data.error === true)
				$('#demoForm').show(0);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				$('#waiting').hide(0);
				$('#message').removeClass().addClass('error')
					.text('Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε.').show(0);
				$('#demoForm').show(0);
			}});
		return false;
	};

function   left(mysql1,mysql2,mysql3,mysql4,mysql5) {//propably only mysql1 should be used
$('[id=msg_response]').empty();
$('[id=message]').hide();
$('[id=message_verify_signup]').hide();
$('#lefticon').hide(0);
$('#righticon').hide(0);
$('#current').hide();
$('#previous').show();
$('#tablenext').remove();
$('#tablecurrent').attr("id","tablenext");
$('#tableprevious').attr("id","tablecurrent");
$('#current').attr("id","next");
$('#previous').attr("id","current");
var minstatus = $("#current").attr('minicon');
var minpreviousstatus = $("#current").attr('minicon');
if (minpreviousstatus > 1) {
window.name_post = $('#name_post').attr("class");
window.name2_post = $('#name2_post').attr("class");
window.forwardicons = $('#forwardicons').attr("class");
window.currenticons = $('#currenticons').attr("class");
window.mysqlstatus = $('#mysqlstatus').attr("class");
window.numberoficons = $('#numberoficons').attr("class");
window.totalminusicons = parseInt(window.numberoficons,10) + parseInt(window.currenticons,10);
window.forwardminusicons = parseInt(window.forwardicons,10) - parseInt(window.totalminusicons,10);
document.body.style.opacity=0.5;
$('#wrapper').appendTo('#page');
waiting_form_1();	
		$.ajax({
			type : 'POST',
			url : 'ajax_2nd_page_table_left.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : window.mysqlstatus,
 				name : window.name_post,
				name2 : window.name2_post,
 				icons_to_forward_2 : minpreviousstatus,
				MAXIMUM_ICONS : window.currenticons,
				leftright : 1//stupid semantics
				},
				success : function(data){
								data_error_redirect(data.msg);
				waiting_form_2();
				document.body.style.opacity=1.2;
				manipulatearrows();
				$('#tablecurrent').after(data);
				option_manipulation();
				setTimeout(manipulatearrows(), 3000);
				if (data.error === true)
				$('#demoForm').show(0);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				$('#waiting').hide(0);
				$('#message').removeClass().addClass('error')
					.text('Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε.').show(0);
				$('#demoForm').show(0);
			}});		
		return false;
}
manipulatearrows();
};

function forgottenpassword(){
options_visible_toogle();
/*
$('[id=desc2]').hide();
$('[id=text2]').hide();
$('[id=desc3]').hide();
$('[id=text3]').hide();
$('[id=option1]').show();
$('[id=option2]').hide();
$('[id=option3]').show();
$('[id=submit1]').hide();
$('[id=submit2]').hide();
$('[id=submit3]').show();
$('[id=alert1]').hide();
$('[id=alert2]').hide();
$('[id=alert3]').hide();
*/
//button_contact();
contact();
};

function signup(){
options_visible_toogle();

$('[id=desc2]').show();
$('[id=text2]').show();
$('[id=desc3]').show();
$('[id=text3]').show();
$('[id=option1]').show();
$('[id=option2]').show();

$('[id=option3]').hide();
$('[id=submit1]').hide();

$('[id=submit2]').show();
$('[id=submit3]').hide();
$('[id=alert1]').hide();
$('[id=alert2]').hide();
$('[id=alert3]').hide();
};

function login(){
options_visible_toogle();
$('[id=desc2]').show();
$('[id=text2]').show();
$('[id=desc3]').hide();
$('[id=text3]').hide();
$('[id=option1]').hide();
$('[id=option2]').show();
$('[id=option3]').show();
$('[id=submit1]').show();
$('[id=submit2]').hide();
$('[id=submit3]').hide();
$('[id=alert1]').hide();
$('[id=alert2]').hide();
$('[id=alert3]').hide();
};

function manipulatearrows() {
 
$('[id=message_verify_signup]').hide();
$('[id=message]').hide();
$('[class=response]').hide();
var current_maxicon = $("#current").attr('maxicon');
var current_minicon = $("#current").attr('minicon');
var current_nonexisticon = $("img").attr('src');//stupid semantics


$('#righticon').hide(0);
if (current_minicon < 2) {
$('#lefticon').hide(0);
$('#righticon').show(0);
}
if (current_minicon > 1) {
$('#lefticon').show(0);
$('#righticon').show(0);
}
if (current_minicon == current_maxicon) {
$('#righticon').hide(0);
if (current_minicon >1) {
$('#lefticon').hide(0);				
}}
var maximum_icons_page = $("#current").attr('maximum_icons_page');
var maximum_icons_page = parseInt(maximum_icons_page,10) - parseInt(1,10);
var total_difference_icons_page = parseInt(current_maxicon,10) - parseInt(current_minicon,10);//stupid semantics
if (total_difference_icons_page < maximum_icons_page) {
$('#righticon').hide(0);			
}
if (total_difference_icons_page == '0') {
$('#righticon').show(0);
}
if (maximum_icons_page == '0') {
if (current_minicon == '2') {
$('#lefticon').show(0);				
}}
if (current_nonexisticon == 'http://s3-eu-west-1.amazonaws.com/avtestaris/KANENAAPAOTELESMA.png') {
$('#righticon').hide(0);
}
var last = $("#current img").attr('last');//stupid semantics
if (last == 'yes') {
$('#righticon').hide(0);
}
};

function waiting_form_1() { 
$('#waiting').show(0);
$('#demoForm').hide(0);
$('#message').hide(0);
};

function waiting_form_2() { 
$('#waiting').hide(0);
$('#wrapper').hide();
};

function hide_below_options(){
$('#msg_response').empty();
$('[id=message_verify_signup]').hide();
$('[id=search]').hide();
$('[id=loginhtml]').hide();
$('[id=ajax_tables]').hide();
$('[id=table3]').hide();
$('[id=wrapper]').hide();
}	
</script>

<?php

function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    }    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }  
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

// now try it
$ua=getBrowser();
$browser =  $ua['name'];
$version =$ua['version'];
if ($browser == 'Internet Explorer'){
echo ("<script type='text/javascript'>");//den duleui alla mallon den tha fortoni eki pu prepi ba to dokimaso me to player
echo ("window.browser='ie';");
echo ("window.version='$version';");
echo ("</script>");
}
else{
echo ("<script type='text/javascript'>");//den duleui etsi opos ine
echo ("window.browser='';");
echo ("</script>");
}

?>

