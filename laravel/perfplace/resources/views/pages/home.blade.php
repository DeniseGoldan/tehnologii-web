@extends('main')

@section('title','Perfect Place Finder')

@section('stylesheets')

	
	{{Html::style('css/homePage_styles.css')}}
	

@endsection

@section('content')

<form class="well container-fluid" method="get" id="searchForm" action="/map" >
	<h1 class="well"> Find the perfect place for you</h1>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
			<input id="searchTextField" name="searchTextField" placeholder="Search by country or city" class="form-control" type="text">
		</div>
		<div style="display:none"><input name="latitude" id="latitude" value=0></div>
		<div style="display:none"><input name="longitude" id="longitude" value=0></div>
		<!-- <p id="latitude"></p>
		<p id="longitude"></p> -->
		<div>
			<input style="width:50%" type="submit" name="buyButton" class="submit btn btn-default transaction-type" value="Buy" 
			onclick="validateSearchTextField();">
			<input style="width:50%" type="submit" name="rentButton" class="submit btn btn-default transaction-type" value="Rent" 
			onclick="validateSearchTextField();">
		</div>
	</div>
</form>


@stop

@section('scripts')
	
	{{Html::script('http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js')}}
	{{Html::script('http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js')}}
	{{Html::script('js/validations/validateSearchTextField.js')}}
	<script type="text/javascript" src="js/homePageAutocomplete.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places&callback=initMap" async defer></script>
@stop
