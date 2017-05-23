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
		document.getElementById("latitude").value = place.geometry.location.lat();
    	document.getElementById("longitude").value = place.geometry.location.lng();
		var address = '';
		if (place.formatted_address) {
			 address = place.formatted_address;
			document.getElementById("country").value = place.address_components[place.address_components.length-1].long_name;
    	    document.getElementById("city").value = place.address_components[1].long_name;
    	  	document.getElementById("address").value = place.formatted_address;
   			console.log(place);
	        console.log(document.getElementById("country").value+" "+document.getElementById("city").value);
		}
		infowindowContent.children['place-name'].textContent = place.name;
		infowindowContent.children['place-address'].textContent = address;
		infowindow.open(map, marker);
	});

	google.maps.event.addListener(marker, 'dragend', function (event) {
		 document.getElementById("latitude").value = this.getPosition().lat();
    	 document.getElementById("longitude").value = this.getPosition().lng();
    	 //Get the formated address from Reverse Geocoding API
        var geocoder = new google.maps.Geocoder;
    	var latlng = {lat: this.getPosition().lat(), lng: this.getPosition().lng()};

 		geocoder.geocode({'location': latlng}, function(results, status) {
        if(status == google.maps.GeocoderStatus.OK) {
          if(results[0]) {
    		document.getElementById("address").value = results[0].formatted_address;
            for(var i = 0; i < results[0].address_components.length; i++) {
              if(results[0].address_components[i].types[0] == "country") {
                document.getElementById("country").value =  results[0].address_components[i].long_name;
              }
              if(results[0].address_components[i].types[0] == "locality") {
                document.getElementById("city").value =  results[0].address_components[i].long_name;
              }
            }
          }
          else {
            alert("No results");
          }
        }
        else {
          alert("Status: " + status);
        }
      });
 		address = document.getElementById("address").value;
 		infowindow.close();
 		infowindowContent.children['place-name'].textContent = ' ';
		infowindowContent.children['place-address'].textContent = address;
		infowindow.open(map, this);
    });
	
}