@extends('main')

@section('title', 'Forgot password')

@section('stylesheets')
	
	{{Html::style('css/resetPassword_styles.css')}}

@stop

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Forgot password</div>
				<div class="panel-body">
				
				@if (session('status'))
					<div class="alert alert-success">
						{{session('status')}}
					</div>
				@endif 
					
				{!!Form::open(['url' => 'password/email' , 'method' => 'POST', 'class' => 'well'])!!}
					{{Form::label('email', 'What is your e-mail address?')}}
					{{Form::email('email',null, ['class' => 'form-control'])}}
					<br>
					{{Form::submit('Send password reset request', ['class' => 'btn btn-default center-block']) }}
				{!!Form::close()!!}

				</div>
			</div>
		</div>
	</div>

@stop