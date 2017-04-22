@extends('main')

@section('stylesheets')

	<link rel="stylesheet" href="css/editSingleProperty_styles.css">

@stop

@section('content')

	<form class="well container-fluid" method="post" id="searchForm">
		<div class="container-fluid">
			<div class="col-sm-3">
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
							<input type="number"  min="1" class="form-control numberInput" name="nrOfRooms" id="nrOfRooms" placeholder="Number of rooms">
						</div>
						<div class="input-group required">
							<input type="text" class="form-control numberInput" name="propertySurface" id="propertySurface" placeholder="Surface (square meters)">
						</div>
						<div  class="input-group required">
							<input type="number"  min="1" class="form-control hidden" name="nrOfFloors" id="nrOfFloors" placeholder="Number of floors">
						</div>
						<div class="input-group required">
							<input type="number"  min="0" class="form-control" name="floorNumber" id="floorNumber" placeholder="Floor number">
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
							<label><input type="radio" checked='checked' name="propertyTransactionType">Sale</label>
						</div>
					</div>
				</fieldset>
				<!--Select currency and set a price-->
				<fieldset>
					<legend>Price</legend>
					<div class="form-group">
						<div class="input-group required">
							<input type="text" class="form-control numberInput" name="propertyPrice" placeholder="Price (euro)">
						</div>
					</div>
				</fieldset>
			</div>
			<div class="col-sm-9 location">
				<!--Define the location of the property-->
				<fieldset>
					<legend>Location</legend>
					<div class="form-group col-sm-12 input-group required">
						<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
						<input name="search" placeholder="Enter a city" id="placeAutocomplete" class="form-control" type="text">
					</div>
					<div id="googleMap" style="width:100%;height:400px;"></div>
					<div id="infowindow-content">
						<span id="place-name"  class="title"></span><br>
						<span id="place-address"></span>
					</div>
					<div name="LatLng">
						<input name="lat" class="numberInput" type ="hidden" id="lat">
						<input name="lng" class="numberInput" type ="hidden" id="lng">
					</div>
				</fieldset>
			</div>
		</div>
		<div class="container-fluid">
			<fieldset>
				<legend>Photos</legend>
				<div class="form-group">
					<div >
						<div class="replace-with-photo"></div>
						<div class="replace-with-photo"></div>
						<div class="replace-with-photo"></div>
						<div class="replace-with-photo"></div>
						<div class="replace-with-photo"></div>
						<br style="clear: left;">
					</div>
				</div>
			</fieldset>
			<!--Submit data for further validation-->
			<div class="row">
				<div class="col-sm-offset-5 col-sm-6">
					<input type="submit" name="submitButton" class="submit btn btn-default " value="Apply changes" onclick="validateAddPropertyForm()">
				</div>
				<div class="col-sm-1">
					<div class ="text-right" style="float: left; width:33%; padding-top:5px; padding-right:40px;">
						<p data-placement="top" data-toggle="tooltip" title="Delete">
							<button class="btn btn-danger btn-lg" data-title="Delete">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</p>
					</div>
				</div>
			</div>

			</form>


@stop

@section('scripts')

	<script type="text/javascript" src="js/addPropertyGmap.js"></script>
	<script type="text/javascript" src="js/addPropertyHideShow.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places&callback=initMap" async defer></script>

@stop