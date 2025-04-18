@extends('website.includes.master')

@section('title')
    Veggie Facts & Benefits
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/12.png') }})">
        <div class="auto-container">
            <h1>Veggie Facts & Benefits</h1>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Resources Section -->
    <section class="video-section"
             style="background-image: url({{ URL::asset('website/images/background/1.png') }});padding-top: 0px">
        <div class="auto-container">

            <div class="row text-center justify-content-center">
                <h1 class="mb-3">
                    <b>
                        Veggie Facts & Benefits
                    </b>
                </h1>
            </div>

            <section class="about-section">
                <div class="layer-one" style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
                <div class="layer-two" style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
                <div class="auto-container">

                    <div class="row clearfix">

                        <!-- Image Column -->
                        <div class="image-column col-lg-4 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ URL::asset('website/images/resource/v.webp') }}" alt="" />
                                </div>
                            </div>
                        </div>

                        <!-- Content Column -->
                        <div class="content-column col-lg-8 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <!-- Sec Title -->
                                <div class="sec-title">
                                    <div class="title">Veggie Facts & Benefits</div>
                                    <h2>VEGGIE FACTS & BENEFITS</h2>
                                </div>
                                <div class="bold-text">🥦 Veggie Fun Facts & Superpowers! 🥕</div>
                                <p>Eating vegetables isn't just healthy—it’s like fueling your body with superpowers! Check out these cool facts about your favorite veggies and why they’re so good for you.</p>

                                <div class="bold-text">🥦 Broccoli – The Tiny Tree of Power</div>
                                <p>Did you know broccoli contains more vitamin C than an orange? It’s packed with antioxidants that help boost your immune system and keep your skin glowing!</p>

                            </div>
                        </div>

                    </div>


                    <div class="row my-4">
                        <div class="col-md-12 col-center m-auto">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Carousel -->
                                <div class="carousel-inner">
                                    <div class="item carousel-item active">
                                        <img src="{{ URL::asset('website/images/resource/r3.jpg') }}" alt="" style="width: 100%;height:500px;object-fit: cover;border-radius: 5%">
                                    </div>
                                    <div class="item carousel-item">
                                        <img src="{{ URL::asset('website/images/resource/r5.jpg') }}" alt="" style="width: 100%;height:500px;object-fit: cover;border-radius: 5%">
                                    </div>
                                    <div class="item carousel-item">
                                        <img src="{{ URL::asset('website/images/resource/r4.jpg') }}" alt="" style="width: 100%;height:500px;object-fit: cover;border-radius: 5%">
                                    </div>
                                </div>
                                <!-- Carousel Controls -->
                                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-12">
                            <div class="bold-text"><b>🥕 Carrots – X-Ray Vision Booster</b></div>
                            <p>Carrots are loaded with beta-carotene, which your body turns into vitamin A. This helps improve your eyesight—especially at night! So, if you want superhero vision, eat your carrots!</p>
                        </div>

                        <div class="col-md-12">
                            <div class="bold-text"><b>🍠 Sweet Potatoes – Energy Bombs</b></div>
                            <p>Sweet potatoes are packed with fiber and slow-digesting carbs, giving you long-lasting energy. Plus, they help keep your heart healthy!</p>
                        </div>

                        <div class="col-md-12">
                            <div class="bold-text"><b>🥑 Avocados – The Brain Fuel</b></div>
                            <p>Avocados are full of healthy fats that boost brain power and keep your heart strong. No wonder they’re called a superfood!</p>
                        </div>

                        <div class="col-md-12">
                            <div class="bold-text"><b>🥬 Spinach – Strength in Every Bite</b></div>
                            <p>Just like Popeye, spinach can make you stronger! It’s rich in iron, which helps carry oxygen to your muscles, making you feel more energized.</p>
                        </div>

                        <div class="col-md-12">
                            <div class="bold-text"><b>🌽 Corn – Nature’s Popcorn</b></div>
                            <p>Corn has its own built-in sunscreen! It contains lutein and zeaxanthin, which protect your eyes from harmful UV rays. Who knew?!</p>
                        </div>


                        <br>

                        <div class="col-md-12 text-center justify-content-center">
                            <div class="bold-text"><h2><b>🌱 Eat Your Superpowers!</b></h2></div>
                            <p>Each vegetable has its own special ability to keep you strong, smart, and energized. So, add more veggies to your plate and unlock your health superpowers every day! Would you like any customization, such as a specific design, images, or additional facts? 😊</p>
                        </div>


                        <br>

                        <div class="col-md-12 text-center justify-content-center">
                            <iframe width="866" height="487" src="https://www.youtube.com/embed/00xZyFeUSf8" title="🥕🥦 Discover Healthy Vegetables: Fun Facts and Benefits for Kids! 🥬🍅 #vegetables #kidslearning" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>
            </section>

        </div>
    </section>
    <!-- End Resources Section -->

@endsection
