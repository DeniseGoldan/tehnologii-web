function initMap() {
	var position = {lat: 44.465626, lng: 26.078406};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 17,
		center: {lat: 44.462912,lng: 26.078966}
	});
	map.setMapTypeId('roadmap');
	var marker = new google.maps.Marker({
		position: position,
		map: map
	});
}
