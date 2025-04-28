@extends('website.includes.master')

@section('title')
    Recipes
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/recipe-page-bg.png') }})">
        <div class="auto-container">
            <h1>Recipe Detail</h1>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container recipes-details-area" style="background-image: url({{ URL::asset('website/images/background/1.png') }})">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="recipe-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ URL::asset('admin/assets/uploads/'.$product->image )}}" style="width:100%;max-height:500px;object-fit: cover">
                            </div>
                            <div class="content"
                                 style="background-image:url({{ URL::asset('website/images/background/13.png') }})">
                                <div class="category">{{ $product->category->name }}</div>
                                <h2 class="mb-4">{{ $product->heading }}</h2>
                                <ul class="post-meta">
                                    <li><span class="icon flaticon-dish"></span>{{ $product->ingredients }}</li>
                                    <li><span class="icon flaticon-clock-3"></span>{{ $product->prepration_time }}</li>
                                    <li><span class="icon flaticon-business-and-finance"></span>{{ $product->serve }}</li>
                                </ul>
                            </div>
                            <div class="row clearfix">

                                <div class="column col-lg-12">

                                    <div class="my-tab">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">Description</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    {!! $product->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
