<?php
$system = App\Models\Setting::first();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $system->name }} @yield('title')</title>
    <!-- Stylesheets -->
    <link href="{{ URL::asset('website/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('website/css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('website/css/responsive.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ URL::asset('website/images/logo/logo2.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .fixed-header
        {
            background-color: #192b29 !important;
        }
        .spacing3px
         {
            letter-spacing: 3px !important;
         }
    </style>

    <style>
        .wishlist-btn {
            position: absolute;
            top: 10px; /* Adjust spacing from the top */
            right: 10px; /* Adjust spacing from the right */
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            z-index: 10;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .image:hover .wishlist-btn {
            display: flex; /* Show on hover */
        }

    </style>

    <style>
        .carousel {
            margin: 50px auto;
            padding: 0 70px;
        }
        .carousel-item {
            color: #999;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            min-height: 290px;
        }
        .carousel .item .img-box {
            width: 135px;
            height: 135px;
            margin: 0 auto;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 50%;
        }
        .carousel .img-box img {
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 50%;
        }
        .carousel .testimonial {
            padding: 30px 0 10px;
        }
        .carousel .overview {
            font-style: italic;
        }
        .carousel .overview b {
            text-transform: uppercase;
            color: #db584e;
        }
        .carousel .carousel-control {
            width: 40px;
            height: 40px;
            margin-top: -20px;
            top: 50%;
            background: none;
        }
        .carousel-control i {
            font-size: 68px;
            line-height: 42px;
            position: absolute;
            display: inline-block;
            color: rgba(0, 0, 0, 0.8);
            text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
        }
        .carousel .carousel-indicators {
            bottom: -40px;
        }
        .carousel-indicators li, .carousel-indicators li.active {
            width: 10px;
            height: 10px;
            margin: 1px 3px;
            border-radius: 50%;
        }
        .carousel-indicators li {
            background: #999;
            border-color: transparent;
            box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
        }
        .carousel-indicators li.active {
            background: #555;
            box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
        }

        /* nav chnages */
        .navigation > li > a {
            border-bottom: none !important;
            text-decoration: none !important;
            transition: all 0.3s ease-in-out;
        }

        .navigation > li.active > a {
            color: #ffcc00 !important;
            font-weight: bold;
            border-bottom: 2px solid #ffcc00;
        }


        .navigation > li.active > a {
            color: #ffcc00 !important;
            font-weight: bold;
            border-bottom: 2px solid #ffcc00;
        }
        .navigation > li > a:hover {
            color: #ffcc00 !important;
        }

    </style>

</head>

<body>
@include('admin.layout.loader')
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header header-style-one">

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="container-fluid px-5">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="pull-left logo-box">
                        <div class="logo"><a href="{{ route('/') }}"><img src="{{ URL::asset('/admin/assets/uploads/'.$system->logo) }}" style="width: 80% !important;"></a></div>
                    </div>
                    <div class="nav-outer clearfix" style="margin-top: 5px !important;">
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                        <nav class="main-menu navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse show collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                <li class="{{ request()->routeIs('/') ? 'active' : '' }}">
                                    <a href="{{ route('/') }}">Home</a>
                                </li>
                                <li class="{{ request()->routeIs('user.quiz') ? 'active' : '' }}">
                                    <a href="{{ route('user.quiz') }}">Fun Challenges</a>
                                </li>
                                <li class="{{ request()->routeIs('recipes') ? 'active' : '' }}">
                                    <a href="{{ route('recipes') }}">Veggie Recipes</a>
                                </li>
                                <li class="{{ request()->routeIs('activities') ? 'active' : '' }}">
                                    <a href="{{ route('activities') }}">Games & Activities</a>
                                </li>
                                <li class="{{ request()->routeIs('veggie_facts_benefits') ? 'active' : '' }}">
                                    <a href="{{ route('veggie_facts_benefits') }}">Veggie Facts & Benefits</a>
                                </li>
                                <li class="{{ request()->routeIs('resources') ? 'active' : '' }}">
                                    <a href="{{ route('resources') }}">Parents & Teachers</a>
                                </li>

                                    @if(Auth::guard('websiteuser')->check())
                                        <li class="dropdown"><a style="cursor: pointer">{{ Auth::guard('websiteuser')->user()->name }}</a>
                                            <ul>
                                                <li><a href="{{ route('user.userdashboard') }}">Dashboard</a></li>
                                                <li><a href="{{ route('user.quizhistory') }}">Quiz History</a></li>
                                                <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                                <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                                <li><a href="{{ route('user.userlogout') }}">Logout</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}"><span class="icon fa fa-user"></span> Login</a></li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                        <div class="outer-box">
                            <ul class="login-info">
{{--                                @if(!Auth::guard('websiteuser')->check())--}}
{{--                                    <li class="recipe"><a href="{{ route('login') }}"><span class="icon fa fa-user"></span>Login</a></li>--}}
{{--                                @else--}}
{{--                                    <li class="recipe"><a href="{{ route('user.userlogout') }}"><span class="icon fa fa-user"></span>Logout</a></li>--}}
{{--                                @endif--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon fa fa-remove"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ route('/') }}"><img src="{{ URL::asset('/admin/assets/uploads/'.$system->logo) }}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!--End Main Header -->
