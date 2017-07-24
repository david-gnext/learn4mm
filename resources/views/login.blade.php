@extends('layouts.app')

@section('title', 'LogIn')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="flex-center position-ref full-height w3-container main-content">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
<!--            card major -->
        <div class="w3-row">
           
        </div>
        </div>
@endsection