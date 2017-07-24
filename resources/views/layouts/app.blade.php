<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/base.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/w3.css')}}" >
        @yield("external")
        <title>App Name - @yield('title')</title>
           
    </head>
    
    <body>
        @section("header")
        
         <div class="w3-bar w3-border w3-indigo header w3-display-container">
           <a href="#" class="w3-bar-item w3-bar-logo"></a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green">Link 1</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green">Link 2</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green">Link 3</a>
           @if (Route::has('login'))
           <div class="w3-display-right">
                    @if (Auth::check())
                        <a href="{{ url('/') }}" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green ">Home</a>
                        <a href="{{url('/logout')}}" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green ">Logout</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="#">Register(မရေသးပါ)</a>
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
