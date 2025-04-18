@extends('website.includes.master')

@section('title')
    Home
@endsection

@section('content')

    <style>
        @keyframes bounceScale {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .veggie-animation {
            animation: bounceScale 2s infinite ease-in-out;
        }

        .categories-section {
            position: relative;
            padding: 40px 0px 40px;
        }
    </style>

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel">

            <!-- Slide Item -->
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{ URL::asset('website/images/resource/Veggie-superheros-togther.jpg') }})" ></div>

                <div class="container">
                    <h1 class="text-white" style="font-size: 72px">Ready to Power Up with Veggies? </h1>
                    <h6 class="text-white">Level up your health, boost
                        <br> 
                    </h6>
                </div>
            </div>

        </div>
    </section>
    <!--End Banner Section -->

    <section class="categories-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <h2><b>‘VEGGIE’</b> OF THE WEEK!</h2>
            <small>{{ $vog->description }}</small>
        </div>

        <div class="row text-center justify-content-center">
            <!-- <div class="col-md-12">
                <img src="{{ URL::asset('admin/assets/uploads/'.$vog->image) }}" class="veggie-animation"
                     style="width: 50%; object-fit: cover; border-radius: 50%;">
            </div> -->
        </div>

        
        <div class="text-center mt-4">
            <button id="reveal-fact-btn" class="theme-btn btn-style-one">Reveal a Veggie Fact</button>

            <div id="veggie-fact-box" style="display: none; margin-top: 20px;">
            <img src="{{ URL::asset('website/images/resource/veggie-carrot-fact.jpg') }}" 
                alt="Cartoon Carrot" 
                style="max-width: 300px; margin-bottom: 15px; border-radius: 20px;">

                <p class="fact-text">
                    🥕 Did you know? Carrots were originally purple before the orange variety became popular!
                </p>
            </div>
        </div>

        
    </div>
</section>


    <section class="trending-section">
        <div class="auto-container">
            <div class="layer-one"
                 style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
            <div class="layer-two"
                 style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <!-- <div class="title">HEALTHY LIFESTYLE</div> -->
                            <h2 class="sec-title">🚀 Start Your Veggie Adventure!</h2>
                            <div class="text">
                            Eating healthy can be super fun! 🍅🥦🍇  
                            Power up your body with tasty veggie snacks, drink plenty of water, and move your body like a superhero!  
                            Every small step earns you points and makes you stronger.  
                            Are you ready to unlock your first veggie power? 💥💪
                            </div>
                            <br>
                            <br>
                            <div class="progress-section text-center">
                                <h3>🌟 Your Veggie Power Level</h3>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 30%;">30%</div>

                                    @php
                                        $points = Auth::guard('websiteuser')->user()->points ?? 0;
                                        $maxPoints = 100; // You decide!
                                        $progress = min(100, ($points / $maxPoints) * 100);
                                    @endphp

                                    <div class="progress-bar" style="width: {{ $progress }}%;">{{ intval($progress) }}%</div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image">
                            <img src="{{ URL::asset('website/images/resource/i1.jpg') }}" style="width: 100%;max-height: 450px;object-fit: cover;margin-top: 30px;border-radius: 50%;">
                            <div class="mints">15 Min</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Categories Section-->
    <section class="categories-section">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered">
            <h2 class="sec-title">🍽️ Pick Your Power-Up Recipes!</h2>

                <div class="text">Choose a recipe zone to explore! Each one is packed with delicious, 
                    <br> healthy meals that’ll boost your energy and earn you points! 🥕💪  
                    <br> Are you going to try something cheesy, crunchy, or super green today?</div>
            </div>

            <!-- Categories Tabs -->
            <div class="categories-tab">

                <!-- Tabs Content -->
                <div class="p-tabs-content">

                    <!-- Portfolio Tab / Active Tab -->
                    <div class="p-tab active-tab" id="p-tab-1">
                        <div class="project-carousel owl-theme owl-carousel">

                            @forelse($categories as $category)
                                <div class="category-block">
                                    <div class="inner-box">
                                        <div class="image">
                                            <img src="{{ URL::asset('website/images/resource/category.png') }}"
                                                 style="width: 100%;height:200px;object-fit: cover" alt=""/>
                                        </div>
                                        <div class="lower-content">
                                            <h4><a href="{{ route('recipes',['category' => $category->id]) }}">{{ $category->name }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End Categories Section-->

    <!-- Trending Section -->
 <!-- Mission Section -->
<section class="trending-section">
  <div class="auto-container">
    <div class="row clearfix">

      <!-- Text Content -->
      <div class="content-column col-lg-7 col-md-12">
        <div class="inner-column">
          <div class="sec-title">
            <div class="title">🚀 Your First Mission</div>
            <h2>Build Your Super Salad!</h2>
            <div class="text">
              Start your journey by creating a colorful salad using 3 or more veggies! Snap a photo, share it with your grown-up, and earn your first 10 points!
            </div>
            <div class="progress-container mt-4">
                <div class="progress-bar" style="width: 20%;">1 of 5 Missions Complete</div>
            </div>

          </div>
          <a href="/quiz" class="theme-btn btn-style-one mt-3"><span class="txt">Accept the Mission</span></a>
          <div id="mission-complete" style="display: none; margin-top: 20px;">
            <p class="fact-text">🎉 Awesome! You completed Mission 1 and earned a badge!</p>
            <img src="{{ URL::asset('website/images/resource/veggie-mission-badge-1.jpg') }}" style="max-width: 120px;" alt="Mission 1 Badge">
        </div>

        <button id="complete-mission-btn" class="theme-btn btn-style-two mt-3">I Did It!</button>


        </div>
      </div>

      <!-- Image Content -->
      <div class="image-column col-lg-5 col-md-12">
        <div class="inner-column">
          <div class="image">
            <img src="{{ URL::asset('website/images/resource/veggie-mission-badge-1.jpg') }}" alt="Super Salad Mission" style="width: 100%; border-radius: 12px; max-height: 400px; object-fit: cover;">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

    <!-- End Trending Section -->

    <!-- Popular Recipes Section -->
    <section class="popular-recipes-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="clearfix">
                    <div class="pull-left">
                        <h2>Recipes</h2>
                        <div class="text">
                            "Featuring easy, kid-friendly vegetable recipes like colorful veggie pasta, crispy baked
                            snacks, fun-shaped salads, and healthy soups."
                        </div>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('recipes') }}" class="theme-btn btn-style-one"><span
                                    class="txt">See all Post</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="outer-container">
            <div class="row clearfix">

                @forelse($products as $product)
                <div class="recipes-block style-three col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box shadow h-100">
                        <div class="image position-relative">
                            <a href="{{ route('recipe_detail',[$product->slug]) }}">
                                <img src="{{ URL::asset('admin/assets/uploads/'.$product->image )}}" class="img-fluid"
                                     style="width: 100%; height: 300px; object-fit: cover;" alt=""/>
                            </a>
                            @if(Auth::guard('websiteuser')->check())
                                @if(in_array($product->id,Auth::guard('websiteuser')->user()->wishlistProducts()))
                                    <a href="{{ route('user.add_to_wislist',[$product->id]) }}" class="wishlist-btn btn btn-light"><i class="fa fa-heart text-danger"></i></a>
                                @else
                                    <a href="{{ route('user.add_to_wislist',[$product->id]) }}" class="wishlist-btn btn btn-light"><i class="fa fa-heart-o text-danger"></i></a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="wishlist-btn btn btn-light"><i class="fa fa-heart-o text-danger"></i></a>
                            @endif
                        </div>
                        <div class="lower-content">
                            <div class="author-image"><img src="{{ URL::asset('admin/assets/uploads/'.$product->image )}}"
                                                           alt=""/></div>
                            <div class="category">{{ $product->category->name }}</div>
                            <h4><a href="{{ route('recipe_detail',[$product->slug]) }}">{{ $product->heading }}</a>
                            </h4>
                            <div class="text">
                                {{ Str::limit(strip_tags($product->description), 150) }}
                            </div>
                            <ul class="post-meta">
                                <li><span class="icon flaticon-dish"></span>{{ $product->ingredients }}</li>
                                <li><span class="icon flaticon-clock-3"></span>{{ $product->prepration_time }}</li>
                                <li><span class="icon flaticon-business-and-finance"></span>{{ $product->serve }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="row">
                        <center>
                            <h3>No record found</h3>
                        </center>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- End Popular Recipes Section -->

    <!-- Call To Action Section -->
    <section class="call-to-action-section"
             style="background-image:url({{ URL::asset('website/images/background/2.jpg') }})">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Column -->
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    <!-- Sec Title -->
                    <div class="sec-title light">
                        <div class="title">Pizza</div>
                        <h2>Your Complete Christmas <br> Dinner Planning Guide</h2>
                        <div class="text">Special occasions call for extraordinary food. Whether your gathering is big
                            or small, casual or formal, here's everything you need to create a crowd-pleasing holiday
                            feast
                        </div>
                    </div>
                    <a href="" class="theme-btn btn-style-two"><span class="txt">Check Recipe</span></a>
                </div>

                <!-- Column -->
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    <!-- Sec Title -->
                    <div class="sec-title light">
                        <div class="title">Breakfast</div>
                        <h2>How to Meal Prep Breakfast Sandwiches for the <br> Week Ahead</h2>
                        <div class="text">Special occasions call for extraordinary food. Whether your gathering is big
                            or small, casual or formal, here's everything you need to create a crowd-pleasing holiday
                            feast
                        </div>
                    </div>
                    <a href="" class="theme-btn btn-style-two"><span class="txt">Check Recipe</span></a>
                </div>

            </div>
        </div>
    </section>
    <!-- End Call To Action Section -->

    <section class="entertaining-section p-0 pt-5">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Testimonials</h2>
            </div>

            <div class="row">
                <div class="col-md-8 col-center m-auto">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="img-box"><img src="{{ URL::asset('website/images/resource/r3.jpg') }}" alt=""></div>
                                <p class="testimonial">These healthy vegetable recipes have completely transformed my meals! They are not only delicious but also packed with nutrients that keep me energized throughout the day.Healthy eating has never been this fun! These veggie recipes are easy to follow, and they make me feel great inside and out.</p>
                                <p class="overview"><b>Jennifer Smith</b>, Office Worker</p>
                            </div>
                            <div class="item carousel-item">
                                <div class="img-box"><img src="{{ URL::asset('website/images/resource/r3.jpg') }}" alt=""></div>
                                <p class="testimonial">I never knew eating vegetables could be this tasty! These recipes have made healthy eating so much easier and enjoyable for my whole family.I’ve discovered new ways to enjoy veggies, and now they’re a staple in my daily meals!.</p>
                                <p class="overview"><b>Dauglas McNun</b>, Financial Advisor</p>
                            </div>
                            <div class="item carousel-item">
                                <div class="img-box"><img src="{{ URL::asset('website/images/resource/r4.jpg') }}" alt=""></div>
                                <p class="testimonial">Simple, flavorful, and nutritious—these vegetable recipes have helped me maintain a balanced diet without feeling deprived.I’ve discovered new ways to enjoy veggies, and now they’re a staple in
                                    <br> my daily meals!.</p>
                                <p class="overview"><b>Hellen Wright</b>, Athelete</p>
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

        </div>
    </section>

    <!-- Entertaining Section -->
    <section class="entertaining-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Blogs</h2>
            </div>

            <div class="row clearfix">

                @forelse($blogs as $blog)
                    <div class="entertaining-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="{{ route('blog_detail',[$blog->slug]) }}"><img src="{{ URL::asset('admin/assets/uploads/'.$blog->image )}}"
                                                                          style="width: 100%;height:300px;object-fit: cover" alt=""/></a>
                            </div>
                            <div class="lower-content">
                                <ul class="post-meta">
                                    <li><span class="icon "></span>{{ Carbon\Carbon::parse($blog->created_at)->format('d M ,Y') }}</li>
                                </ul>
                                <h4><a href="{{ route('blog_detail',[$blog->slug]) }}">{{ $blog->heading }}</a></h4>
                                <a href="{{ route('blog_detail',[$blog->slug]) }}" class="theme-btn read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>

        </div>
    </section>
    <!-- End Entertaining Section -->

    <!-- Instagram Section -->
    <!--<section class="instagram-section">-->
    <!--    <div class="auto-container">-->
            <!-- Title Box -->
    <!--        <div class="title-box">-->
    <!--            <div class="profile"><span class="fa fa-pinterest"></span> Gallery</div>-->
    <!--        </div>-->

    <!--    </div>-->

    <!--    <div class="instagram-carousel owl-carousel owl-theme">-->

            <!-- Instagram Block -->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v8.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v8.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v9.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v9.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v10.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v10.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v11.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v11.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v12.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v12.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v13.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v13.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v14.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v14.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v15.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v15.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v1.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v1.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v2.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v2.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v3.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v3.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="instagram-block">-->
    <!--            <div class="inner-box">-->
    <!--                <figure class="image-box"><img src="{{ URL::asset('website/images/resource/v4.jpg') }}"-->
    <!--                                               style="width: 100%;height:400px;object-fit: cover" alt=""></figure>-->
                    <!--Overlay Box-->
    <!--                <div class="overlay-box">-->
    <!--                    <div class="overlay-inner">-->
    <!--                        <div class="content">-->
    <!--                            <a href="{{ URL::asset('website/images/resource/v4.jpg') }}" data-fancybox="instagram"-->
    <!--                               data-caption=""-->
    <!--                               class="lightbox-image option-btn" title="Image Caption Here"-->
    <!--                               data-fancybox-group="example-gallery"><span class="fa fa-search"></span></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->


    <!--    </div>-->

    <!--</section>-->
    <!-- End Instagram Section -->

@endsection
