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

    <title>{{ $system->name }} Admin Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/core/core.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    {{--    fav icon--}}
    <link rel="shortcut icon" href="{{ URL::asset('admin/assets/uploads/'.$system->favicon) }}"/>
</head>
<body>
<div class="main-wrapper">
    <div class="page-wrapper full-page" style="background-image: url('{{ URL::asset('website/images/resource/tom-paolini-OpEvVQUmK0s-unsplash.jpg') }}');object-fit: cover;background-size: 100% 100%">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pe-md-0">
                                <div class="auth-side-wrapper"
                                     style="background-image: url('{{ URL::asset('website/images/resource/r2.jpg') }}')"></div>
                            </div>
                            <div class="col-md-8 ps-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <img src="{{ URL::asset('admin/assets/uploads/'.$system->logo) }}"
                                                 alt="Logo" style="width:100%">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <br>
                                    <br>
                                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                    <form class="forms-sample MyForm" method="POST" action="{{ route('admin.login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email address</label>
                                            <input type="email" value="{{ old('email') }}" name="email" required
                                                   class="form-control" id="userEmail" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                   id="userPassword"
                                                   autocomplete="current-password" placeholder="Password" required>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" value="remember" class="form-check-input"
                                                   {{ old('remember') ? 'checked' : '' }} id="authCheck">
                                            <label class="form-check-label" for="authCheck">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0 MyButton">
                                                Admin Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- core:js -->
<script src="{{ URL::asset('admin/assets/vendors/core/core.js') }}"></script>
<script src="{{ URL::asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/template.js') }}"></script>
@include('admin.errors')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $('.MyForm').submit(function () {
        $(".MyButton").attr("disabled", true);
        $(".MyButton").html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
    });
</script>
</body>
</html>
