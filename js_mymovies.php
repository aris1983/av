

<script>

function mymovies(){
$('#form_change_password2').hide(0);
hide_below_options();
options_visible_toogle();
window.loginredirect = 'mymovies';
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
 				titlename : window.titlename,
				width : window.innerWidth || document.body.clientWidth,
				height : window.innerHeight || document.body.clientHeight,
 				titlename : window.titlename,
 				icons_to_forward_2 : 0,//always since recalculated
				MAXIMUM_ICONS : 0 //always since recalculated				
				},
				success : function(data){
								data_error_redirect(data.msg);
				document.body.style.opacity=1.2;
				$('[class=mymovies]').remove();
				$('[id=extra_navigation1]').remove();
				$('[id=table2]').remove();
				$('[id=arrow]').remove();
				$('#ajax_tables').show();
				$('.mymovies').show();
				$('#ajax_tables').append(data);
				window.loginredirect = '';//be carefull
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				document.body.style.opacity=1.2;
				$('#msg_response').prepend('<p>Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε. </p>');
			}});		
		return false;
}; 
</script>