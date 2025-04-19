@extends('admin.layout.master')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to {{ $website->name }} <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.Categories') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Manage Categories <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.addproducts') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Add Products <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.productslist') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Products List <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.veggiofmonth') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Veggie Of Month <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.addblogs') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Add Blogs <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.blogslist') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Blogs List <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.managequiz') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Manage Quiz <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.UsersList') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Users List <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="{{ route('admin.contact_messages') }}" style="color:black">
                            <div class="card shadow" style="background-color: #bbbbbb;border-radius: 3%;">
                                <div class="card-body">
                                    <h4 class="p-4">Contact Messages <i class="link-icon" data-feather="arrow-down-circle"></i> </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
@stack('scripts')

@endsection