@extends('main')

@section('title','Add a new Property')

@section('stylesheets')
	
	{{Html::style('css/addProperty_styles.css')}}

@stop

@section('content')

	<div class="well">
		<h1 class="well">Add a new dream home</h1>
	</div>
	<!--
	<form class="well container-fluid" method="post" id="addPropertyForm" action="/properties" method="POST">
	-->
	{!! Form::open(['route' => 'properties.store',
	'id'=> 'addPropertyForm',
	'class'=>'well container-fluid','enctype'=>'multipart/form-data']) !!}
		<div class="container-fluid">
			<div class="col-sm-3">
				<!--Select the type of property-->
				<fieldset>
					<legend>Property type</legend>
					<div class="form-group">
						<div class="radio">
							<label><input type="radio" value="house" name="propertyType" id="houseCheck" onclick="houseOrApartmentCheck();">House</label>
						</div>
						<div class="radio">
							<label><input type="radio" value="apartment" name="propertyType" id="apartmentCheck" onclick="houseOrApartmentCheck();" checked ="checked">Apartment</label>
						</div>
					</div>
				</fieldset>
				<!--Details about property-->
				<fieldset>
					<legend>Details</legend>
					<div class="form-group">
						<div class="input-group width-to-100-percent">
							<input type="text" class="form-control" id="title" placeholder="Title" name="title">
						</div>
						<div class="input-group width-to-100-percent">
							<textarea class="form-control" rows="4" id="description" placeholder="Description" name="description"></textarea>
						</div>
						<div class="input-group width-to-100-percent">
							<input type="number"  min="1" class="form-control numberInput" name="numberOfRooms" id="numberOfRooms" placeholder="Number of rooms">
						</div>
						<div class="input-group width-to-100-percent">
							<input type="text" class="form-control numberInput" name="surface" id="surface" placeholder="Surface (square meters)">
						</div>
						<div  class="input-group width-to-100-percent">
							<input type="number"  min="1" class="form-control hidden" name="numberOfFloors" id="numberOfFloors" placeholder="Number of floors">
						</div>
						<div class="input-group width-to-100-percent">
							<input type="number"  min="0" class="form-control" name="floorNumber" id="floorNumber" placeholder="Floor number">
						</div>
					</div>
				</fieldset>
				<!--Select if the property is for sale or for rent-->
				<fieldset>
					<legend>Transaction type</legend>
					<div class="form-group">
						<div class="radio">
							<label><input type="radio" name="transactionType" value="Rent">Rent</label>
						</div>
						<div class="radio">
							<label><input type="radio" checked='checked' name="transactionType" value="Sale">Sale</label>
						</div>
					</div>
				</fieldset>
				<!--Select currency and set a price-->
				<fieldset>
					<legend>Price</legend>
					<div class="form-group">
						<div class="input-group width-to-100-percent">
							<input id="price" type="text" class="form-control numberInput" name="price" placeholder="Price (euro)">
						</div>
					</div>
				</fieldset>
			</div>
			<div class="col-sm-9 location">
				<!--Define the location of the property-->
				<fieldset>
					<legend>Location</legend>
					<div class="form-group col-sm-12 input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
						<input name="search" placeholder="Enter a city" id="placeAutocomplete" name="placeAutocomplete" class="form-control" type="text">
					</div>
					<div id="googleMap" style="width:100%;height:500px;"></div>
					<div id="infowindow-content">
						<span id="place-name"  class="title"></span><br>
						<span id="place-address"></span>
					</div>
					<div name="LatLng">
						<input name="latitude" class="numberInput" type ="hidden" id="latitude">
						<input name="longitude" class="numberInput" type ="hidden" id="longitude">
						<input name="address" type="hidden" id="address">
					</div>
				</fieldset>
			</div>
		</div>
		<div class="container-fluid">
			<fieldset>
				<legend class="add-padding-to-photos">Photos</legend>
				<div class="form-group">
					<div >
						<div class="image-upload">
							<label for="file-input-1">
								<img id="pic-1" src="/img/housePlaceholder.jpg" height="90" width="90">
							</label>
							<label for="file-input-2">
								<img id="pic-2" src="/img/housePlaceholder.jpg" height="90" width="90">
							</label>
							<label for="file-input-3">
								<img id="pic-3" src="/img/housePlaceholder.jpg" height="90" width="90">
							</label>
							<label for="file-input-4">
								<img id="pic-4" src="/img/housePlaceholder.jpg" height="90" width="90">
							</label>
							<label for="file-input-5">
								<img id="pic-5" src="/img/housePlaceholder.jpg" height="90" width="90">
							</label>
							<input id="file-input-1" type="file" name="images[]" />
                            <input id="file-input-2" type="file" name="images[]"/>
                            <input id="file-input-3" type="file" name="images[]"/>
                            <input id="file-input-4" type="file" name="images[]"/>
                            <input id="file-input-5" type="file" name="images[]"/>
						</div>
					</div>
				</div>

				<style>.image-upload > input
				{
					display: none;
				}</style>
			</fieldset>
			<!--Submit data for further validation-->
			<div class="row">
				<div class="col-sm-offset-6 col-sm-4">
					<input type="submit" name="submitButton" class="submit btn btn-default " value="Submit" onclick="validateAddPropertyForm()">
				</div>
			</div>
		</div>
	{!! Form::close() !!}
@stop

@section('scripts')

	{{Html::script('/js/addPropertyHideShow.js')}}
	{{Html::script('/js/addPropertyGmap.js')}}

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places&callback=initMap" async defer></script>

	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>

	<script type="text/javascript" src="/js/addPropertyForceNumeric.js"></script>
	<script type="text/javascript" src="/js/addPropertyUploadThumbnails.js"></script>

	{{Html::script('/js/validations/validateAddPropertyForm.js')}}



@stop