
<script>
function   description() { // inside boxes
$('body').css("background-color","#EBEBEB");//changes background since might have been clicked from trailer
$('[id=message]').hide();//2 possible msgs that may have occured find more?
$('[id=message_verify_signup]').hide();
$('#mediaspace').empty();//for trailer
$('.description').hide();// hides in options
//$('.trailer').show();//this are usefull for deleting 2nd navigation
$('.comments').show();
$('#dialog3').hide();//?
$('#dialog1').css("background-color","#EBEBEB");
$("#playerid").attr("src","");//way of stoping the player
$('#DivIframe').fadeOut();//maake it hide?
$('#describe').attr("text-align","left");//start initiation
$('#describe').html('<br><b> Title: </b>'+window.titlename+'<br><b> Description: </b>'+window.describename+'<br><b> Companies :</b>'+actorsname); // make escaping somehow ie in description input
$('#describe').show();
$('body').css("background-color","#EBEBEB");
$('#boxes').css("overflow","visible");
$('#boxes').css("overflow","visible");
$('#dialog1').css("overflow","visible");
$('body').css("overflow","visible");
};


function   trailer() { // inside boxes second navigation
$('#describe').empty();
$('#dialog3').hide();
$('.description').show(); //navigation manipulation
$('#dialog1').css("background-color","black");
$('#describe').hide();
$('.trailer').hide();//navigation option
$('#playerid').attr("src",window.trailername);// sets url
$('#three').show();//?? probably redundant
$('#DivIframe').show();
newplayer();
};

function   close() {
$('#mediaspace').empty();//clears 
$('.trailer').hide(); //in dialog 3 navigation otpion
$("#playerid").attr("src","");
$('#dialog1').css("background-color","black");
$('#describe').empty();// will be more efiicient to have only one parent node if possible to empty
$('#DivIframe').show();//for next use probably
$('.description').show();//for next use probably
window.post2 = (window.post);//? 3where is it found from
window.posl2 = (window.posl );
$("#playerid").css("width","100%");		
$("#playerid").css("height","100%");
$('body').css("background-color","#EBEBEB");
$('.window').hide();
$('#mask').hide();
$('#dialog2').show();//used for animation
$("#dialog2").attr("position","relative");
$('#enlarge').animatee({left: window.posl2 , top: window.post2, width: window.imagewidth, height: window.imageheight,   opacity: 0.5  }, 400, function() {
$('#mask').hide();//on completion  last div inside boxes
$('.window').hide();//since i have many window probably redundant and incorrect syntax
$('#enlarge').attr("src","");//for later use probably redundabt
$('#table2').show();
$('#arrow').show();
$('#nav').show();
$('.comments').show();//?
});
};

function   close_without_animation() {
$('#mediaspace').empty();
$('.trailer').hide(); 
$("#playerid").attr("src","");
$('#dialog1').css("background-color","black");
$('#describe').empty();
$('#DivIframe').show();
$('.description').show();
window.post2 = (window.post);
window.posl2 = (window.posl );
$("#playerid").css("width","100%");		
$("#playerid").css("height","100%");
$('body').css("background-color","#EBEBEB");
$('.window').hide();
$('#mask').hide();
$('#dialog2').show();
$("#dialog2").attr("position","relative");
$('#mask').hide();
$('.window').hide();
$('#enlarge').attr("src","");
$('#table2').show();
$('#arrow').show();
$('#nav').show();
$('.comments').show();
};

function   right_comment(){
$('[id=msg_response]').empty();
$('#commentsshow').empty();
window.startcomment = parseInt(window.startcomment,10) +parseInt(10,10);
		$.ajax({
			type : 'POST',
			url : 'comments/ajax_retrieve_comments.php',
			dataType : 'html',
			data: {
				startcomment : window.startcomment,
				endcomment : window.endcomment,
				movie : window.titlename
				},
				success : function(data){
								data_error_redirect(data.msg);
				$('#commentsshow').prepend(data);
				$('#lefticoncomment').show();
				if(data=='no comments'){
				$('#righticoncomment').hide();
				}			
				document.body.style.opacity=1.2;
				$('body').scrollTop(0);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
				error_redirect();
				$('#commentsshow').text('There was an error.')
				$('#waiting').hide(0);
				$('#message').removeClass().addClass('error')
					.text('Υπήρξε σφάλμα παρακαλώ ξαναπροσπαθήστε.').show(0);
				$('#demoForm').show(0);
			}
		});		
		return false;
	};

function   left_comment() {
$('[id=msg_response]').empty();
$('#commentsshow').empty();
window.startcomment = parseInt(window.startcomment,10) -parseInt(10,10);
if(window.startcomment==0){
$('#lefticoncomment').hide();
}
document.body.style.opacity=0.5;
		$.ajax({
			type : 'POST',
			url : 'comments/ajax_retrieve_comments.php',
			dataType : 'html',
			data: {
				startcomment : window.startcomment,
				endcomment : window.endcomment,
				movie : window.titlename 
				},
				success : function(data){
								data_error_redirect(data.msg);
				if(data=='Κανένα σχόλιο.'){
				$('#righticoncomment').hide();
				}
				else{
				$('#righticoncomment').show();
				}
				$('#commentsshow').prepend(data);			
				document.body.style.opacity=1.2;
				$('body').scrollTop(0);
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
	
function showcommentform(){
$('#showcommentform').hide();
$('#loginhtmlcomment').show();
$('html, body').animatee({
scrollTop: $("#loginhtmlcomment").offset().top
}, 200);
};

function   comments() {// no need for number 4
$('#describe').empty();
$('[id=message]').hide();
$('[id=message_verify_signup]').hide();
$('[id=msg_response]').empty();
$('.comments').hide();
$('body').css("background-color","#EBEBEB");
$('#boxes').css("overflow","visible");
$('#dialog1').css("overflow","visible");
$('body').css("overflow","visible");
$('#mediaspace').empty();
stopPlayingmain();
$('.description').show();
//$('.trailer').show();
$('#dialog3').hide();
$('#dialog1').css("background-color","#EBEBEB");
$("#playerid").attr("src","");//probably reundant since stop function has been called
$('#describe').load('comments/comments.php?movie='+encodeURIComponent(window.titlename)+'&height='+window.innerHeight || document.body.clientHeight);
$("#commentsretrieved").attr("height",window.innerHeight || document.body.clientHeight );
$('#describe').show();
};
</script>