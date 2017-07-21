<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/base.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/w3.css')}}" >
        <title>App Name - @yield('title')</title>
           
    </head>
    
    <body>
        @section("header")
        
         <div class="w3-bar w3-border w3-indigo header">
          <a href="#" class="w3-bar-item w3-button">Default</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green">Link 1</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green">Link 2</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green">Link 3</a>
        </div>
        
        @section('sidebar')
           
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>   
