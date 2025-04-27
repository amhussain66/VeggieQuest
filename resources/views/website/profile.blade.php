@extends('website.includes.master')

@section('title')
    Profile
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/blogs-bg.png') }})">
        <div class="auto-container">
            <h1>Profile</h1>
        </div>
    </section>
    <!--End Page Title-->

    <div class="contact-page-container">
        <div class="pattern-layer"
             style="background-image:url({{ URL::asset('website/images/background/16.png') }})"></div>
        <div class="auto-container pt-0">
            <div class="row clearfix" style="margin-top: -60px">

                <div class="form-column col-lg-10 col-md-10 col-sm-7">

                    <center>
                        <h2><b>Update Profile</b></h2>
                    </center>

                    <div class="inner-column pt-3">

                        <!-- Contact Form -->
                        <div class="contact-form">

                            <!-- Contact Form -->
                            <form action="{{ route('user.updateuserprofile') }}" method="POST"
                                  class="contact-form style2 MyForm">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Name" required value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" placeholder="Email" required readonly disabled value="{{ $user->email }}" style="cursor: not-allowed">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="Phone" required value="{{ $user->phone }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="New Password" minlength="8">
                                        </div>
                                    </div>

{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" name="address" placeholder="Address" required value="{{ $user->address }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>


                                <div class="form-group text-center">
                                    <button class="theme-btn btn-style-one MyButton" type="submit" name="submit-form">
                                        <span class="txt">Submit</span></button>
                                </div>

                            </form>

                        </div>
                        <!-- End Contact Form -->

                    </div>
                </div>

                <div class="form-column col-lg-2 col-md-2 col-sm-5">
                    @if(Auth::guard('websiteuser')->user()->level()==1) <img src="{{ URL::asset('website/images/level1.jpg') }}" alt=""> @endif
                        @if(Auth::guard('websiteuser')->user()->level()==2) <img src="{{ URL::asset('website/images/level2.jpg') }}" alt=""> @endif
                        @if(Auth::guard('websiteuser')->user()->level()==3) <img src="{{ URL::asset('website/images/level3.jpg') }}" alt=""> @endif

                    <div class="row text-center justify-content-center">

                        <strong class="mt-4">Level 1 <br> 3 Wishlist & 3 Answers</strong>

                        <strong class="mt-4">Level 2 <br> 10 Wishlist & 10 Answers</strong>

                        <strong class="mt-4">Level 3 <br> 30 Wishlist & 30 Answers</strong>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
