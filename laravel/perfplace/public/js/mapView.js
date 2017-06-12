var gradientNoise = [
    'rgba(0, 255, 255, 0)',
    'rgba(0, 255, 255, 1)',
    'rgba(0, 225, 255, 1)',
    'rgba(0, 200, 255, 1)',
    'rgba(0, 175, 255, 1)',
    'rgba(0, 160, 255, 1)',
    'rgba(0, 160, 255, 1)',
    'rgba(0, 140, 255, 1)',
    'rgba(0, 130, 255, 1)',
    'rgba(0, 120, 255, 1)',

]
// Red - negative
var gradientCriminality = [
    'rgba(255, 0, 0, 0)',
    'rgba(255, 80, 0, 1)',
    'rgba(255, 80, 0, 1)',
    'rgba(255, 50, 0, 1)',
    'rgba(255, 50, 0, 1)',
    'rgba(255, 30, 0, 1)',
    'rgba(255, 20, 0, 1)',
    'rgba(255, 0, 0, 1)'
];

var gradientPollution = [
    'rgba(255, 220, 0, 0)',
    'rgba(255, 200, 0, 1)',
    'rgba(255, 190, 10, 1)',
    'rgba(255, 180, 10, 1)',
    'rgba(255, 160, 20, 1)'
];
var map=null;
var markersArray = [];
var pollutionHeatmap=null;
var noiseHeatmap=null;
var criminalityHeatmap=null;
var waqiMapOverlay = null;
var pollutionPoints = [];
var noisePoints = [];
var criminalityPoints = [];




function toggleHeatmap(heatmap) {
    heatmap.setMap(heatmap.getMap() ? null : map);
}

function togglePollution() {
    if(pollutionHeatmap==null){

        pollutionHeatmap = new google.maps.visualization.HeatmapLayer({
            data: pollutionPoints,
            map: map
        });
        pollutionHeatmap.set('gradient', gradientPollution);
        pollutionHeatmap.setOptions({radius:30});
    }
    else{
        toggleHeatmap(pollutionHeatmap);
    }
}

function toggleNoise() {
    if(noiseHeatmap==null){
        noiseHeatmap = new google.maps.visualization.HeatmapLayer({
            data: noisePoints,
            map: map
        });
        noiseHeatmap.set('gradient', gradientNoise);
        noiseHeatmap.setOptions({radius:25});
    }
    else{
        toggleHeatmap(noiseHeatmap);
    }
}
function toggleCriminality() {
    if(criminalityHeatmap==null){
        criminalityHeatmap = new google.maps.visualization.HeatmapLayer({
            data: criminalityPoints,
            map: map
        });
        criminalityHeatmap.set('gradient',gradientCriminality);
        noiseHeatmap.setOptions({radius:20});
    }
    else{
        toggleHeatmap(criminalityHeatmap);
    }

}

function displayMarkers(map,markers) {
    var infowindow = new google.maps.InfoWindow(), marker, i;
    for (i = 0; i < markers.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(markers[i][1], markers[i][2]),
            map: map
        });
    }
}

function initMap() {

    var latitudeValueFromGET = null;
    var longitudeValueFromGET = null;
    var latitudeValueFromGET = decodeURIComponent(window.location.search.match(/(\?|&)latitude\=([^&]*)/)[2]);
    var longitudeValueFromGET = decodeURIComponent(window.location.search.match(/(\?|&)longitude\=([^&]*)/)[2]);
    var center = new google.maps.LatLng(0, 0);
    var latlng = new google.maps.LatLng(latitudeValueFromGET,longitudeValueFromGET);
    var myOptions = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false
    };
    map = new google.maps.Map(document.getElementById("googleMap"),myOptions);
    setCityAndCountryInHTML(parseFloat(latitudeValueFromGET),parseFloat(longitudeValueFromGET),loadPlacesAJAX);
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo('bounds', map);
    autocomplete.addListener('place_changed', function() {
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
        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
        var geocoder = new google.maps.Geocoder;
        var latlng = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
        document.getElementById("latitude").value=latlng.lat;
        document.getElementById("longitude").value=latlng.lng;
        setCityAndCountryInHTML(place.geometry.location.lat(),place.geometry.location.lng(),loadPlacesAJAX);
    });
   
    //togglePollution(pollutionPoints);
    //displayMarkers(map,markers);
}

function focusMap(searchedLocation){
    map.setCenter(center);
    map.setZoom(17);  // Why 17? Because it looks good.

}

function loadPlacesAJAX(){
    fetchLocations();
    pollutionPoints=[];
    noisePoints=[];
    criminalityPoints=[];
    noiseHeatmap==null
    pollutionHeatmap==null
    criminalityHeatmap==null
    getEventPoints("pollution");
    getEventPoints("noise");
    getEventPoints("criminality");
}

function setCityAndCountryInHTML(lat,lng,callback){
    var geocoder = new google.maps.Geocoder;
        var latlng = {lat: lat, lng: lng};
        console.log(latlng);
        geocoder.geocode({'location': latlng}, function(results, status) {
        if(status == google.maps.GeocoderStatus.OK) {
          if(results[0]) {
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
        callback();
        }
        else {
            alert("Status: " + status);
        }
      });
}

function addPolution(map,lat,lng){
    var  t  =  new  Date().getTime();  

    if(waqiMapOverlay == null){
        waqiMapOverlay  =  new  google.maps.ImageMapType({  
                      getTileUrl:  function(coord,  zoom)  {  
                                return  'https://tiles.waqi.info/tiles/usepa-aqi/'  +  zoom  +  "/"  +  coord.x  +  "/"  +  coord.y  +  ".png?token=064051ac3b97df96231f9c7b4a0345f1e41efff5";  
                      },  
                      name:  "Air  Quality",  
            });  
    }
    togglePollution();   
}

function fetchLocations(){
   var ajaxRequest;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
   // Create a function that will receive data
   // sent from the server and will update
   // div section in the same page.
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var locations= ajaxRequest.responseText;
         console.log(markersArray);
         deleteMarkers(markersArray);
         addMarkersToMap(locations,map);
      }
   }
   // Now get the value from user and pass it to
   // server script.
   var priceMin = document.getElementById('priceMin').value;
   var priceMax = document.getElementById('priceMax').value;
   var country = document.getElementById('country').value;
   var city = document.getElementById('city').value;
   var houseCheck = $('#houseCheck').is(':checked')? "on" : "";
   var apartmentCheck = $('#apartmentCheck').is(':checked')? "on" : "";
   var buyCheck = $('#buyCheck').is(':checked') ? "on" : "";
   var rentCheck = $('#rentCheck').is(':checked')? "on" : "";
   var roomsMin = document.getElementById('roomsMin').value;
   var roomsMax = document.getElementById('roomsMax').value;
   var surfaceMin = document.getElementById('surfaceMin').value;
   var surfaceMax = document.getElementById('surfaceMax').value;
   var queryString = "?houseCheck="+houseCheck+"&apartmentCheck="+apartmentCheck+"&rentCheck="+rentCheck+"&buyCheck="+buyCheck;
   queryString+= "&country=" + country +"&city=" +city ;
   
   queryString +=  "&priceMin=" + priceMin + "&priceMax=" + priceMax+"&roomsMin="+roomsMin+"&roomsMax="+roomsMax;
   queryString +=   "&surfaceMin=" + surfaceMin + "&surfaceMax="+surfaceMax;
   console.log("../properties/filtered"+queryString);
   ajaxRequest.open("GET", "/properties/filtered" + queryString, true);
   ajaxRequest.send(null); 
}
function getEventPoints(eventType) {
    var ajaxRequest;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){ 
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
            alert("Your browser broke!");
            return false;
         }
      }
   }
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var locations= ajaxRequest.responseText;
         var locations = $.parseJSON(locations);
         addToEventPointsList(eventType,locations);
      }
   }
   var city = document.getElementById('city').value;
   var country = document.getElementById('country').value;
   var type = eventType;
   var queryString = "?country="+country+"&city="+city+"&type="+type;
   ajaxRequest.open("GET", "/api/cityMapInfo" + queryString, true);
   ajaxRequest.send(null); 
}
function addMarkersToMap(locations,map){
    var locations = $.parseJSON(locations);
    var marker,i;
    var infowindow = new google.maps.InfoWindow;
    for (i = 0; i < locations.length; i++) {
        LatLng = new google.maps.LatLng(locations[i].latitude,locations[i].longitude);
        marker = new google.maps.Marker({
            position: LatLng,
            map: map
        });
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
         return function() {
            var propertyLink = '<a href = \'../properties/'+locations[i]._id+'\'>View '+locations[i].propertyType+'</a>';
            var transactionType = locations[i].transactionType.toLowerCase();
            var transactionStatement = '<p>For '+transactionType+
                ' at a price of '+locations[i].price+' €';
            if (transactionType.localeCompare('rent') == 0){
                transactionStatement += '/month.</p>'
            } else {
                transactionStatement += '.</p>'
            }
            var contentString = 
                '<h4>'+locations[i].title+'</h4>'+
                transactionStatement+
                '<p>'+'Surface: '+locations[i].surface+'m²</p>'+propertyLink;
             infowindow.setContent(contentString);
             infowindow.open(map, marker);
         }
    })(marker, i));
    markersArray.push(marker);
    }
}
function deleteMarkers(markersArray){
    for (var i = 0;i<markersArray.length; i++) {
        markersArray[i].setMap(null);
    }
    markersArray.length = 0;
}
function addToEventPointsList(eventType,locations){
    if(eventType=="pollution"){
        console.log(locations);
        for(var i=0;i<locations.length;i++){
            pollutionPoints.push(new google.maps.LatLng(locations[i].latitude,locations[i].longitude));
        }
    }
    else if(eventType=="noise"){
        for(var i=0;i<locations.length;i++){
            noisePoints.push(new google.maps.LatLng(locations[i].latitude,locations[i].longitude));
        }
    }
    else if(eventType=="criminality"){
        for(var i=0;i<locations.length;i++){
            criminalityPoints.push(new google.maps.LatLng(locations[i].latitude,locations[i].longitude));
        }
    }
}