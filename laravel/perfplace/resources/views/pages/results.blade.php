@extends('main')

@section('stylesheets')

	{{Html::style('css/filteringResults_styles.css')}}

@stop

@section('content')

	<div class="well container-fluid">
		<h1 class ="well">The results of your search</h1>
		<a class="link-to-edit" href="/map"><span class="glyphicon glyphicon-edit"></span> Get back to edit search criteria</a>
		<div >
			<div class="query-element">2+ rooms</div>
			<div class="query-element">sale</div>
			<div class="query-element">rent</div>
			<div class="query-element">apartment</div>
			<br style="clear: left;">
		</div>

	</div>
	<!--Property number 1-->


		<div class="well container-fluid col-sm-12" method="post" id="houseListForm">
			<div class="container-fluid col-sm-4">
				<div id="myCarousel_1" class="myCarousel carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel_1" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel_1" data-slide-to="1"></li>
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
					<a class="left carousel-control" href="#myCarousel_1" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel_1" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="container-fluid col-sm-8">
				<div class="well">
					<div>
						<div class ="text-left" style="float: left; width:80%;">
							<h2><strong>Apartment in Bucharest</strong></h2>
						</div>
						<div class ="text-right" style="float: left; width:20%; padding-top:25px; padding-right:25px;">
							<p data-placement="top" data-toggle="tooltip" title="View">
								<a href="/property">
								<button class="btn btn-success btn-lg" data-title="View" action="/property">
									<span class="glyphicon glyphicon-eye-open"></span>
								</button>
								</a>
							</p>
						</div>
						<br style="clear: left;">
					</div>
					<h4 ><strong>Address </strong>Kisselef St., Bucharest, Romania</h4>
					<h4><strong>For sale</strong> at 10.200.000&euro;</h4>
					<div class="add-line-on-top">
						<div class ="text-center" style="float: left;width:33%;">
							<h4><strong>Surface</strong></h4>
							<h5>130 m2</h5>
						</div>
						<div class ="text-center" style="float: left;width:33%;">
							<h4><strong>Floor</strong></h4>
							<h5>3rd</h5>
						</div>
						<div class ="text-center" style="float: left;width:33%;">
							<h4><strong>Rooms</strong></h4>
							<h5>4</h5>
						</div>
						<br style="clear: left;">
					</div>
				</div>
			</div>
		</div>

	

	

	



	<div class="well container-fluid col-sm-12" method="post" id="houseListForm">
		<div class="container-fluid col-sm-4">
			<div id="myCarousel_3" class="myCarousel carousel slide" data-ride="carousel">

				<ol class="carousel-indicators">
					<li data-target="#myCarousel_3" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel_3" data-slide-to="1"></li>
				</ol>
		
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="https://img2.imonet.ro/X4JT/4JT1000037V/apartament-de-inchiriat-2-camere-bucuresti-aviatiei-76823022.jpg" alt="1">
					</div>
					<div class="item">
						<img src="https://img2.imonet.ro/X4JT/4JT1000037V/apartament-de-inchiriat-2-camere-bucuresti-aviatiei-76823028.jpg" alt="2">
					</div>
				</div>
	
				<a class="left carousel-control" href="#myCarousel_3" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel_3" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="container-fluid col-sm-8">
			<div class="well">
				<div>
					<div class ="text-left" style="float: left; width:80%;">
						<h2><strong>Apartment in Bucharest</strong></h2>
					</div>
					<div class ="text-right" style="float: left; width:20%; padding-top:25px; padding-right:25px;">
						<p data-placement="top" data-toggle="tooltip" title="View">
						<a href="/property">
							<button class="btn btn-success btn-lg" data-title="View">
								<span class="glyphicon glyphicon-eye-open"></span>
							</button>
						</a>
						</p>
					</div>
					<br style="clear: left;">
				</div>
				<h4><strong>Address </strong>Roman St., Bucharest, Romania</h4>
				<h4><strong>For rent</strong> at 1.200&euro; / month</h4>``
				<div class="add-line-on-top">
					<div class ="text-center" style="float: left;width:33%;">
						<h4><strong>Surface</strong></h4>
						<h5>128 m2</h5>
					</div>
					<div class ="text-center" style="float: left;width:33%;">
						<h4><strong>Floor</strong></h4>
						<h5>10th</h5>
					</div>
					<div class ="text-center" style="float: left;width:33%;">
						<h4><strong>Rooms</strong></h4>
						<h5>2</h5>
					</div>
					<br style="clear: left;">
				</div>
			</div>
		</div>
	</div>



	<div class="well container-fluid col-sm-12" method="post" id="houseListForm">
		<div class="container-fluid col-sm-4">
			<div id="myCarousel_4" class="myCarousel carousel slide" data-ride="carousel">
			
				<ol class="carousel-indicators">
					<li data-target="#myCarousel_4" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel_4" data-slide-to="1"></li>
				</ol>
			
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="https://img2.imonet.ro/X2F7/2F71000ANJJ/apartament-de-vanzare-sau-de-inchiriat-3-camere-bucuresti-aviatorilor-77149140_620x465.jpg" alt="1">
					</div>
					<div class="item">
						<img src="https://img2.imonet.ro/X2F7/2F71000ANJJ/apartament-de-vanzare-sau-de-inchiriat-3-camere-bucuresti-aviatorilor-77149148.jpg" alt="2">
					</div>
				</div>
			
				<a class="left carousel-control" href="#myCarousel_4" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel_4" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="container-fluid col-sm-8">
			<div class="well">
				<div>
					<div class ="text-left" style="float: left; width:80%;">
						<h2><strong>Apartment in Iasi</strong></h2>
					</div>
					<div class ="text-right" style="float: left; width:20%; padding-top:25px; padding-right:25px;">

						<p data-placement="top" data-toggle="tooltip" title="View">
						<a href="/property">
							<button class="btn btn-success btn-lg" data-title="View">
								<span class="glyphicon glyphicon-eye-open"></span>
							</button>
						</a>
						</p>
					</div>
					<br style="clear: left;">
				</div>
				<h4><strong>Address</strong> Petrescu St., Iasi, Romania</h4>
				<h4><strong>For rent</strong> at 1.000&euro; / month</h4>
				<div class="add-line-on-top">
					<div class ="text-center" style="float: left;width:33%;">
						<h4><strong>Surface</strong></h4>
						<h5>137 m2</h5>
					</div>
					<div class ="text-center" style="float: left;width:33%;">
						<h4><strong>Floor</strong></h4>
						<h5>2nd</h5>
					</div>
					<div class ="text-center" style="float: left;width:33%;">
						<h4><strong>Rooms</strong></h4>
						<h5>3</h5>
					</div>
					<br style="clear: left;">
				</div>
			</div>
		</div>
	</div>

	



@stop