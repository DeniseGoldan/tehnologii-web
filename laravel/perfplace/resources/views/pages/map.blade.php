@extends('main')

@section('stylesheets')

	<link rel="stylesheet" href="css/addProperty_styles.css">

@stop

@section('content')

	<div class="container-fluid well">

    <div class="row">
        <form class="well container-fluid col-sm-3" method="GET" id="filterForm">
            <fieldset>
                <legend>Location</legend>
                <input name="search" placeholder="Enter a location" id="pac-input" class="form-control" type="text">
            </fieldset>
            <input type="text" name="searchedLocation" id="searchedLocation" hidden>
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
                    <input type="text" class="numberInput" id="priceMin" name="priceMin" style="width:50px;">
                    <label> and </label>
                    <input type="text" class="numberInput" id="priceMax" name="priceMin" style="width:50px;">
                </div>
            </fieldset>
            <fieldset>
                <legend>Number of rooms</legend>
                <div class="form-group">
                    <label>Between</label>
                    <input type="text" class="numberInput" id="roomsMin" name="roomsMin" style="width:50px;">
                    <label> and </label>
                    <input type="text" class="numberInput" id="roomsMax" name="roomsMax" style="width:50px;">
                </div>
            </fieldset>
            <fieldset>
                <legend>Surface</legend>
                <div class="form-group">
                    <label>Between</label>
                    <input type="text" class="numberInput" id="surfaceMin" name="surfaceMin" style="width:50px;">
                    <label> and </label>
                    <input type="text" class="numberInput" id="surfaceMax" name="surfaceMax" style="width:50px;">
                </div>
            </fieldset>

            <input type="submit" value="Search homes" class="submit btn btn-default ">
        </form>

        <div class="container-fluid col-sm-9">
            <div id="googleMap" style="width:100%;height:590px;"></div>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" id="pollutionLayer" onclick="togglePollution()" class="btn-sm  btn-default" style="background-color:#ffc800;">
                            Pollution
                        </button>
                        <button type="button" id="noiseLayer" class="btn-sm btn-default" onclick="toggleNoise()" style="background-color:#00ffff;">Noise</button>
                        <button type="button" id="criminalityLayer" class="btn-sm btn-default" onclick="toggleCriminality()" style="background-color:red">
                            Criminality</button>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <form action='/results'>
        <input type="submit" value="List homes" class="submit btn btn-default ">
        </form>
    </div>
</div>


@stop

@section('scripts')

	 <script type="text/javascript" src="js/mapView.js"></script>
     <script type="text/javascript" src="js/mapViewForceNumeric.js"></script>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places,visualization&callback=initMap"
        async defer></script>

@stop