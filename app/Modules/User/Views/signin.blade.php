@extends('layouts.app')
@section("external")
<link rel="stylesheet" href="{{URL::asset('/css/user/base.css')}}" />
@endsection
@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="flex-center position-ref full-height w3-container main-content">
    <form class="w3-container login w3-card-4" action="logging">
     <div class="w3-container w3-indigo">
        <h2>LogIn Form</h2>
    </div>
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
