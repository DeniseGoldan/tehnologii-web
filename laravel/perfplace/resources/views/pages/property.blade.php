@extends('main')

@section('title','Single Property')

@section('stylesheets')

	{{Html::style('css/singleProperty_styles.css')}}

@stop

@section('content')

	<div class="well container-fluid">
		<div class="col-sm-8 text-left">
			<h1 class="well">{{$property->title}}</h1>

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					@php
						$dataSlideIndex = 0;
					@endphp

					@for($i=1;$i<=5;$i++)
						@if($property->getImage($i)!=false)
							<li data-target="#myCarousel" data-slide-to="{{$dataSlideIndex++}}" @if($dataSlideIndex == 1 ) class="active"  @endif ></li>
						@endif
					@endfor
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					@php $isActive = false; @endphp

					@for($i = 1 ; $i <= 5 ;$i++)
						
						@if($property->getImage($i)!=false)
						<div class="item @if($isActive == false) active @php $isActive = true; @endphp @endif">
							<img src = "{{$property->getImage($i)}}" alt="{{$i-1}}">
						</div>
						@endif
						
					@endfor

					@if($dataSlideIndex == 0)
						<div class="item active">
							<img src = "https://www.transparenttextures.com/patterns/asfalt-light.png" alt="0">
						</div>	
					@endif
				</div>
				<!-- Left and right controls -->
				@if( $dataSlideIndex > 1 )
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="false"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="false"></span>
							<span class="sr-only">Next</span>
						</a>
				@endif
			</div>
			<!--Info about the property-->
			<div class="well property-info">
				<div class ="text-center" style="float: left;width:33%;">
					<h4><strong>Surface</strong></h4>
					<h5>{{$property->surface.' m²'}} </h5>
				</div>
				<div class ="text-center" style="float: left;width:33%;">
					<h4><strong>Rooms</strong></h4>
					<h5>{{$property->numberOfRooms}}</h5>
				</div>
				@if( $property->propertyType == 'apartment' )

				<div class ="text-center" style="float: left;width:33%;">
					<h4><strong>Floor</strong></h4>
					<h5>{{$property->floorNumber}}</h5>
				</div>
				@elseif( $property->propertyType == 'house' )
				<div class ="text-center" style="float: left;width:33%;">
					<h4><strong>Number of floors</strong></h4>
					<h5>{{$property->numberOfFloors}}</h5>
				</div>	
				@endif
				<br style="clear: left;" />
			</div>
		</div>
		<div class="col-sm-4 text-right">
			<!--Info about the property-->
			<h3>For {{$property->transactionType}}</h3>
			<h2>{{number_format($property->price)}}&euro;</h2>
			<!--Contact the owner-->
			<div class="text-center well owner-info">
				<img src="../img/user.png" class="img-responsive center-block user-placeholder">
				<h4><strong>{{$user->lastName}} {{$user->firstName}}</strong></h4>
				<h4><span class="glyphicon glyphicon-phone-alt"></span> {{$user->phone}}</h4>
				<form class="well " action="{{ url('contactUser') }}" method="post" id="send_mail_form">
					{{  csrf_field()  }}
					<h4><strong>Leave a message to the owner</strong></h4>
					<div class="form-group col-md-12">
						<input name="emailFrom" placeholder="E-mail" class="form-control" type="email" required>
					</div>
					<div class="form-group col-md-12">
						<textarea name="content" class="form-control" rows="4" placeholder="Message" required></textarea>
					</div>
					<input type="submit" class="btn btn-default" value="Send">
				</form>
			</div>
		</div>
	</div>

	<div class="well">
		<!--Location of the property on the map-->
		<div class="well">
			<h3 class="location-tag">Location of the property on the map</h3>
			<h4 class="location-tag"><strong>Address </strong>{{$property->address}}</h4>
			<div name="LatLng">
				<p hidden name="latitude" id="latitude">{{$property->latitude}}</span>
				<p hidden name="longitude" id="longitude">{{$property->longitude}}</span>
			</div>
		<div style="width:100%; height: 400px; overflow: hidden; ">
			<div id="map" class="property-mark-on-map"></div>
		</div>
	</div>

@stop

@section('scripts')

	<script type="text/javascript" src="/js/singlePropertyMarkOnMap.js"></script>

	<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQCQ1quNQm1Geb__wZNXjJrPqT6VzyaNY&callback=initMap"></script>

@stop