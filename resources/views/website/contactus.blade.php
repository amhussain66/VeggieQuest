@extends('website.includes.master')

@section('title')
    Contact Us
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/14.jpg') }})">
        <div class="auto-container">
            <h1> Contact Us</h1>
        </div>
    </section>
    <!--End Page Title-->

    <div class="contact-page-container">
        <div class="pattern-layer" style="background-image:url({{ URL::asset('website/images/background/16.png') }})"></div>
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>Get in touch <br> and let us know how <br> we can help.</h2>
                        </div>
                        <ul class="contact-info-list">
                            <li>Address : {{ $system->location }}</li>
                            <li>Email : {{ $system->email }}</li>
                            <li>Phone : {{ $system->phone }}</li>
                        </ul>
                        <div class="map">
                            <img src="{{ URL::asset('website/images/icons/map.png') }}" alt="" />
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <!-- Contact Form -->
                        <div class="contact-form">

                            <!-- Contact Form -->
                            <form action="{{ route('save_contact_message') }}" method="POST" class="contact-form style2 MyForm">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>

                                <div class="form-group">
                                    <textarea class="darma" name="message" placeholder="Type Your Message"></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <button class="theme-btn btn-style-one MyButton" type="submit" name="submit-form"><span class="txt">Submit</span></button>
                                </div>

                            </form>

                        </div>
                        <!-- End Contact Form -->

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
