window.onload = function(){
	var elevator = new Elevator({
		element: document.querySelector('.elevator-button'),
		duration: 1000 // milliseconds
	});
}
$( "#listofcity").click(function() {
  $( "#listofcity" ).toggle( "slide" );
});
$( "#city").click(function() {
  $( "#listofcity" ).toggle( "slide" );
  $("#listofcity").removeClass('hidden');
});