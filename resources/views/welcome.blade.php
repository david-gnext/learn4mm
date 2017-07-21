@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="flex-center position-ref full-height w3-container main-content">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
<!--            card major -->
        <div class="w3-row">
            <div class="w3-card-4 w3-col s3 w3-center">

                <header class="w3-container w3-blue">
                    <h1>English</h1>
                </header>

                <div class="w3-container">
                    <p>You will learn 30 အလံုးေရ</p>
                </div>

                <footer class="w3-container w3-blue">
                    <h5>Footer</h5>
                </footer>

            </div>
             <div class="w3-card-4 w3-col s3 w3-center">

                <header class="w3-container w3-purple">
                    <h1>English</h1>
                </header>

                <div class="w3-container">
                    <p>You will learn 30 အလံုးေရ</p>
                </div>

                <footer class="w3-container w3-purple">
                    <h5>Footer</h5>
                </footer>

            </div>
             <div class="w3-card-4 w3-col s3 w3-center">

                <header class="w3-container w3-blue-gray">
                    <h1>English</h1>
                </header>

                <div class="w3-container">
                    <p>You will learn 30 အလံုးေရ</p>
                </div>

                <footer class="w3-container w3-blue-gray">
                    <h5>Footer</h5>
                </footer>

            </div>
        </div>
<div class="w3-row">
            <div class="w3-card-4 w3-col s3 w3-center">

                <header class="w3-container w3-amber">
                    <h1>English</h1>
                </header>

                <div class="w3-container">
                    <p>You will learn 30 အလံုးေရ</p>
                </div>

                <footer class="w3-container w3-amber">
                    <h5>Footer</h5>
                </footer>

            </div>
             <div class="w3-card-4 w3-col s3 w3-center">

                <header class="w3-container w3-flat-emerald">
                    <h1>English</h1>
                </header>

                <div class="w3-container">
                    <p>You will learn 30 အလံုးေရ</p>
                </div>

                <footer class="w3-container w3-flat-emerald">
                    <h5>Footer</h5>
                </footer>

            </div>
             <div class="w3-card-4 w3-col s3 w3-center">

                <header class="w3-container w3-blue">
                    <h1>English</h1>
                </header>

                <div class="w3-container">
                    <p>You will learn 30 အလံုးေရ</p>
                </div>

                <footer class="w3-container w3-blue">
                    <h5>Footer</h5>
                </footer>

            </div>
        </div>
        </div>
@endsection