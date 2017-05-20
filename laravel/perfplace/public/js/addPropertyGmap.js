var marker;
var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('googleMap'), {
		center: {lat: -33.8688, lng: 151.2195},
		zoom: 13
	});
	var input = document.getElementById('placeAutocomplete');

	var autocomplete = new google.maps.places.Autocomplete(input);

	// Bind the map's bounds (viewport) property to the autocomplete object,
	// so that the autocomplete requests use the current map bounds for the
	// bounds option in the request.
	autocomplete.bindTo('bounds', map);

	var infowindow = new google.maps.InfoWindow();
	var infowindowContent = document.getElementById('infowindow-content');
	infowindow.setContent(infowindowContent);
	marker = new google.maps.Marker({
		map: map,
		anchorPoint: new google.maps.Point(0, -29),
		draggable:true
	});

	autocomplete.addListener('place_changed', function() {
		infowindow.close();
		marker.setVisible(false);
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			// User entered the name of a Place that was not suggested and
			// pressed the Enter key, or the Place Details request failed.
			window.alert("No details available for input: '" + place.name + "'");
			return;
		}

		// If the place has a geometry, then present it on a map.
		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(17);  // Why 17? Because it looks good.
		}
		marker.setPosition(place.geometry.location);
		marker.setVisible(true);

		var address = '';
		if (place.address_components) {
			address = [
				(place.address_components[0] && place.address_components[0].short_name || ''),
				(place.address_components[1] && place.address_components[1].short_name || ''),
				(place.address_components[2] && place.address_components[2].short_name || '')
			].join(' ');
		}
		infowindowContent.children['place-name'].textContent = place.name;
		infowindowContent.children['place-address'].textContent = address;
		infowindow.open(map, marker);
	});

	google.maps.event.addListener(marker, 'dragend', function (event) {
		document.getElementById("latitude").value = event.latLng.latitude().toFixed(3);
		document.getElementById("longitude").value = event.latLng.longitude().toFixed(3);
	});
	// document.getElementById('use-strict-bounds')
	//     .addEventListener('click', function() {
	//         console.log('Checkbox clicked! New state=' + this.checked);
	//         autocomplete.setOptions({strictBounds: this.checked});
	//     });
}
