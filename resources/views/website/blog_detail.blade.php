@extends('website.includes.master')

@section('title')
    Blog Details
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/blog-bg.png') }})">
        <div class="auto-container">
            <h1>Blog Details</h1>
        </div>
    </section>
    <!--End Page Title-->

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ URL::asset('admin/assets/uploads/'.$blog->image )}}" alt=""/>
                            </div>
                            <div class="lower-content">
                                <h3>{{ $blog->heading }}</h3>
                                <ul class="post-info">
                                    <li>{{ Carbon\Carbon::parse($blog->created_at)->format('d M ,Y') }}</li>
                                </ul>

                                {!! $blog->description !!}

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">

                            <!-- Next Post Widget -->
                            <div class="sidebar-widget next-post-widget">
                                <div class="sidebar-title">
                                    <h3>Read Next</h3>
                                </div>
                                <div class="widget-content">
                                    @forelse($blogs as $blogg)
                                        <div class="next-post">
                                            <div class="post-inner"
                                                 style="background-image:url({{ URL::asset('admin/assets/uploads/'.$blogg->image )}})">
                                                <h4>
                                                    <a href="{{ route('blog_detail',[$blogg->slug]) }}">{{ $blogg->heading }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>

                            <!-- carousel Post Widget -->
                            <div class="sidebar-widget carousel-post-widget">
                                <div class="widget-content">
                                    <div class="single-item-carousel owl-carousel owl-theme">

                                        @forelse($blogs as $bloggg)
                                            <div class="post-block shadow">
                                                <div class="block-inner">
                                                    <div class="image">
                                                        <img src="{{ URL::asset('admin/assets/uploads/'.$bloggg->image )}}" style="width: 100%;object-fit: cover">
                                                    </div>
                                                    <div class="lower-content">
                                                        <div class="author-image">
                                                            <img src="{{ URL::asset('admin/assets/uploads/'.$bloggg->image )}}"
                                                                 alt=""/>
                                                        </div>
                                                        <h4><a href="{{ route('blog_detail',[$bloggg->slug]) }}">{{ $bloggg->heading }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse

                                    </div>
                                </div>
                            </div>

                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </div>

@endsection
