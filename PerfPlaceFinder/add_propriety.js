<!--
function initialize(){
	initializeMap();
	initializeAutocomplete()
}
function initializeMap() {
	var mapProp= {
		center:new google.maps.LatLng(51.508742,-0.120850),
		zoom:5,
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

function initializeAutocomplete() {
	// Create the autocomplete object, restricting the search to geographical location types.
	autocomplete = new google.maps.places.Autocomplete(
		/** @type {!HTMLInputElement} */(document.getElementById('city')),
		{types: ['geocode']});
}
function recenterMap(){

	console.log("dasdasdasda")
}
-->
