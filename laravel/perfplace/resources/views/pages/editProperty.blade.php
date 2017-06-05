@extends('main')

@section('title','Edit property')

@section('stylesheets')
	
	{{Html::style('css/editProperty_styles.css')}}

@stop

@section('content')

	<div class="well">
		<h1 class="well">Edit property</h1>
	</div>
	{!! Form::open(['route' => ['properties.update',$property->id],'method'=>'PUT',
	'id'=> 'editPropertyForm',
	'class'=>'well container-fluid','enctype'=>'multipart/form-data']) !!}
		{{csrf_field()}}
		<div class="container-fluid">
			<div class="col-sm-3">
				<!--Select the type of property-->
					<legend>{{ ucfirst($property->propertyType)}} details</legend>
					<div class="form-group">
						<div class="input-group width-to-100-percent">
							<label>Title</label>
							<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$property->title}}">
						</div>
						<div class="input-group width-to-100-percent">
							<label>Description</label>
							<textarea class="form-control" rows="4" id="description" placeholder="Description" name="description">
								{{$property->description}}
							</textarea>
						</div>
						<div class="input-group width-to-100-percent">
							<label>Number of rooms</label>
							<input type="number"  min="1" class="form-control numberInput" name="numberOfRooms" id="numberOfRooms" placeholder="Number of rooms" value = "{{$property->numberOfRooms}}">
						</div>
						<div class="input-group width-to-100-percent">
							<label>Surface (square meters)</label>
							<input type="text" class="form-control numberInput" name="surface" id="surface" placeholder="Surface (square meters)" value = "{{$property->surface}}">
						</div>
						@if(strcmp($property->propertyType,'house')==0)
						<div  class="input-group width-to-100-percent">
							<label id="label_numberOfFloors">Number of floors</label>
							<input type="number"  min="1" class="form-control" name="numberOfFloors" id="numberOfFloors" placeholder="Number of floors" value = "{{$property->numberOfFloors}}">
						</div>
						@endif
						@if(strcmp($property->propertyType,'apartment')==0)
						<div class="input-group width-to-100-percent">
							<label id = "label_floorNumber">Floor number</label>
							<input type="number"  min="0" class="form-control" name="floorNumber" id="floorNumber" placeholder="Floor number" value = "{{$property->floorNumber}}">
						</div>
						@endif
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
							<label>Price</label>
							<input id="price" type="text" class="form-control numberInput" name="price" placeholder="Price (euro)" value="{{$property->price}}">
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
					<div id="googleMap" style="width:100%;height:625px;"></div>
					<div id="infowindow-content">
						<span id="place-name"  class="title"></span><br>
						<span id="place-address"></span>
					</div>
					<div name="LatLng">
						<input name="latitude" class="numberInput" type ="hidden" id="latitude" value="{{$property->latitude}}">
						<input name="longitude" class="numberInput" type ="hidden" id="longitude" value="{{$property->longitude}}">
						<input name="country" type="hidden" id="country" value="{{$property->country}}">
						<input name="city" type="hidden" id="city" value="{{$property->city}}">
						<input name="address" type="hidden" id="address" value="{{$property->address}}">
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
								@if($property->getImage(1)!=false)
									<img id="pic-1" src="{{$property->getImage(1)}}"" height="90" width="90">
								@else
									<img id="pic-1" src="/img/housePlaceholder.jpg" height="90" width="90">
								@endif
							</label>
							<label for="file-input-2">
								@if($property->getImage(2)!=false)
									<img id="pic-2" src="{{$property->getImage(2)}}"" height="90" width="90">
								@else
									<img id="pic-2" src="/img/housePlaceholder.jpg" height="90" width="90">
								@endif
							</label>
							<label for="file-input-3">
								@if($property->getImage(3)!=false)
									<img id="pic-3" src="{{$property->getImage(3)}}"" height="90" width="90">
								@else
									<img id="pic-3" src="/img/housePlaceholder.jpg" height="90" width="90">
								@endif
							</label>
							<label for="file-input-4">
								@if($property->getImage(4)!=false)
									<img id="pic-4" src="{{$property->getImage(4)}}"" height="90" width="90">
								@else
									<img id="pic-4" src="/img/housePlaceholder.jpg" height="90" width="90">
								@endif
							</label>
							<label for="file-input-5">
								@if($property->getImage(5)!=false)
									<img id="pic-5" src="{{$property->getImage(5)}}"" height="90" width="90">
								@else
									<img id="pic-5" src="/img/housePlaceholder.jpg" height="90" width="90">
								@endif
							</label>
							<input id="file-input-1" type="file" name="image1"/>
                            <input id="file-input-2" type="file" name="image2"/>
                            <input id="file-input-3" type="file" name="image3"/>
                            <input id="file-input-4" type="file" name="image4"/>
                            <input id="file-input-5" type="file" name="image5"/>
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
				<div class="col-sm-offset-5 col-sm-6">
					<input type="submit" name="submitButton" class="submit btn btn-default " value="Apply changes" onclick="validateAddPropertyForm()">
				</div>
			</div>
			{!! Form::close() !!}
		</div>

@stop

@section('scripts')
	{{Html::script('js/editPropertyGmap.js')}}

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places&callback=initMap" async defer></script>

	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>

	<script type="text/javascript" src="/js/addPropertyForceNumeric.js"></script>
	<script type="text/javascript" src="/js/addPropertyUploadThumbnails.js"></script>

	{{Html::script('js/validations/validateAddPropertyForm.js')}}



@stop