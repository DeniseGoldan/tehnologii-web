<!DOCTYPE html>

<html lang="en">

  <head>

    @include('partials._head')

    @yield('stylesheets')

    @include('partials._javascript')

    @yield('scripts')

  </head>

  <body>

    @include('partials._nav')

        <div class="container-fluid" style="margin:0; padding:0; margin-top:70px;">
        
            @include('partials._messages')

            @yield('content')

            @include('partials._footer')

        </div> 

    

  </body>

</html>