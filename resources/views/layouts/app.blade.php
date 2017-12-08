<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0' name='viewport'>
        <meta name="description" content="free myanmar learning site">
        <meta name="keywords" content="learning in myanmar,programming,language">
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/w3.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/base.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/font-awesome.css')}}" >
        <link href="../img/logo.png" rel="icon"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{URL::asset('/js/jquery.js')}}" type="text/javascript" ></script>
        @yield("external")
        <title>Best Myanmar Learning Site - @yield('title')</title>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6877521442891488",
            enable_page_level_ads: true
          });
        </script>
    </head>

    <body>
        @section("header")

         <div class="w3-bar w3-border w3-indigo header w3-row w3-card-4 w3-small">
          <a href="#" class="w3-bar-item w3-bar-logo"></a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green w3-hide-small">About</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-hover-text-green w3-hide-small">Contact Me</a>
          <span class="w3-bar-item w3-button w3-white w3-text-indigo w3-large w3-hover-white w3-col s12 m4">သင္ယူေလ့လာၿပီးမွ်ေ၀လိုက္ၾကရေအာင္</span>
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
