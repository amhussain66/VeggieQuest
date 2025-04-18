@extends('website.includes.master')

@section('title')
    Create Account
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/17.png') }})">
        <div class="auto-container">
            <h1>Create Account</h1>
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
                            <h2 class="mt-3"><b>Create your account</b></h2>
                        </div>

                        <!-- Register Form -->
                        <br>
                        @include('website.includes.laravel_errors')
                        <form class="contact-form style2 MyForm" method="post" action="{{ route('save_register_user') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" required value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="phone" placeholder="Phone" required value="{{ old('phone') }}">
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <input type="text" name="address" placeholder="Address" required value="{{ old('address') }}">--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <input type="password" name="password" placeholder="Password" minlength="8" required value="{{ old('password') }}" >--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <input type="password" name="password_confirmation" minlength="8" placeholder="Confirm Password" required value="{{ old('password_confirmation') }}">--}}
{{--                            </div>--}}

                            <!-- Password Input -->
                            <div class="form-group">
                                <input type="password" id="password" name="password" placeholder="Password" minlength="8" required value="{{ old('password') }}">
                                <small id="passwordError" style="color: red; display: none;">Password must be at least 8 characters, contain 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.</small>
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="form-group">
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" minlength="8" required value="{{ old('password_confirmation') }}">
                                <small id="confirmPasswordError" style="color: red; display: none;">Passwords do not match.</small>
                            </div>

                            <div class="form-group">
                                <div class="check-box"><input type="checkbox" required id="account-option"> &ensp; <label for="account-option">I have read and accept the Terms and Privacy Policy</label></div>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one MyButton" type="submit"><span class="txt">Register</span></button>
                                Already have an account? <a href="{{ route('login') }}">Log In</a>
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
@section('script')
    <script>
        $(document).ready(function () {
            // $(".MyButton").hide();
            function validatePassword() {
                var password = $("#password").val();
                var passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/;

                if (!passwordPattern.test(password)) {
                    $("#passwordError").show();
                    // $(".MyButton").hide();
                    return false;
                } else {
                    $("#passwordError").hide();
                    // $(".MyButton").show();
                    return true;
                }
            }

            function validateConfirmPassword() {
                var password = $("#password").val();
                var confirmPassword = $("#password_confirmation").val();

                if (password !== confirmPassword) {
                    $("#confirmPasswordError").show();
                    // $(".MyButton").hide();
                    return false;
                } else {
                    $("#confirmPasswordError").hide();
                    // $(".MyButton").show();
                    return true;
                }
            }

            // Validate on input change
            $("#password").on("input", validatePassword);
            $("#password_confirmation").on("input", validateConfirmPassword);

        });
    </script>
@endsection