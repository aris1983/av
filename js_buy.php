

<script>

function buy_login()  { //prior to paypal - this is similar to login new function?
$('#arrow').hide();
$('#mediaspace').empty();
$.ajax({
			type : 'POST',
			url : 'ajax_login3.php',
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
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;
				if (data.error === true){
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
				}
				if (data.error === false){
				if (data.update_string == "yes"){
				window.login_string = data.login_string;
			
				}else{
				
				}
				if (data.url == "table2.php"){
				buy(); // close function and show login form
				}
				if (data.url == "paypal.php"){
				if (data.casemysql == "mymovies"){ // consider making seperate function
				window.loginredirect = '';
				mymovies();
				}
				else{
				close_without_animation(); // consider deleting animation
				paypal();  // show icon of buy
				}}}},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1.2;
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
			}})};

function buy() {
document.body.style.opacity=0.5;
close_without_animation(); //consider changing hence not animation thus similar code without animation
hide_below_options();
$('[id=contact_form]').hide();// start by hidding them all and then showing?
$('#loginhtml').show(); // form show
$('#form_ajax_1st_page').show(); // form show
document.body.style.opacity=1.2;
}

function paypal(){ // show icon of buy
$('#table2').empty();
$('#table2').append('Παρακαλώ περιμένετε.');
document.body.style.opacity=0.5;
	$.ajax({
			type : 'POST',
			url : 'paypal.php',
			dataType : 'html',
			data: {
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
				casemysql : "search",
				login_string : window.login_string,
 				titlename : window.titlename			
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;
				$('#table2').empty();
				$('#table2').prepend(data);
				$('#ajax_tables').show();
				$('#table2').show();
				$('#arrow').hide();
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1.2;
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
			}});		
		return false;
};

</script>