function initMap() {
	var latitude = document.getElementById("latitude").innerHTML;
	var longitude = document.getElementById("longitude").innerHTML;
	var myLatlng = new google.maps.LatLng(latitude,longitude);
	var mapOptions = {
          center: myLatlng,
          zoom: 8
        };
	var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatlng,
          zoom: 8
        });

	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map
	});
}
