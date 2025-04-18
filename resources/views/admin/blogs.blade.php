@extends('admin.layout.master')

@section('title')
    Blogs List
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs List</li>
            </ol>
        </nav>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       <div class="row">
                           @forelse($blogs as $blog)

                               <div class="col-12 col-md-6 col-xl-3 mb-4 cardsearch">
                                   <div class="card shadow h-100">
                                       <img src="{{ URL::asset('admin/assets/uploads/'.$blog->image )}}"
                                            class="card-img-top"
                                            alt="..." style="width:100%;height:220px;object-fit: cover;background-size: 100% 100%">
                                       <div class="card-body">
                                           <h5 class="card-text mb-3 small">{{ $blog->heading }}</h5>
                                           <div class="row">
                                               <div class="col-md-3"></div>
                                               <div class="col-md-6">
                                                   <a href="{{ route('admin.editblog', [encrypt($blog->id)]) }}"
                                                      class="btn btn-info btn-icon">
                                                       <i data-feather="edit"></i>
                                                   </a>
                                                   <a onclick="return(confirm('{{ __("language.are_you_sure") }}'))"
                                                      href="{{ route('admin.deleteblog', [$blog->id]) }}"
                                                      class="btn btn-danger btn-icon">
                                                       <i data-feather="trash"></i>
                                                   </a>
                                               </div>
                                               <div class="col-md-3"></div>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                           @empty
                               <div class="row">
                                   <center>
                                       <h3>No record found</h3>
                                   </center>
                               </div>
                           @endforelse
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection