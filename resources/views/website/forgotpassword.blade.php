@extends('website.includes.master')

@section('title')
    Reset your password
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/17.png') }})">
        <div class="auto-container">
            <h1>Reset your password</h1>
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
                            <h2 class="mt-3"><b>Reset your password</b></h2>
                        </div>
                        <br>
                        @include('website.includes.laravel_errors')
                        <form class="MyForm" method="post" action="{{ route('resetpassword') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one MyButton" type="submit"><span class="txt">Reset Password</span></button>
                                Go back to login page <a href="{{ route('login') }}">Login</a>
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
