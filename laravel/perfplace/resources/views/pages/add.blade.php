@extends('main')

@section('title','Add a new Property')

@section('stylesheets')
	
	{{Html::style('css/addProperty_styles.css')}}

@stop

@section('content')

	<form class="well container-fluid" method="post" id="searchForm">
		<h1 class="well">Add a new dream home</h1>
		<div class="col-sm-8 location">
			<!--Define the location of the property-->
			<fieldset>
				<legend>Location</legend>
				<div class="form-group col-sm-12 input-group required">
					<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
					<input name="search" placeholder="Enter a city" id="pac-input" class="form-control" type="text">
				</div>
				<div id="googleMap" style="width:100%;height:500px;"></div>
				<div id="infowindow-content">
					<span id="place-name"  class="title"></span><br>
					<span id="place-address"></span>
				</div>
				<div name="LatLng">
					<input name="lat" type ="hidden" id="lat">
					<input name="lng" type ="hidden" id="lng">
				</div>
			</fieldset>
		</div>
		<div class="col-sm-4">
			<!--Select the type of property-->
			<fieldset>
				<legend>Property type</legend>
				<div class="form-group required">
					<div class="radio">
						<label><input type="radio" name="propertyType" id="houseCheck" onclick="houseOrApartmentCheck();">House</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="propertyType" id="apartmentCheck" onclick="houseOrApartmentCheck();" checked ="checked">Apartment</label>
					</div>
				</div>
			</fieldset>
			<!--Details about property-->
			<fieldset>
				<legend>Details</legend>
				<div class="form-group">
					<div class="input-group required">
						<input type="number" class="form-control" name="nrOfRooms" id="nrOfRooms" placeholder="Number of rooms">
					</div>
					<div class="input-group required">
						<input type="number" class="form-control" name="propertySurface" id="propertySurface" placeholder="Surface (square meters)">
					</div>
					<div  class="input-group required">
						<input type="number" class="form-control hidden" name="nrOfFloors" id="nrOfFloors" placeholder="Number of floors">
					</div>
					<div class="input-group required">
						<input type="number" class="form-control" name="floorNumber" id="floorNumber" placeholder="Floor number">
					</div>
				</div>
			</fieldset>
			<!--Select if the property is for sale or for rent-->
			<fieldset>
				<legend>Transaction type</legend>
				<div class="form-group required">
					<div class="radio">
						<label><input type="radio" name="propertyTransactionType">Rent</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="propertyTransactionType">Sale</label>
					</div>
				</div>
			</fieldset>
			<!--Select currency and set a price-->
			<fieldset>
				<legend>Set a price</legend>
				<div class="form-group">
					<div class="input-group required">
						<input type="number" class="form-control" name="propertyPrice" placeholder="Price (euro)">
					</div>
				</fieldset>
				<!--Submit data for further validation-->
				<input type="submit" name="submitButton" class="submit btn btn-default " value="Submit" onclick="validateAddPropertyForm()">
			</div>
		</form>
@stop

@section('scripts')

	{{Html::script('js/addPropertyHideShow.js')}}
	{{Html::script('js/addPropertyGmap.js')}}

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places&callback=initMap" async defer></script>

	
	

@stop