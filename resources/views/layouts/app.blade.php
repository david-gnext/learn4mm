<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0' name='viewport'>
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/base.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/w3.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/font-awesome.css')}}" >
        <link href="../img/logo.png" rel="icon"/>
        <script src="{{URL::asset('/js/jquery.js')}}" type="text/javascript" ></script>
        @yield("external")
        <title>App Name - @yield('title')</title>
           
    </head>
    
    <body>
        @section("header")
        
         <div class="w3-bar w3-border w3-indigo header w3-row w3-card-4">
          <a href="#" class="w3-bar-item w3-bar-logo w3-col s6 m3"></a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green w3-col s6 m1">Link 1</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green w3-col s6 m1">Link 2</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green w3-col s6 m1">Link 3</a>
           @if (Route::has('login'))
           <div class="w3-rest setting">
                    @if (Auth::check())
                        <a href="{{ url('/') }}" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green"><i class="fa fa-home"></i>Home</a>
                        <a href="{{url('/logout')}}" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green"><i class="fa fa-sign-out"></i>Logout</a>
                    @else
                        <a href="{{ url('/login') }}" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green "><i class="fa fa-sign-in"></i>Login</a>
                        <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green"><i class="fa fa-registered"></i>Register(မရေသးပါ)</a>
                    @endif
                    </div>
            @endif
        </div>
        
        @section('sidebar')

        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>   
