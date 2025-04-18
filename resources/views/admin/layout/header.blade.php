<?php
$system = App\Models\Setting::first();
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>{{ $system->name }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ URL::asset('admin/assets/uploads/'.$system->favicon) }}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    {{--    <link rel="stylesheet" href="https://www.nobleui.com/html/template/assets/vendors/select2/select2.min.css">--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
</head>

<style>
    .MyInput, select {
        height: 60px;
        margin-bottom: 15px;
    }

    .MyFileInput {
        height: 60px;
        margin-bottom: 15px;
        padding-top: 18px;
    }
</style>

<body>
@include('admin.layout.loader')
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <br>
            <a href="{{ route('admin.home') }}" class="sidebar-brand">
                <img src="{{ URL::asset('admin/assets/uploads/'.$system->adminlogo) }}" alt="Logo" style="width:75%">
            </a>
            <br>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.Categories') }}" class="nav-link">
                        <i class="link-icon" data-feather="arrow-down"></i>
                        <span class="link-title">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.addproducts') }}" class="nav-link">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Add Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.productslist') }}" class="nav-link">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Products List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.veggiofmonth') }}" class="nav-link">
                        <i class="link-icon" data-feather="arrow-right-circle"></i>
                        <span class="link-title">Veggi Of Month</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.managequiz') }}" class="nav-link">
                        <i class="link-icon" data-feather="help-circle"></i>
                        <span class="link-title">Quiz Questions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.addblogs') }}" class="nav-link">
                        <i class="link-icon" data-feather="octagon"></i>
                        <span class="link-title">Add Blogs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blogslist') }}" class="nav-link">
                        <i class="link-icon" data-feather="octagon"></i>
                        <span class="link-title">Blogs List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.UsersList') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Users List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact_messages') }}" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Contact Messages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.setting') }}" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">Setting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.AdminProfile') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="link-icon" data-feather="log-out"></i>
                        <span class="link-title">Logout</span>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                              class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">

                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(!empty(Auth::user()->image))
                                <img class="wd-30 ht-30 rounded-circle"
                                     src="{{ url::asset('admin/assets/uploads/'.Auth::user()->image) }}"
                                     alt="profile">
                            @else
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                     alt="profile">
                            @endif
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    @if(!empty(Auth::user()->image))
                                        <img class="wd-80 ht-80 rounded-circle"
                                             src="{{ url::asset('admin/assets/uploads/'.Auth::user()->image) }}"
                                             alt="">
                                    @else
                                        <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80"
                                             alt="">
                                    @endif
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                    <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="{{ route('admin.AdminProfile') }}" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
