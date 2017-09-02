
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/base.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/w3.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="{{URL::asset('/css/admin/base.css')}}" >
        <link rel="stylesheet"  type="text/css"  href="../css/font-awesome.css" >
        <link href="../img/logo.png" rel="icon"/>
        <script src="{{URL::asset('/js/jquery.js')}}" type="text/javascript" ></script>
        <script src="{{URL::asset('/js/base.js')}}" type="text/javascript" ></script>
        <script src="{{URL::asset('/js/admin/base.js')}}" type="text/javascript" ></script>
        @yield("external")
        <title>Learn4Myanmar - @yield('title')</title>

    </head>

    <body>
 @section("header")             
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-indigo w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <a href="#" class="w3-button w3-padding-16 w3-hide-large w3-white w3-hover-black w3-display-topright" onclick="w3_close()" title="close menu"><i class="fa fa-close"></i></a>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../img/logo.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong> <?=Auth::user()->name?> </strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button setting-btn"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
      <h5 class="w3-white w3-center w3-padding-16" class="w3-button">Dashboard</h5>
  </div>
  <div class="w3-bar-block">
     <a href="#" class="w3-bar-item w3-button w3-padding-16" id="admin_home"> Overview</a>
     <a href="#" class="w3-bar-item w3-button w3-padding-16" id="admin_major">Major</a>
     <a href="#" class="w3-bar-item w3-button w3-padding-16" id="admin_subject">Subject</a>
     <a href="#" class="w3-bar-item w3-button w3-padding-16" id="admin_content">Content</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-16 setting-btn">Settings</a>
     @if (Route::has('login'))
            
                @if (Auth::check())
                <a href="{{url('/logout')}}" class="w3-bar-item w3-red w3-button w3-center w3-display-bottomleft w3-hover-none w3-hover-text-green w3-padding-16">Logout</a>
                @endif
            
            @endif
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>  
<a onclick="w3_open()" title="Open mENU" href="#" id="open_menu" class="w3-indigo  w3-hide-large"><i class="fa fa-navicon"></i></a>
   @section('sidebar')

    @show

<div class="container">
    @yield('content')
</div>       


<script>
var BASE_URL = "<?=url('/')?>";
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
    </body>
</html>   
