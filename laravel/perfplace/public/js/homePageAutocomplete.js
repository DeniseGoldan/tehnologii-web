function initMap() {
	document.getElementById("latitude").value = 0;
	document.getElementById("longitude").value = 0;
    var input = document.getElementById('searchTextField');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();

        document.getElementById("latitude").value = place.geometry.location.lat();
        document.getElementById("longitude").value = place.geometry.location.lng();
        
        alert("Latitude: '" + place.geometry.location.lat() + "\n"
        	+"Longitude: '" + place.geoetry.location.lng());
    });
}
