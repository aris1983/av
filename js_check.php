


<noscript>Your browser does not support JavaScript!, you need to enable javascript.</noscript> 

<script>
function symbol_request_sent_button(){
 var jobValue= $('#txtJob').val();

//window.alert(jobValue);
//window.bought = $.trim(window.bought);
//put alowable characters eng gr and numbers
window.forwardicons = '0';
window.currenticons = '0';
document.body.style.opacity=0.5;
		$.ajax({
			type : 'POST',
			url : 'symbol_request/mail.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "mymovies",
				login_string : window.login_string,
 				name : window.bought,
				name2 : window.bought,
 				icons_to_forward_2 : 0,
				MAXIMUM_ICONS : 0,

				stock_request:jobValue
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;			
				$('.ui-helper-hidden-accessible').empty();			
				$('#ajax_tables').empty();// consider having it at a lower node if possible
				$('#ajax_tables').append(data); //node found in ajax.php
				$('#ajax_tables').show();
				option_manipulation();	

				$('#pdt').remove();
				$('[id=signout]').show();

				if (data.error === true)
								data_error_redirect(data.msg);
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






function sent_button(){
var selected_index = $("#myselect option:selected" ).text();
 var selected_index2 = $("#myselect2 option:selected" ).text();


 //  alert(selected_index);




	
var selected = [];
$('#checkboxes input:checked').each(function() {
    selected.push($(this).attr('name'));
});
window.bought = $.trim(window.bought);
//put alowable characters eng gr and numbers
window.bought = window.bought.replace(/[^a-zA-Z0-90-ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ]/g, ' '); // consider changing to var
window.forwardicons = '0';
window.currenticons = '0';
document.body.style.opacity=0.5;
		$.ajax({
			type : 'POST',
			url : 'buy_sell/mail.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "mymovies",
				login_string : window.login_string,
 				name : window.bought,
				name2 : window.bought,
 				icons_to_forward_2 : 0,
				MAXIMUM_ICONS : 0,
				stock : selected[0],
				stock_quantity : selected_index,
				user: window.myvar,
				sell:selected_index2
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;			
				$('.ui-helper-hidden-accessible').empty();			
				$('#ajax_tables').empty();// consider having it at a lower node if possible
				$('#ajax_tables').append(data); //node found in ajax.php
				$('#ajax_tables').show();
				option_manipulation();	

				$('#pdt').remove();
				$('[id=signout]').show();

				if (data.error === true)
								data_error_redirect(data.msg);
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


function searchbutton2(){

window.bought = $.trim(window.bought);
//put alowable characters eng gr and numbers
window.bought = window.bought.replace(/[^a-zA-Z0-90-ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ]/g, ' '); // consider changing to var
window.forwardicons = '0';
window.currenticons = '0';
document.body.style.opacity=0.5;
		$.ajax({
			type : 'POST',
			url : 'my_movies/ajax_mymovies.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "mymovies",
				login_string : window.login_string,
 				name : window.bought,
				name2 : window.bought,
 				icons_to_forward_2 : 0,
				MAXIMUM_ICONS : 0
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;			
				$('.ui-helper-hidden-accessible').empty();			
				$('#ajax_tables').empty();// consider having it at a lower node if possible
				$('#ajax_tables').append(data); //node found in ajax.php
				$('#ajax_tables').show();
				option_manipulation();	

				$('#pdt').remove();
				$('[id=signout]').show();

				if (data.error === true)
								data_error_redirect(data.msg);
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


function searchbutton(){
window.category_search_tags = $('#tags').val();
window.category_search_tags = $.trim(window.category_search_tags);
//put alowable characters eng gr and numbers
window.category_search_tags = window.category_search_tags.replace(/[^a-zA-Z0-90-ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ]/g, ' '); // consider changing to var
window.forwardicons = $('#forwardicons').attr("class");
window.currenticons = $('#currenticons').attr("class");
document.body.style.opacity=0.5;
		$.ajax({
			type : 'POST',
			url : 'ajax_1st_page_2nd_try.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "search",
 				name : window.category_search_tags,
				name2 : window.category_search_tags,
 				icons_to_forward_2 : 0,
				MAXIMUM_ICONS : 0
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;			
				$('.ui-helper-hidden-accessible').empty();			
				$('#ajax_tables').empty();// consider having it at a lower node if possible
				$('#ajax_tables').append(data); //node found in ajax.php
				$('#ajax_tables').show();
				option_manipulation();			
				if (data.error === true)
								data_error_redirect(data.msg);
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

function button_login(){ // login
$('[id=msg_response]').empty();	
window.inout_1 = $('#text1').val();
window.inout_2 = $('#text2').val();
window.inout_1= $.trim(window.inout_1);
window.inout_2 = $.trim(window.inout_2);
window.mail = '';
window.password = '';
$('#alert1').hide(0);
$('#alert2').hide(0);

var mailformat = /^(([^()\\\.,;:\s@\"]+(\.[^<>\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  
 
if(window.inout_1.match(mailformat))  
{  
var button1_mail = 'ok';
}  
else  
{  
$('#alert1').show(0);
}
var passwordformat = /^([a-zA-Z0-9_-]){6,}$/;  
if(window.inout_2.match(passwordformat))  
{  
var button1_password = 'ok';
}  
else  
{  
 $('#alert2').show(0); 
}
if(button1_mail == 'ok' && button1_password == 'ok')  
{
document.body.style.opacity=0.5;
$('.response').empty();
	$.ajax({
			type : 'POST',
			url : 'ajax_login.php',
			dataType : 'json',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : window.loginredirect,
 				mail : window.inout_1,
				login_string : window.login_string,
				password : window.inout_2
				},
				success : function(data){
				document.body.style.opacity=1.2;
								data_error_redirect(data.msg);
				if (data.error === true){
				window.login_string = data.login_string;
				$('#msg_response').prepend(data.msg);
				data_error_redirect(data.msg);

				}
				if (data.error === false){
								data_error_redirect(data.msg);
				$('#form_ajax_1st_page').hide();
				$('#signout').show();
				window.login_string = data.login_string;
				$('#msg_response').prepend(data.msg);
				if (data.casemysql == "mymovies"){
				window.loginredirect = '';
				mymovies();
				}
				else{
				paypal();//doesnt have window.logn_string hence is it lost?
				}}},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1.2;
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
			}});		
		return false;
}
return false;
};

function button_signup(){ // signup
$('[id=msg_response]').empty();	
window.inout_1 = $('#text1').val();
window.inout_2 = $('#text2').val();
window.inout_3 = $('#text3').val();
window.inout_1 = $.trim(window.inout_1);
window.inout_2 = $.trim(window.inout_2);
window.inout_3 = $.trim(window.inout_3);
window.mail = '';
window.password = '';
window.passwordverify = '';
$('#alert1').hide(0);
$('#alert2').hide(0);
$('#alert3').hide(0);
var mailformat = /^(([^()\\\.,;:\s@\"]+(\.[^<>\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  

if(window.inout_1.match(mailformat))  
{  
var button2_mail = 'ok';
}  
else  
{  
 $('#alert1').show(0);
}
var passwordformat = /^([a-zA-Z0-9_-]){6,}$/;  
if(window.inout_2.match(passwordformat))  
{  
var button2_password = 'ok';
}  
else  
{  
 $('#alert2').show(0); 
}
if(window.inout_2 == window.inout_3)  
{  
var button2_passwordverify = 'ok';
}  
else  
{  
 $('#alert3').show(0); 
}
if(button2_mail == 'ok' && button2_password == 'ok' && button2_passwordverify == 'ok')  
{
document.body.style.opacity=0.5;
$('.response').empty();
	$.ajax({
			type : 'POST',
			url : 'ajax_signup.php',
			dataType : 'json',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "search",
 				mail : window.inout_1,
				login_string : window.login_string,
				password : window.inout_2
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1;
				if (data.error === true){
								data_error_redirect(data.msg);
				$('#msg_response').prepend(data.msg);
				}
				if (data.error === false){
								data_error_redirect(data.msg);
				$('#msg_response').prepend(data.msg);
				$('#form_ajax_1st_page').hide();
				}},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1;
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
			}});		
		return false;
}};

function button_forgotten_password(){ // forgotten password
$('[id=msg_response]').empty();	
window.inout_1 = $('#text1').val();
window.inout_1 = $.trim(window.inout_1);
window.mail = '';
 $('#alert1').hide(0);
var mailformat = /^(([^()\\\.,;:\s@\"]+(\.[^<>\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  

if(window.inout_1.match(mailformat))  
{  
var button3_mail = 'ok';
}  
else  
{  
$('#alert1').show(0);
}
if(button3_mail == 'ok')  
{
document.body.style.opacity=0.5;
$('.response').empty();
	$.ajax({
			type : 'POST',
			url : 'ajax_forgottenpassword.php',
			dataType : 'json',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "search",
				login_string : window.login_string,
 				mail : window.inout_1			
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1;
				if (data.error === true){
								data_error_redirect(data.msg);
				$('#msg_response').prepend(data.msg);
				}
				if (data.error === false){
							data_error_redirect(data.msg);
				$('#msg_response').prepend(data.msg);
				$('#form_ajax_1st_page').hide();
				}},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1;
				$('.response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
			}});		
		return false;
}};


function button_comment(){ // comment submit
$('[id=msgsent]').hide();	
 $('#alert_name_comment').hide(0); 
 $('#alert_msg_comment').hide(0); 
window.name_comment = $('#name_comment').val();
window.msg_comment = $('#msg_comment').val();
window.name_comment = $.trim(window.name_comment);
window.msg_comment = $.trim(window.msg_comment);
if(window.name_comment == "")
  {
 $('#alert_name_comment_2').show(0);  
  }
else{
if(window.msg_comment == "")
  {
 $('#alert_msg_comment_2').show(0);  
  }
else{
var english_characters = /[]/gi;// consider changing it to gr and numbers but will cause problems since will not hold ,. etc
if(window.name_comment.match(english_characters))  
{ 
$('#alert_name_comment').show(0); 
}
else{
var alert_name_comment = 'ok';
}
if(window.msg_comment.match(english_characters))  
{ 
$('#alert_msg_comment').show(0); 
}
else{
var alert_msg_comment ='ok';
}
if( alert_name_comment == 'ok' && alert_msg_comment == 'ok')  
{
document.body.style.opacity=0.5;
$('.response').empty();
	$.ajax({
			type : 'POST',
			url : 'comments/ajax_comments.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "comments",
				comment : window.msg_comment,
			    name : window.name_comment,
                movie : window.titlename
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;
				$('[id=no_comment]').empty();	
				$('#commentsshow').prepend(data);
				$('#msgsent').show();//consider deleting
				$('body').scrollTop(0);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1.2;
				$('.response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε.</p>');
				document.body.style.opacity=1.2;
			}});		
		return false;
}}}};

function button_contact(){ // contact
$('[id=msg_response]').empty();	
 $('#alert_contact').hide(0); 
$('#msgsent').hide();
window.contact_name = $('#text1comment').val();
window.contact_input = $('#text2comment').val(); //needs escaping for english and greek letters and numbers
window.name_comment = $.trim(window.contact_name);
window.msg_comment = $.trim(window.contact_input);
// need to put to escape non eng gr and numbers
var english_characters = /[A-Z]/gi;
//window.msg_comment = window.msg_comment.replace(/[^a-zA-Z0-90-9ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩάέήίαβγδεζηθικλμνξοπρςστυφχψωϊϋόύώτάέήίόώΆΈΉΊΌΏΈΉ]/g, ' '); // consider changing to var
if(window.contact_input == "")
  {
 $('#alert_contact_2').show(0);  
  }
else{
var mailformat = /^(([^()\\\.,;:\s@\"]+(\.[^<>\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  
  
if(window.contact_name.match(mailformat))  
{  
var button5_mail = 'ok';
}  
else  
{
 $('#alert_contact').show(0); 
}
if(button5_mail == 'ok')  
{
document.body.style.opacity=0.5;
$('.response').empty();
$('#msgsent').empty();
$('#commentsshow').empty();
	$.ajax({
			type : 'POST',
			url : 'comments/ajax_contact.php',
			dataType : 'json',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "comments",
				comment : window.contact_input,
			    name : contact_name,
                movie : window.titlename
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1;
				$('#msg_response').empty();
				$('#msg_response').prepend(data.msg);
				
				$('[id=msg_response]').show();			
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1;
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε.</p>');
				document.body.style.opacity=1;
			}
			});		
		return false;
}}};

function button_change_password(){ //to change pasword consider changing name
window.inout_2 = $('#text2').val();
window.inout_3 = $('#text3').val();
window.inout_2 = $.trim(window.inout_2);
window.inout_3 = $.trim(window.inout_3);
window.password = '';
window.passwordverify = '';
 $('#alert2').hide(0);
$('#alert3').hide(0);
var passwordformat = /^([a-zA-Z0-9_-]){6,}$/;  
if(window.inout_2.match(passwordformat))  
{  
var button22_password = 'ok';
}  
else  
{  
 $('#alert2').show(0); 
}
if(window.inout_2 == window.inout_3)  
{  
var button22_passwordverify = 'ok';
}  
else  
{  
 $('#alert3').show(0); 
}
if( button22_password == 'ok' && button22_passwordverify == 'ok')  
{
document.body.style.opacity=0.5;
$('.response').empty();
	$.ajax({
			type : 'POST',
			url : 'ajax_change_password.php',
			dataType : 'json',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
 				forgotten_password : window.forgotten_password, //it is retrieved in initial ajax.php
				password : window.inout_2
				},
				success : function(data){
				document.body.style.opacity=1;
					if (data.error === true){
									data_error_redirect(data.msg);
					$('#msg_response').empty();
					$('#msg_response').prepend(data.msg);
					$('.toremove').remove();
										if (data.msg=="location")
					{
					window.location="http://ec2-176-34-162-72.eu-west-1.compute.amazonaws.com/5_02/ajax.php";
					}
					else
					{
					//window.alert('no');
					}
					}
					if (data.error === false){
									data_error_redirect(data.msg);
					$('#signout').show();
					$('#msg_response').empty();
					$('.toremove').remove();
					$('#form_change_password2').remove();
					$('#msg_response').prepend(data.msg);
					window.login_string = data.login_string;
					}},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1.2;
				$('#msg_response').prepend('<p>Ξ‘Ο€Ξ­Ο„Ο…Ο‡Ξµ.</p>');
			}});		
		return false;
}};


</script>
