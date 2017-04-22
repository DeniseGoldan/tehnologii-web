@extends('main')

@section('stylesheets')

	<link rel="stylesheet" href="css/registerForm_styles.css">

@stop

@section('content')
	
	<div class="well">
		<h1 class="well">Register and share dream homes with our viewers</h1>
	</div>

	<form class="well container-fluid" method="post" id="registerForm">
		<h2 class="text-center">Complete the following fields and join us.</h2>
		<div class="container-fluid col-md-offset-4 col-md-4">
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="desiredUsername" name="desiredUsername" placeholder="Username" class="form-control" type="text">
			</div>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="firstName" name="firstName" placeholder="First name" class="form-control" type="text">
			</div>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="lastName" name="lastName" placeholder="Last name" class="form-control" type="text">
			</div>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input id="desiredPassword" name="desiredPassword" placeholder="Password" class="form-control" type="password">
			</div>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></i></span>
				<input id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="form-control" type="password">
			</div>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
				<input id="phoneNumber" name="phoneNumber" placeholder="Phone number" class="form-control" type="text">
			</div>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input id="email" name="email" placeholder="Email" class="form-control" type="email">
			</div>
			<input type="submit" name="registerButton" class="submit btn btn-default center-block" value="Register" onclick="validateRegisterForm()">
		</div>
	</form>

@stop

@section('scripts')

	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
	<script type="text/javascript" src="js/validations/validateRegisterForm.js"></script>

@stop