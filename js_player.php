



<script>

function stopPlayingmain(){ //automatic when started playing and then pushed any other option
var player = null;
function playerReady(obj)
{
  player = document.getElementsByName(obj.id)[0];
};

function stopPlaying(){ //automatic when started playing and then pushed any other option
setTimeout("player.sendEvent('STOP')", 0);
}};

function newplayer() { //automatic when pushed started playing
if (window['lowertrailerready'] == undefined){ 
window.lowertrailerready = window.lowertrailer -(window.lowertrailer*0.1);// - 10% altough i dont think it is used
}
window.uppertrailer = $('#uppertrailer').outerHeight(true);	
window.lowertrailer = (((window.innerHeight || document.body.clientHeight)-window.uppertrailer));//sets height to be used for player altough it is used in 


//https://dashboard.jwplayer.com/#/players/downloads?property=f020458c-2ede-11e6-9fd3-0637bffb81a3
var playerInstance = jwplayer('mediaspace');
    playerInstance.setup({
        file: 'jwplayer/There.mp4',
            image: 'jwplayer/image.jpg',
            width: "100%",
            height: (window.innerHeight || document.body.clientHeight)-window.uppertrailer,
            title: '',
            description: '',
			autostart: "true"
    });
/* $('body').css("background-color","black");
if (window['lowertrailerready'] == undefined){ 
window.lowertrailerready = window.lowertrailer -(window.lowertrailer*0.1);// - 10% altough i dont think it is used
}
window.uppertrailer = $('#uppertrailer').outerHeight(true);	
window.lowertrailer = (((window.innerHeight || document.body.clientHeight)-window.uppertrailer));//sets height to be used for player altough it is used in var so
$('#playerid').attr("height",(((window.innerHeight || document.body.clientHeight)-window.uppertrailer)+"px;"));//sets height to be used for player
window.trailerheight = $('#playerid').attr("height");
$('#mediaspace').css({'height':window.trailerheight});//sets height to be used for player in css for parent element maybe is redundant element
window.innertrailerheight = $('#mediaspace').attr("height");//redundant?
window.trailerheight = window.trailerheight-window.uppertrailer;//redundant?
window.lowertrailer2 = '600px';//redundant?
if (window['browser'] == 'ie'){ // IE 
var so = new SWFObject('http://player.longtailvideo.com/player.swf','mpl','90%',window.lowertrailer,'9');
so.addParam('allowfullscreen','true');
so.addParam('backcolor','000000');
so.addVariable("backcolor","000000");
so.addParam('frontcolor','ffffff');
so.addVariable("frontcolor","ffffff");
so.addParam('controlbar','over');
so.addVariable("controlbar","over");
so.addParam('allowscriptaccess','always');
so.addParam('wmode','opaque');
so.addVariable('file',window.comment+'.flv&autostart=true&backcolor=000000&frontcolor=ffffff&controlbar=over');
so.addVariable('streamer','rtmp://s3t81b11ecc17c.cloudfront.net/cfx/st');
so.addVariable("autoplay","true");
so.addVariable("autostart","true");
so.write('mediaspace');
}
else{// ALL OTHER BROWSERS
var so = new SWFObject('http://player.longtailvideo.com/player.swf','mpl','90%',window.lowertrailer,'9', '000000');
so.addParam('allowscriptaccess','always');
so.addVariable("autoplay","true");
so.addVariable("autostart","true");
so.addParam('allowfullscreen','true');
so.addParam('backcolor','000000');
so.addVariable("backcolor","000000");
so.addParam('frontcolor','ffffff');
so.addVariable("frontcolor","ffffff");
so.addParam('controlbar','over');
so.addVariable("controlbar","over");
so.addParam('flashvars','streamer=rtmp://s3t81b11ecc17c.cloudfront.net/cfx/st&file='+window.comment+'.flv&type=rtmp&autostart=true&allowscriptaccess=always&backcolor=000000&frontcolor=ffffff&stretching=exactfit&image='+window.picture_src+'&controlbar=over&backcolor=000000&frontcolor=ffffff'); 
so.addVariable('image',window.picture_src);
so.addVariable('stretching','exactfit');
so.addVariable('VideoNotFoundFallback',(window.movie_url+'&autostart=true'));//fix it 
so.write('mediaspace');
}
$('.buy2').show();//navigation option
*/}// need to put video not found for chrome ie first doesnt play
</script>