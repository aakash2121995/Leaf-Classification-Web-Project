$(document).ready(function () {
	// alert("classify")
$.post("classify.php",function (data) {
	
	$("#leafload").remove()
	$("#leaftext").remove()
	$("#upload").remove()
	$( ".main" ).append( "<h2 id='species'>This leaf belongs to <b><i>" + data + "</b></i> species</h2>" );	// body...

})
});