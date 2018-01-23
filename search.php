<script type="text/javascript">
	$(function() {
window.category_search_file = "titles.php";
if(window.category_search == "Actor"){
window.category_search_file = "actors.php";
}
if(window.category_search == "title"){
window.category_search_file = "titles.php";
}
$.getJSON(window.category_search_file, function(data) {
$( "#tags" ).autocomplete({
    source: function( request, response ) {
            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
            response( $.grep( data, function( item ){
                return matcher.test( item );
            }) );
        }
});
});
});
</script>
<div class="demo">
<div class="ui-widget">
	<label for="tags"></label>
	<input id="tags"> 
<img src="images/search.jpeg" width="20 px" height"20 px" onclick="searchbutton()"  style="cursor:pointer;"/>
</div>
</div> 
<?PHP
include'ip_referrer.php';

?>

