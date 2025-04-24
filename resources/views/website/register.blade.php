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
<div class="login-container margin py-5" style="background: #f9fbe7;">
    <div class="auto-container">
        <div class="inner-container">

            <!-- Unified Card for Image and Form -->
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="row no-gutters align-items-stretch">

                    <!-- Veggie Image Fills Left Column -->
                    <div class="col-md-6 p-0">
                        <img src="{{ URL::asset('website/images/resource/veggie-start.png') }}" 
                             alt="Veggie Start" 
                             class="img-fluid h-100 w-100" 
                             style="object-fit: cover; border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    </div>

                    <!-- Registration Form -->
                    <div class="col-md-6 bg-white p-4 d-flex flex-column justify-content-center">
                        <div class="text-center mb-3">
                            <h2><b>Create your hero account!</b></h2>
                        </div>

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

                            <div class="form-group">
                                <input type="password" id="password" name="password" placeholder="Password" minlength="8" required value="{{ old('password') }}">
                                <small id="passwordError" style="color: red; display: none;">Password must be at least 8 characters, contain 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.</small>
                            </div>

                            <div class="form-group">
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" minlength="8" required value="{{ old('password_confirmation') }}">
                                <small id="confirmPasswordError" style="color: red; display: none;">Passwords do not match.</small>
                            </div>

                            <div class="form-group">
                                <div class="check-box"><input type="checkbox" required id="account-option"> &ensp; <label for="account-option">I have read and accept the Terms and Privacy Policy</label></div>
                            </div>

                            <div class="form-group text-center">
                                <button class="theme-btn btn-style-one MyButton" type="submit"><span class="txt">Register</span></button>
                                <br>Already have an account? <a href="{{ route('login') }}">Log In</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <!-- End Unified Card -->

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