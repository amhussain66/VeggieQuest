@extends('website.includes.master')

@section('title')
    Wishlist Recipes
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/blogs-bg.png') }})">
        <div class="auto-container">
            <h1>My Wishlist Recipes</h1>
        </div>
    </section>
    <!--End Page Title-->


    <!-- Popular Recipes Section -->
    <section class="popular-recipes-section style-three">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="clearfix">
                    <div class="text-center">
                        <h2>My Wishlist Recipes</h2>
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
                                <a href="{{ route('recipe_detail',[$product->productdata->slug]) }}">
                                    <img src="{{ URL::asset('admin/assets/uploads/'.$product->productdata->image )}}"
                                         class="img-fluid"
                                         style="width: 100%; height: 300px; object-fit: cover;" alt=""/>
                                </a>
                                @if(Auth::guard('websiteuser')->check())
                                    @if(in_array($product->productdata->id,Auth::guard('websiteuser')->user()->wishlistProducts()))
                                        <a href="{{ route('user.add_to_wislist',[$product->productdata->id]) }}" class="wishlist-btn btn btn-light"><i class="fa fa-heart text-danger"></i></a>
                                    @else
                                        <a href="{{ route('user.add_to_wislist',[$product->productdata->id]) }}" class="wishlist-btn btn btn-light"><i class="fa fa-heart-o text-danger"></i></a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="wishlist-btn btn btn-light"><i class="fa fa-heart-o text-danger"></i></a>
                                @endif
                            </div>
                            <div class="lower-content">
                                <div class="author-image"><img
                                            src="{{ URL::asset('admin/assets/uploads/'.$product->productdata->image )}}"
                                            alt=""/></div>
                                <div class="category">{{ $product->productdata->category->name }}</div>
                                <h4><a href="{{ route('recipe_detail',[$product->productdata->slug]) }}">{{ $product->productdata->heading }}</a>
                                </h4>
                                <div class="text">
                                    {{ Str::limit(strip_tags($product->productdata->description), 150) }}
                                </div>
                                <ul class="post-meta">
                                    <li><span class="icon flaticon-dish"></span>{{ $product->productdata->ingredients }}</li>
                                    <li><span class="icon flaticon-clock-3"></span>{{ $product->productdata->prepration_time }}</li>
                                    <li><span class="icon flaticon-business-and-finance"></span>{{ $product->productdata->serve }}
                                    </li>
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

        </div>
    </section>
    <!-- End Popular Recipes Section -->

@endsection
