@extends('layouts.app')
@section("external")
<link rel="stylesheet" href="{{URL::asset('/css/user/base.css')}}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="flex-center position-ref full-height w3-container main-content w3-row">
    <div class="w3-panel w3-red w3-text-sand alert-msg">
        <h3>
            မန္ဘာအသစ္မွတ္ပံုတင္ၿခင္းမရေသးပါ။Data Serverရဲ႕လိုအပ္ခ်က္ေၾကာင့္ၿဖစ္သည္။<br>
            သို႕ေသာ္Email ႏွင့္Password ေနရာတြင္demoႏွင့္demoရိုက္ၿပီး၀င္ေရာက္ေလ့လာႏိုင္ပါသည္။<br>
        ေက်းဇူးတင္ပါသည္။
        </h3>
    </div>
    <form class="w3-container w3-card-4 s12 m6 w3-col login" action="logging" method="post">
     <div class="w3-container w3-indigo">
        <h2>LogIn Form</h2>
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <label class="w3-text-indigo"><b>Email</b></label>
    <input class="w3-input w3-border" name="email" type="text">

    <label class="w3-text-indigo"><b>Password</b></label>
    <input class="w3-input w3-border" name="pass" type="password">

    <button class="w3-btn w3-indigo login-btn">Login</button>
      @if(session()->has('message'))
      <h3 class="w3-panel w3-red">{!! session()->get('message') !!}</h3>
    @endif
    </form>
</div>
@endsection
