@extends('main')

@section('stylesheets')

	{{Html::style('css/filteringResults_styles.css')}}

@stop

@section('content')

	<div class="well container-fluid">
		<h1 class ="well">The results of your search</h1>
		<a class="link-to-edit" href="/map"><span class="glyphicon glyphicon-edit"></span> Get back to edit search criteria</a>
	</div>
	@if (count($properties) == 0) 
		<div class="alert alert-info text-center">
  			<strong>Sorry...</strong> Your search criteria couldn't match any properties.
		</div>
	@else 
		@foreach($properties as $index => $property)
			<div class="well container-fluid col-sm-12" method="post" id="houseListForm">
				<div class="container-fluid col-sm-4">
					<div id="myCarousel{{$index}}" class="myCarousel carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">

							@php
								$dataSlideIndex = 0;
							@endphp

							@for($i=1;$i<=5;$i++)

								@if($property->getImage($i)!=false)
									<li data-target="#myCarousel{{$index}}" data-slide-to="{{$dataSlideIndex++}}" @if($dataSlideIndex == 1 ) class="active"  @endif ></li>
								@endif

							@endfor

						</ol>

						<div class="carousel-inner" role="listbox">
							@php 
								$isActive = false;
							@endphp

							@for($i = 1 ; $i <= 5 ;$i++)
										
								@if($property->getImage($i)!=false)
									<div class="item @if($isActive == false) active @php $isActive = true; @endphp @endif">
										<img src = "{{$property->getImage($i)}}" alt="{{$i-1}}">
									</div>
								@endif

							@endfor
							
						</div>

						<!-- Left and right controls -->

						@if($dataSlideIndex >1 )
							<a class="left carousel-control" href="#myCarousel{{$index}}" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="false"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel{{$index}}" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="false"></span>
								<span class="sr-only">Next</span>
							</a>
						@endif

					</div>
				</div>
				<div class="container-fluid col-sm-8">
					<div class="well">
						<div>
							<div class ="text-left" style="float: left; width:80%;">
								<h2><strong>{{$property->title}}</strong></h2>
							</div>
							<div class ="text-right" style="float: left; width:20%; padding-top:25px; padding-right:25px;">
								<p data-placement="top" data-toggle="tooltip" title="View">
									<a href="{{route('properties.show',$property->id)}}">
										<button class="btn btn-success btn-lg" data-title="View" action={{ url('properties/'.$property->id)}}>
											<span class="glyphicon glyphicon-eye-open"></span>
										</button>
									</a>
								</p>
							</div>
							<br style="clear: left;">
						</div>
						<h4 ><strong>Address </strong>{{$property->address}}</h4>
						<h4><strong>For {{$property->transactionType}}</strong> {{number_format($property->price)}}&euro;</h4>
						<div class="add-line-on-top">
							<div class ="text-center" style="float: left;width:33%;">
								<h4><strong>Surface</strong></h4>
								<h5>{{$property->surface}} m²</h5>
							</div>
							@if($property->propertyType=='apartment')
								<div class ="text-center" style="float: left;width:33%;">
									<h4><strong>Floor</strong></h4>
									<h5>{{$property->floorNumber}}</h5>
								</div>
							@elseif($property->propertyType=='house')
								<div class ="text-center" style="float: left;width:33%;">
									<h4><strong>Number of floors</strong></h4>
									<h5>{{$property->numberOfFloors}}</h5>
								</div>
							@endif
							<div class ="text-center" style="float: left;width:33%;">
								<h4><strong>Rooms</strong></h4>
								<h5>{{$property->numberOfRooms}}</h5>
							</div>
							<br style="clear: left;">
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@endif
	
<div class="text-center">
		{!! $properties->links();!!}
</div>

@stop