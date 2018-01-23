


<script>
function mymovies_login()  {
$('#form_change_password2').hide(0);
options_visible_toogle();//propably will end somewhere around here
$('[id=contact_form]').hide();
hide_below_options();
window.loginredirect = 'mymovies';
$.ajax({  // 1st without any eval hence input
			type : 'POST',
			url : 'ajax_login3.php',
			dataType : 'json',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "mymovies",
 				mail : window.inout_1,
				login_string : window.login_string,
				password : window.inout_2
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;
				if (data.error === true){
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
				}
				if (data.error === false){  //start of next step
								if (data.update_string == "yes"){
				window.login_string = data.login_string;
				
				}else{
				
				}
				if (data.url == "table2.php"){  // 1
				buy_login();
				}
				if (data.url == "paypal.php"){  // 2
				close_without_animation();
				mymovies();
				$('[id=table2]').hide();
				$('[id=arrow]').hide();
				
				}}},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1.2;
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
			}});
};

function   search() { // to show input consider having it in initially hence dont make  comments right now
$('#form_change_password2').hide(0);
options_visible_toogle();
$('#search').empty(0);
document.body.style.opacity=0.5;
		$.ajax({
			type : 'POST',
			url : 'search.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight
				},
				success : function(data){
								data_error_redirect(data.msg);
				hide_below_options();
				document.body.style.opacity=1.2;	
				$('#search').prepend(data);
				$('#search').show(0);				
				if (data.error === true)
				$('#demoForm').show(0);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				$('#waiting').hide(0);
				$('#message').removeClass().addClass('error')
					.text('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε.</p>').show(0);
				$('#demoForm').show(0);
			}});		
		return false;
	};

function contact(){
$('#form_change_password2').hide(0);
options_visible_toogle();//propably will end somewhere around here
hide_below_options();
$('#form_ajax_1st_page').hide();// start by hidding them all and then showing?
$('#loginhtml').show();
$('[id=contact_form]').show();// start by hidding them all and then showing?
};

function titledisplay() {
$('#form_change_password2').hide(0);
$('[id=message_verify_signup]').hide();// will need to include more  already know 3?
$('[id=message]').hide();
options_visible_toogle();
$('[id=displaytitle]').toggle();
if($('[id=displaytitle]').is(":visible")) {
window.title_visible = 'yes';
}else{
window.title_visible = 'no';
}};
 
function titlehide() {
$('#form_change_password2').hide(0);
$('[id=message]').hide();
$('[id=displaytitle]').hide();
window.title_visible = 'no';
} ;

function option_manipulation() { //needs fixing
$('#suggested').show();
$('#actormovie').show();
$('#actorsmovies').show();
$('#categorymovies').show();
$('#namemovie').show();
$('#chronological').show();
$('#search').show();
};

function options_visible_toogle() {//needs fixing 
if($('#options').is(":visible")) {
$('#options').hide();
}};

function signout() { // need to make appropriate entry in mysql?? make separate ajaxcall?
$('#form_change_password2').hide(0);
$('[id=message]').hide();
$('[id=message_verify_signup]').hide();
delete window.loginredirect; 
delete window.login_string; 
$('#signout').hide();
ajax1();
};
</script>