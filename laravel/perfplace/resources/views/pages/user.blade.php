@extends('main')

@section('title',Auth::user()->firstName.' '.Auth::user()->lastName)

@section('stylesheets')
	
	<link rel="stylesheet" href="css/profile_styles.css">

@stop

@section('scripts')

	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>

	<script type="text/javascript" src="js/validations/validateProfileEdits.js"></script>
	<script type="text/javascript" src="js/validations/fillInBlanks.js"></script>

	<!--Adjust padding for smaller forms-->
	<script type="text/javascript" src="js/adjustPaddingOfSmallerForms.js"></script>

@stop

@section('content')

@if (Session::has('problem'))
    <div class="alert alert-info">{{ Session::get('problem') }}</div>
@endif

	<div class="well container-fluid">
		<!--Edit how others see you-->
		<div class="col-sm-4 biggest-form">

			{!! Form::open(['url' =>'profile/editNames', 'method' => 'PUT','class' => 'well container-fluid center', 'id' => 'editNamesForm']) !!}

			{{csrf_field()}}

				<h1 class="well">Edit how others see you</h1>
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="username" name="username" value="{{Auth::user()->username}}" placeholder="Username" class="form-control" type="text">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="firstName" name="firstName" value="{{Auth::user()->firstName}}" placeholder="First name" class="form-control" type="text">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="lastName" name="lastName" value="{{Auth::user()->lastName}}" placeholder="Last name" class="form-control" type="text">
					</div>
					<input type="submit" name="changeNamesButton" class="submit btn btn-default center-block" value="Apply changes" onclick="validateChangeNamesForm()">
				</div>
			{!! Form::close() !!}

		</div>
		<!--Change your password-->
		<div class="col-sm-4">
			{!! Form::open(['url' =>'profile/changePassword', 'method' => 'PUT','class' => 'well container-fluid center', 'id' => 'changePasswordForm']) !!}

			{{csrf_field()}}
			
				<h1 class="well">Change your password</h1>
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" name="password" placeholder="New password" class="form-control" type="password">
					</div>
					<div class="form-group input-group smaller-form-last-element">
						<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></i></span>
						<input id="password_confirmation" name="password_confirmation" placeholder="Confirm password" class="form-control" type="password">
					</div>
					<input type="submit" name="changePasswordButton" class="submit btn btn-default center-block" value="Apply changes" onclick="validateChangePasswordForm()">
				</div>
			{!! Form::close() !!}
		</div>
		<!--Edit contact information-->
		<div class="col-sm-4">

		{!! Form::open(['url' =>'profile/editContactInformation', 'method' => 'PUT','class' => 'well container-fluid center', 'id' => 'editContactInformationForm']) !!}

			{{csrf_field()}}

			<form class="well container-fluid" method="post" id="changeContactInformationForm">
				<h1 class="well">Edit contact information</h1>
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
						<input id="phone" name="phone" value="{{Auth::user()->phone}}" placeholder="Phone number" class="form-control" type="text">
					</div>
					<div class="form-group input-group smaller-form-last-element">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input id="email" name="email" value="{{Auth::user()->email}}" placeholder="Email" class="form-control" type="email">
					</div>
					<input type="submit" name="changeContactInformationButton" class="submit btn btn-default center-block" value="Apply changes" onclick="validateChangeContactInformationForm()">
				</div>
			{!! Form::close() !!}
		</div>
		<!--End of container-->
	</div>

@stop