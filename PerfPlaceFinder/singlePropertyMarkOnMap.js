function initMap() {
	var position = {lat: 44.465626, lng: 26.078406};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 17,
		center: position
	});
	map.setMapTypeId('roadmap');
	var marker = new google.maps.Marker({
		position: position,
		map: map
	});
}
