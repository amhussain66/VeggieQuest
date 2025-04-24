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
<div class="login-container margin py-5" style="background: #f9fbe7;">
    <div class="auto-container">
        <div class="inner-container">

            <!-- Unified Card for Image and Form -->
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="row no-gutters align-items-stretch">

                    <!-- Image Column -->
                    <div class="col-md-6 p-0">
                        <img src="{{ URL::asset('website/images/resource/log-in.png') }}" 
                             alt="Log In" 
                             class="img-fluid h-100 w-100" 
                             style="object-fit: cover; border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    </div>

                    <!-- Login Form Column -->
                    <div class="col-md-6 bg-white p-4 d-flex flex-column justify-content-center">
                        <div class="text-center mb-3">
                            <h2><b>Welcome back Hero! 
                                <br>
                                Log in below</b></h2>
                        </div>

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

                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="check-box">
                                    <input type="checkbox" id="account-option"> &ensp; 
                                    <label for="account-option">Remember me</label>
                                </div>
                                <a href="{{ route('forgotpassword') }}">Forgot password?</a>
                            </div>

                            <div class="form-group text-center">
                                <button class="theme-btn btn-style-one MyButton" type="submit"><span class="txt">Login</span></button>
                                <br>Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <!-- End Unified Card -->

        </div>
    </div>
</div>
<!-- End Login Container -->


@endsection
