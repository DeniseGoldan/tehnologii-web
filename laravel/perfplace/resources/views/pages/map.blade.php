@extends('main')

@section('stylesheets')

	<link rel="stylesheet" href="css/mapView_styles.css">

@stop

@section('content')



	<div class="container-fluid well">
            <div class="row">
                <div class="container-fluid col-sm-3">
                <form class="myWell" method="GET" id="filterForm">
                    <h3>Apply filters</h3>
                    <fieldset>
                        <h4 class="filter-name">Transaction</h4>
                        <div class="container">
                            <label class="label-for-checkbox"><input type="checkbox" name="transactionType">Buy</label>
                            <label><input type="checkbox" name="transactionType">Rent</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h4 class="filter-name">Property type</h4>
                        <div class="container">
                            <label class="label-for-checkbox">
                                <input type="checkbox" name="propertyType" value = 'houseCheck' id="houseCheck" onclick="houseOrApartmentCheck();">House</label>
                            <label>
                                <input type="checkbox" name="propertyType" value = 'apartmentCheck' id="apartmentCheck" onclick="houseOrApartmentCheck();" checked="checked">Apartment
                            </label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <h4 class="filter-name">Price</h4>
                            <div class="container">
                                <label>Between</label>
                                <input type="text" class="numberInput" id="priceMin" name="priceMin" style="width:50px;">
                                <label> and </label>
                                <input type="text" class="numberInput" id="priceMax" name="priceMin" style="width:50px;">
                            </div>
                        </fieldset>
                        <fieldset>
                            <h4 class="filter-name">Number of rooms</h4>
                            <div class="container">
                                <label>Between</label>
                                <input type="text" class="numberInput" id="roomsMin" name="roomsMin" style="width:50px;">
                                <label> and </label>
                                <input type="text" class="numberInput" id="roomsMax" name="roomsMax" style="width:50px;">
                            </div>
                        </fieldset>
                        <fieldset>
                            <h4 class="filter-name">Surface</h4>
                            <div class="container">
                                <label>Between</label>
                                <input type="text" class="numberInput" id="surfaceMin" name="surfaceMin" style="width:50px;">
                                <label> and </label>
                                <input type="text" class="numberInput" id="surfaceMax" name="surfaceMax" style="width:50px;">
                            </div>
                        </fieldset>

                        <p data-placement="top" data-toggle="tooltip" title="Add pins of the filtered houses on the map">
                            <input type="submit" value="Show filtered homes" class="submit btn btn-success add-margin-top" name="map">
                        </p>
                        </form>
                        
                        <form class="myWell1" method="GET" action="/results" id="listForm">
                        <p data-placement="top" data-toggle="tooltip" title="Go to a page where you can preview the filtered houses">

                            <input type="submit" value="List filtered homes" class="submit btn btn-success add-margin-top" name="list">
                        </p>
                        </form>
                        </div>

                    <div class="container-fluid col-sm-9">
                        <fieldset>
                            <h4 class="filter-name">Change location</h4>
                            <input name="search" placeholder="Enter location" id="pac-input" class="form-control" type="text">
                        </fieldset>
                        <div id="googleMap" style="width:100%;height:550px;"></div>
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" id="pollutionLayer"  class="btn-sm  btn-default" onclick="togglePollution()" style="background-color:#ffc800;">Pollution</button>
                                <button type="button" id="noiseLayer" class="btn-sm btn-default" onclick="toggleNoise()" style="background-color:#00ffff;">Noise</button>
                                <button type="button" id="criminalityLayer" class="btn-sm btn-default" onclick="toggleCriminality()" style="background-color:red">Criminality</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


@stop

@section('scripts')

	 <script type="text/javascript" src="js/mapView.js"></script>
     <script type="text/javascript" src="js/mapViewForceNumeric.js"></script>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places,visualization&callback=initMap"
        async defer></script>

@stop