@extends('admin.layout.master')

@section('title')
    Veggi of month
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Veggi of month</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Veggi of month</h6>
                        <form method="POST" action="{{ route('admin.updatevog') }}" class="MyForm" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Description </label>
                                        <input type="text" name="description" autocomplete="off" class="form-control MyInput" required="" placeholder="Description . . . " value="{{ $vog->description }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Image </label>
                                        <input type="file" name="image" class="form-control MyFileInput" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-outline-success MyButton" type="submit"> Update </button>
                                    </center>
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('admin/assets/uploads/'.$vog->image) }}" style="background-size: 100% 100%;object-fit: cover;width: 100%;border-radius: 100%">
                                </div>
                                <div class="col-md-4"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection