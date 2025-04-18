@extends('website.includes.master')

@section('title')
    Activities
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/12.png') }})">
        <div class="auto-container">
            <h1>Activities</h1>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Video Section -->
    <section class="video-section" style="background-image: url({{ URL::asset('website/images/background/1.png') }})">
        <div class="auto-container">


            <div class="row mb-5">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center justify-content-center">
                    <iframe id="webplayer"
                            title="Match It - Fruits and Vegetables Free Games online for kids in Nursery by Tiny Tap"
                            style="background-color:transparent" width="100%" height="600" webkitallowfullscreen=""
                            mozallowfullscreen="" allowfullscreen="" allowtransparency="true"
                            data_src="https://static.tinytap.com/media/webplayer/webplayer.html?id=4AAEE896-CA1A-4B77-837C-B1BAC6DD608C"
                            src="https://static.tinytap.com/media/webplayer/webplayer.html?id=4AAEE896-CA1A-4B77-837C-B1BAC6DD608C"></iframe>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12 text-center justify-content-center">
                    <h3 class="mb-3"><b>PLAY HEALTHY AND UNHEALTHY FOOD GAMES</b></h3>
                    <a href="https://wordwall.net/resource/4153860/healthy-and-unhealthy-food" target="_blank">
                        <img src="{{ URL::asset('website/images/h.png') }}" style="width: 100%" alt="">
                    </a>
                </div>
            </div>


            <div class="row clearfix">

                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12">
                    <iframe style="width: 100% !important;height: 300px;object-fit: cover"
                            src="https://www.youtube.com/embed/LhYtcadR9nw"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>

                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12">
                    <iframe style="width: 100% !important;height: 300px;object-fit: cover"
                            src="https://www.youtube.com/embed/-1-s8GBpFeQ"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>

                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12">
                    <iframe style="width: 100% !important;height: 300px;object-fit: cover"
                            src="https://www.youtube.com/embed/QphRMalB_LM"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>

                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12">
                    <iframe style="width: 100% !important;height: 300px;object-fit: cover"
                            src="https://www.youtube.com/embed/aHVR2FnTpdk"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>


                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12">
                    <iframe style="width: 100% !important;height: 300px;object-fit: cover"
                            src="https://www.youtube.com/embed/WpIFlh5whcs"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>

            </div>
        </div>
    </section>
    <!-- End Video Section -->

@endsection
