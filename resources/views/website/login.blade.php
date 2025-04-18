@extends('website.includes.master')

@section('title')
    Login
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/17.png') }})">
        <div class="auto-container">
            <h1>Login</h1>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Login Container -->
    <div class="login-container margin">
        <div class="top-layer" style="background-image:url({{ URL::asset('website/images/background/20.png') }})"></div>
        <div class="bottom-layer" style="background-image:url({{ URL::asset('website/images/background/21.png') }})"></div>
        <div class="auto-container">
            <div class="inner-container">

                <div class="image">
                    <img src="{{ URL::asset('website/images/resource/login.jpg') }}" alt="" />

                    <!-- Login Form -->
                    <div class="login-form">
                        <div class="pattern-layer text-center" style="background-image:url({{ URL::asset('website/images/background/18.png') }})">
                            <h2 class="mt-3"><b>Login with your account</b></h2>
                        </div>

                        <br>
                        @include('website.includes.laravel_errors')
                        <form method="post" action="{{ route('customerlogin') }}" class="contact-form style2 MyForm">
                            @csrf

                            <input type="hidden" name="type" value="user">

                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email" required value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" minlength="8" required value="{{ old('password') }}">
                            </div>

                            <div class="form-group">
                                <div class="check-box"><input type="checkbox" id="account-option"> &ensp; <label for="account-option">Remember me</label> <a href="{{ route('forgotpassword') }}">Forgot password?</a></div>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one MyButton" type="submit"><span class="txt">Login</span></button>
                                Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                            </div>

                        </form>

                    </div>
                    <!-- End Register Form -->

                </div>

            </div>
        </div>
    </div>
    <!-- End Register Container -->

@endsection
