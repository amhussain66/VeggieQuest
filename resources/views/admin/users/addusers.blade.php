@extends('admin.layout.master')

@section('title')
    Add Users
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Users</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                @include('admin.layout.laravel_errors')
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Users</h6>
                        <form method="POST" action="{{ route('admin.saveuserrecord') }}" class="MyForm"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Name </label>
                                        <input type="text" name="name" class="form-control MyInput"
                                               placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Email </label>
                                        <input type="email" name="email" class="form-control MyInput"
                                               placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Password </label>
                                        <input type="password" name="password" minlength="8"
                                               class="form-control MyInput"
                                               placeholder="*********" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Phone </label>
                                        <input type="text" name="phone" class="form-control MyInput"
                                               placeholder="Phone Number" required>
                                    </div>
                                </div>
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label> Address </label>--}}
{{--                                        <input type="text" name="address" class="form-control MyInput"--}}
{{--                                               placeholder="Address" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Status </label>
                                        <select name="status" class="form-control MyInput"
                                                required>
                                            <option value="">Select Status</option>
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                                </div>
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label> Email Verification </label>--}}
{{--                                        <select name="email_verification" class="form-control MyInput"--}}
{{--                                                required>--}}
{{--                                            <option value="">Email Verification</option>--}}
{{--                                            <option value="verified">Verified</option>--}}
{{--                                            <option value="unverified">Unverified</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label> Profile Picture </label>--}}
{{--                                        <input type="file" class="form-control mb-3 MyFileInput" autocomplete="off"--}}
{{--                                               name="image" onchange="validateImages(this.id)"--}}
{{--                                               accept="image/*">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-outline-dark mt-4 MyButton" style="height:50px"> SUBMIT
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/sweet-alert.js') }}"></script>

@endsection
