@extends('website.includes.master')

@section('title')
    Recipes
@endsection

@section('content')


    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/recipe-page-bg.png') }})">
        <div class="auto-container">
            <h1>Recipes !</h1>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Product Form Section -->
    <section class="product-form-section style-two">
        <div class="auto-container">
            <div class="inner-container margin-top">

                <!-- Default Form -->
                <div class="default-form">
                    <form method="get" action="{{ route('recipes') }}">
                        <div class="clearfix">

                            <!-- Form Group -->
                            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                <select class="custom-select-box" name="category">
                                    <option value="" selected disabled>Categories</option>
                                    @forelse($categories as $category)
                                        @if(isset($request) && !empty($request->category) && $request->category==$category->id)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                    <option value="">All</option>
                                </select>
                                <!--<h5><a href="{{ route('recipes') }}" class="btn" style="color: white;background-color: black"><b>All Recipes List</b></a></h5>-->
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-7 col-md-6 col-sm-12">
                                <input type="text" name="heading" placeholder="Recipe Kayword"
                                       value="{{ ($request && !empty($request->heading)) ? $request->heading : '' }}">
                            </div>

                            <div class="form-group col-lg-2 col-md-12 col-sm-12">
                                <button type="submit" class="theme-btn search-btn"><span class="fa fa-search"> Search</span></button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- End Keyword Section -->

    <!-- Popular Recipes Section -->
    <section class="popular-recipes-section style-three">
        <div class="auto-container">

                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="clearfix">
                        <div class="text-center">
                            <h2>All Recipes List</h2>
                            <div class="text mb-3" style="margin-bottom: 20px !important;">
                                ❤️ Heart a recipe to earn a badge! 
                                <br>Why not try out some of these recipes to taste your newly discovered veggie?
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="row justify-content-center mt-4">
                <!-- 📊 Difficulty Legend -->
                <div class="col-lg-8 text-center mb-5">
                    <h5 class="fw-bold text-dark mb-4">👩‍🍳 Recipe Difficulty Guide</h5>
                    <div class="d-flex justify-content-center gap-5 flex-wrap">
                    <div class="text-center">
                        <img src="{{ asset('website/images/icons/difficulty-1.png') }}" alt="Easy" style="max-width: 80px; height: auto; margin-bottom: 10px;">
                        <div><strong>Easy Peasy!</strong><br><small class="text-muted">You got this</small></div>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('website/images/icons/difficulty-2.png') }}" alt="Medium" style="max-width: 80px; height: auto; margin-bottom: 10px;">
                        <div><strong>Little Helper Needed</strong><br><small class="text-muted">Some grown-up help</small></div>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('website/images/icons/difficulty-3.png') }}" alt="Hard" style="max-width: 80px; height: auto; margin-bottom: 10px;">
                        <div><strong>Grown-Up Supervision</strong><br><small class="text-muted">Grown-up needed</small></div>
                    </div>
                </div>

                </div>
            </div>


                </div>
            </div>
        </div>
        <div class="outer-container">

            <div class="row clearfix">

                @forelse($products as $product)
                    <div class="recipes-block style-three col-lg-3 col-md-6 col-sm-12">
                         <div class="inner-box shadow h-100" >
                            <div class="image position-relative">
                                <a href="{{ route('recipe_detail',[$product->slug]) }}">
                                    <img src="{{ URL::asset('admin/assets/uploads/'.$product->image )}}"
                                         class="img-fluid"
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
                            <div class="lower-content text-center">
                            {{-- 🍅 Category tag positioned top-left --}}
                                <div class="position-absolute" style="top: 10px; left: 10px;">
                                    <span class="badge"
                                        style="background-color: #ffb347; color: #fff; font-size: 13px; padding: 5px 10px; border-radius: 8px;">
                                        {{ $product->category->name }}
                                    </span>
                                </div>
                                {{--  Difficulty Icon --}}
                                @php
                                    $badgeLabel = '';
                                    $badgeIcon = '';

                                    switch ($product->difficulty) {
                                        case 1:
                                            $badgeLabel = 'Easy Peasy!';
                                            $badgeIcon = 'difficulty-1.png';
                                            break;
                                        case 2:
                                            $badgeLabel = 'Little Helper Needed!';
                                            $badgeIcon = 'difficulty-2.png';
                                            break;
                                        case 3:
                                            $badgeLabel = 'Grown-Up Supervision!';
                                            $badgeIcon = 'difficulty-3.png';
                                            break;
                                    }
                                @endphp

                                @if($badgeIcon)
                                    <div class="difficulty-badge text-center my-3">
                                        <img src="{{ asset('website/images/icons/' . $badgeIcon) }}" alt="{{ $badgeLabel }}" style="width: 60px; height: 60px;">
                                        <div class="badge mt-2"
                                            style="font-size: 14px; background-color:rgb(239, 195, 52); padding: 6px 12px; border-radius: 12px; display: inline-block;">
                                            {{ $badgeLabel }}
                                        </div>
                                    </div>
                                @endif


                                <!-- <div class="category text-uppercase mb-2" style="font-size: 13px; color: #ff6f61;">
                                    {{ $product->category->name }}
                                </div> -->

                                <h4>
                                    <a href="{{ route('recipe_detail',[$product->slug]) }}">{{ $product->heading }}</a>
                                </h4>

                                <div class="text">
                                    {{ Str::limit(strip_tags($product->description), 150) }}
                                </div>

                                <ul class="post-meta list-unstyled d-flex justify-content-center gap-3">
                                    <li><span class="icon flaticon-dish"></span> {{ $product->ingredients }}</li>
                                    <li><span class="icon flaticon-clock-3"></span> {{ $product->prepration_time }}</li>
                                    <li><span class="icon flaticon-business-and-finance"></span> {{ $product->serve }}</li>
                                </ul>
                            </div>


                        </div>
                    </div>
                @empty
                    <div class="row text-center justify-content-center">
                        <center>
                            <h3>No record found</h3>
                        </center>
                    </div>
                @endforelse

            </div>

            <div class="row mt-5 text-center justify-content-center">
                <div class="styled-pagination text-center">
                    @if ($products->lastPage() > 1)
                        <ul class="clearfix">
                            <li class="{{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                                @if($products->currentPage() == 1)
                                    <a style="cursor: not-allowed" disabled=""><span
                                                class="fa fa-long-arrow-left"></span></a>
                                @else
                                    <a href="{{ $products->appends(request()->query())->url($products->currentPage()-1) }}">
                                        <span class="fa fa-long-arrow-left"></span>
                                    </a>
                                @endif
                            </li>
                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $products->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                @if($products->currentPage() == $products->lastPage())
                                    <a style="cursor: not-allowed" disabled=""><span
                                                class="fa fa-long-arrow-right"></span></a>
                                @else
                                    <a href="{{ $products->appends(request()->query())->url($products->currentPage()+1) }}">
                                        <span class="fa fa-long-arrow-right"></span>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    @endif

                </div>
            </div>

        </div>
    </section>
    <!-- End Popular Recipes Section -->

 <style>
    .default-form {
        margin-bottom: 20px; /* Reduced from default */
    }
    .sec-title .text {
        margin-bottom: 20px !important; /* Reduce space below description */
    }
</style>
 
@endsection
