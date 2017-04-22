@extends('main')

@section('title','Single Property')

@section('stylesheets')

	{{Html::style('css/singleProperty_styles.css')}}

@stop

@section('content')

	<div class="well container-fluid">
		<div class="col-sm-8 text-left">
			<h1 class="well">Apartment with 2 rooms in Bucharest</h1>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="https://img2.imonet.ro/X3H7/3H71000A5S2/apartament-de-vanzare-5-camere-bucuresti-herastrau-76117272_620x465.jpg" alt="1">
					</div>
					<div class="item">
						<img src="https://img2.imonet.ro/X3H7/3H71000A5S2/apartament-de-vanzare-5-camere-bucuresti-herastrau-76117274_620x465.jpg" alt="2">
					</div>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--Info about the property-->
			<div class="well property-info">
				<div class ="text-center" style="float: left;width:33%;">
					<h4><strong>Surface</strong></h4>
					<h5>100 m2</h5>
				</div>
				<div class ="text-center" style="float: left;width:33%;">
					<h4><strong>Floor</strong></h4>
					<h5>4</h5>
				</div>
				<div class ="text-center" style="float: left;width:33%;">
					<h4><strong>Rooms</strong></h4>
					<h5>3</h5>
				</div>
				<br style="clear: left;" />
			</div>
		</div>
		<div class="col-sm-4 text-right">
			<!--Info about the property-->
			<h3>For sale</h3>
			<h2>10.250.000&euro;</h2>
			<!--Contact the owner-->
			<div class="text-center well owner-info">
				<img src="../img/user.png" class="img-responsive center-block user-placeholder">
				<h4><strong>Ion Vasilescu</strong></h4>
				<h4><span class="glyphicon glyphicon-phone-alt"></span> +40 737 665 283</h4>
				<form class="well " action id="send_mail_form">
					<h4><strong>Leave a message to the owner</strong></h4>
					<div class="form-group col-md-12">
						<input name="email" placeholder="E-mail" class="form-control" type="email" required>
					</div>
					<div class="form-group col-md-12">
						<textarea class="form-control" rows="4" placeholder="Message" required></textarea>
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
			<h4 class="location-tag"><strong>Address </strong>Kisselef St., Bucharest, Romania</h4>
		</div>
		<div style="width:100%; height: 400px; overflow:hidden; ">
			<div id="map" class="property-mark-on-map"></div>
		</div>
	</div>





@stop

@section('scripts')

	<script type="text/javascript" src="js/singlePropertyMarkOnMap.js"></script>

	<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQCQ1quNQm1Geb__wZNXjJrPqT6VzyaNY&callback=initMap"></script>

	

@stop