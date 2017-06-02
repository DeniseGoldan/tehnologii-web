<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><strong>Perfect Place Finder</strong></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      @if(Auth::check())
        <ul class="nav navbar-nav">
          <li><a href="/properties/create">Add Property</a></li>
          <li><a href="/userProperties">My Properties</a></li>
          
        </ul>
      @endif
      
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log in<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">Already have an account?</li>
              <li>
                <!-- Begin Sign in form -->
                {!! Form::open(['action' =>'auth\LoginController@login', 'method' => 'POST','class' => 'well container-fluid center', 'id' => 'signInForm']) !!}

                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="username" name="username" placeholder="Username" class="form-control" type="text">
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" name="password" placeholder="Password" class="form-control" type="password">
                  </div>
                  {{Form::checkbox('remember')}}{{Form::label('remember',"Remember Me")}}
                  <input type="submit" name="signInButton" class="submit btn btn-default center-block custom-sign-in-button" value="Sign in" onclick="">

                {!!Form::close()!!}
              </li>
              <!-- End of Sign in form -->
              <!-- Begin Register -->
              <li class="dropdown-header">New here?</li>
              <li><a href="/register">Join us</a></li>
              <!--End Register-->
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>