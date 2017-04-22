@extends('main')

@section('stylesheets')

	<link rel="stylesheet" href="css/addProperty_styles.css">

@stop

@section('content')

	<div class="container-fluid well">
	<div class="well container-fluid col-sm-3">
    <form method="post" id="searchForm">
        <fieldset>
            <legend>Transaction</legend>
            <div class="form-group required">
                <label><input type="radio" name="transactionType">Buy</label>
                <label><input type="radio" name="transactionType">Rent</label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Property type</legend>
            <div class="form-group required">
                <label><input type="radio" name="propertyType" id="houseCheck" onclick="houseOrApartmentCheck();">House</label>
                <label><input type="radio" name="propertyType" id="apartmentCheck"
                              onclick="houseOrApartmentCheck();" checked="checked">Apartment</label>
                <label><input type="radio" name="propertyType" id="bothCheck" onclick="houseOrApartmentCheck();"
                              checked="checked">Both</label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Price</legend>
            <div class="form-group">
                <label>Between</label>
                <input type="text" class="numberInput" style="width:50px;">
                <label> and </label>
                <input type="text" class="numberInput" style="width:50px;">
            </div>
        </fieldset>
        <fieldset>
            <legend>Number of rooms</legend>
            <div class="form-group">
                <label>Between</label>
                <input type="text" class="numberInput" style="width:50px;">
                <label> and </label>
                <input type="text" class="numberInput" style="width:50px;">
            </div>
        </fieldset>
        <fieldset>
            <legend>Surface</legend>
            <div class="form-group">
                <label>Between</label>
                <input type="text" class="numberInput" style="width:50px;">
                <label> and </label>
                <input type="text" class="numberInput" style="width:50px;">
            </div>
        </fieldset>
        <input type="submit" value="Search homes" class="submit btn btn-default ">
	</form>

	<form method="GET" style="margin-top:30px" action="/results">
		<input type="submit" value="List Homes" class="submit btn btn-default ">
	</form>

	</div>




    <div class="col-sm-9">
        <div class="input-group">
            <fieldset>
                <legend>Location</legend>
                <input name="search" placeholder="Enter a locations" id="pac-input" class="form-control" type="text"
                       style="width:500px;">
            </fieldset>
            <div class="btn-group">
                <button type="button" id="pollutionLayer" onclick="togglePollution()" class="btn  btn-default">
                    Pollution
                </button>
                <button type="button" id="noiseLayer" class="btn btn-default" onclick="toggleNoise()">Noise</button>
                <button type="button" id="criminalityLayer" class="btn btn-default" onclick="toggleCriminality()">
                    Criminality
                </button>
            </div>
            </span>
        </div>
        <div id="googleMap" style="width:100%;height:500px;"></div>
        <div id="infowindow-content">
            <span id="place-name" class="title"></span><br>
            <span id="place-address"></span>
        </div>
        <div name="LatLng">
            <input name="lat" class="numberInput" type="hidden" id="lat">
            <input name="lng" class="numberInput" type="hidden" id="lng">
        </div>
    </div>
</div>


@stop

@section('scripts')

	 <script type="text/javascript" src="js/mapView.js"></script>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places,visualization&callback=initMap"
        async defer></script>

@stop