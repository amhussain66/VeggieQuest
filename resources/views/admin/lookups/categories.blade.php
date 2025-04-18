@extends('admin.layout.master')

@section('title')
    Categories
@endsection

<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>
    .owl-nav {
        display: none !important;
    }
</style>
@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @include('admin.layout.laravel_errors')
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Categories</h6></div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-dark w-100" type="button" data-bs-toggle="modal"
                                        data-bs-target="#AddPartners">Add Categories
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Detail</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $t=>$category)
                                    <tr>
                                        <td>{{ $t+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ ($category->detail) ? $category->detail : '--' }}</td>
                                        <td>{{ Carbon\Carbon::parse($category->created_at)->format('d-m-Y h:i') }}</td>
                                        <td>{{ ($category->updated_at) ? Carbon\Carbon::parse($category->updated_at)->format('d-m-Y h:i') : '--' }}</td>
                                        <td>
                                            <a data-bs-toggle="modal"
                                               data-bs-target="#UpdateCategory{{ $category->id }}"
                                               class="btn btn-outline-info btn-icon">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </td>
                                        <td>

                                            <a onclick="return(confirm('Are you sure to delete this record permanently ?'))"
                                               href="{{ route('admin.deletecategory',[encrypt($category->id)]) }}"
                                               class="btn btn-outline-danger btn-icon">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{--  update modal--}}
                                    <div class="modal fade" id="UpdateCategory{{ $category->id }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Update
                                                        Categories</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="{{ route('admin.updatecategories') }}"
                                                              method="post" class="MyForm"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label> Category Name </label>
                                                                        <input type="text" name="name"
                                                                               autocomplete="off"
                                                                               class="form-control MyInput"
                                                                               required=""
                                                                               placeholder="Category Name . . . "
                                                                               value="{{ ($category->name) ? $category->name : '' }}">
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="id"
                                                                       value="{{ $category->id }}">

                                                                <div class="col-md-12 mb-3">
                                                                    <div class="form-group">
                                                                        <label>Detail</label>
                                                                        <textarea name="detail" rows="5"
                                                                                  placeholder="Category Detail"
                                                                                  class="form-control">{{ ($category->detail) ? $category->detail : '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-dark MyButton" type="submit">
                                                                        Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="AddPartners" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add Categories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="{{ route('admin.savecategories') }}" method="post" class="MyForm" id=""
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Category Name </label>
                                            <input type="text" name="name" autocomplete="off"
                                                   class="form-control MyInput"
                                                   required="" placeholder="Category Name . . . ">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea name="detail" rows="5" placeholder="Category Detail"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-dark MyButton" type="submit" id=""> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script src="{{ URL::asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/data-table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    </script>

@endsection
