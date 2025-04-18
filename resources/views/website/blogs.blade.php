@extends('website.includes.master')

@section('title')
    Blogs
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/14.jpg') }})">
        <div class="auto-container">
            <h1>Blogs</h1>
        </div>
    </section>
    <!--End Page Title-->

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-list">

                        @forelse($blogs as $blog)
                            <div class="news-block shadow h-100">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="{{ route('blog_detail',[$blog->slug]) }}"><img
                                                    src="{{ URL::asset('admin/assets/uploads/'.$blog->image )}}"
                                                    alt=""/></a>
                                    </div>
                                    <div class="lower-content"
                                         style="background-image:url({{ URL::asset('website/images/background/15.jpg') }})">
                                        <h3><a href="{{ route('blog_detail',[$blog->slug]) }}">{{ $blog->heading }}</a>
                                        </h3>
                                        <ul class="post-info">
                                            <li>{{ Carbon\Carbon::parse($blog->created_at)->format('d M ,Y') }}</li>
                                        </ul>
                                        <div class="text">
                                            {{ Str::limit(strip_tags($blog->description), 150) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                            <div class="styled-pagination text-center">
                                @if ($blogs->lastPage() > 1)
                                    <ul class="clearfix">
                                        <li class="{{ ($blogs->currentPage() == 1) ? ' disabled' : '' }}">
                                            @if($blogs->currentPage() == 1)
                                                <a style="cursor: not-allowed" disabled=""><span
                                                            class="fa fa-long-arrow-left"></span></a>
                                            @else
                                                <a href="{{ $blogs->url($blogs->currentPage()-1) }}"><span
                                                            class="fa fa-long-arrow-left"></span></a>
                                            @endif
                                        </li>
                                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                            <li class="{{ ($blogs->currentPage() == $i) ? ' active' : '' }}">
                                                <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="{{ ($blogs->currentPage() == $blogs->lastPage()) ? ' disabled' : '' }}">
                                            @if($blogs->currentPage() == $blogs->lastPage())
                                                <a style="cursor: not-allowed" disabled=""><span
                                                            class="fa fa-long-arrow-right"></span></a>
                                            @else
                                                <a href="{{ $blogs->url($blogs->currentPage()+1) }}"><span
                                                            class="fa fa-long-arrow-right"></span></a>
                                            @endif
                                        </li>
                                    </ul>
                                @endif
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
                                    @forelse($blogs as $b=>$blogg)
                                        @if($b<4)
                                            <div class="next-post">
                                                <div class="post-inner"
                                                     style="background-image:url({{ URL::asset('admin/assets/uploads/'.$blogg->image )}})">
                                                    <h4>
                                                        <a href="{{ route('blog_detail',[$blogg->slug]) }}">{{ $blogg->heading }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                            </div>

                            <!-- carousel Post Widget -->
                            <div class="sidebar-widget carousel-post-widget">
                                <div class="widget-content">
                                    <div class="single-item-carousel owl-carousel owl-theme">

                                        @forelse($blogs as $bloggg)
                                            @if($b<4)
                                                <div class="post-block shadow">
                                                    <div class="block-inner">
                                                        <div class="image">
                                                            <img src="{{ URL::asset('admin/assets/uploads/'.$bloggg->image )}}"
                                                                 style="width: 100%;object-fit: cover">
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-image">
                                                                <img src="{{ URL::asset('admin/assets/uploads/'.$bloggg->image )}}"
                                                                     alt=""/>
                                                            </div>
                                                            <h4>
                                                                <a href="{{ route('blog_detail',[$bloggg->slug]) }}">{{ $bloggg->heading }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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
