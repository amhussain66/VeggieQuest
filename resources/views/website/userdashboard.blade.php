@extends('website.includes.master')

@section('title')
    User Dashboard
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/user-dash1.png') }})">
        <div class="auto-container">
        <h1>{{ Auth::guard('websiteuser')->user()->name ?? 'User' }}'s Dashboard</h1>


        </div>
    </section>
    <!--End Page Title-->


    <!-- Popular Recipes Section -->
    <section class="popular-recipes-section style-three" style="background-color:rgb(199, 255, 198)";>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="clearfix">
                    <div class="text-center">
                    <h2>{{ Auth::guard('websiteuser')->user()->name ?? 'User' }}'s Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Veggie Power Level on Dashboard -->
            <div class="row mt-5 text-center mb-5">
                <div class="col-md-12">
                    <h2>🌟 Your Veggie Power Level</h2>

                    @php
                        $points = Auth::guard('websiteuser')->user()->points ?? 0;
                        $maxPoints = 100;
                        $progress = min(100, ($points / $maxPoints) * 100);
                    @endphp

                    <div class="progress-container my-3" style="width: 60%; margin: 0 auto;">
                        <div class="progress-bar" style="
                            width: {{ $progress }}%;
                            background-color: #ffc107;
                            height: 20px;
                            line-height: 20px;
                            border-radius: 10px;
                            text-align: center;
                            color: white;
                            transition: width 0.5s ease;">
                            {{ intval($progress) }}%
                        </div>
                    </div>

                    <p>Keep playing, eating veggies, and completing missions to reach 100%!</p>
                </div>
            </div>

            <div class="row mt-5 text-center mb-5">
            <div class="col-md-12">
                <h2>🏅 Badges Earned</h2>
                <div class="d-flex flex-wrap justify-content-center gap-4 mt-4">

                    @forelse($badges as $badge)
                        <div class="badge-item text-center">
                            <img src="{{ asset('website/images/badges/' . $badge . '.jpg') }}" alt="{{ $badge }}" class="earned-badge">
                            <p class="mt-2">{{ ucfirst(str_replace('_', ' ', $badge)) }}</p>
                        </div>
                    @empty
                        <p>No badges earned yet. Start your veggie adventures to earn some!</p>
                    @endforelse

                </div>
            </div>
        </div>



        <div class="outer-container">
                    <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <a href="{{ route('user.quizhistory') }}" style="color:white">
                        <div class="card shadow text-center" style="background-color:rgb(151, 255, 245); border-radius: 3%;">
                            <div class="card-body">
                                <h4 class="p-4">
                                    Total Quiz Attempts <i class="link-icon" data-feather="arrow-down-circle"></i>
                                    <strong style="letter-spacing: 5px"><b>({{ sizeof($quizes) }})</b></strong>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 mb-4">
                    <a href="{{ route('user.wishlist') }}" style="color:white">
                        <div class="card shadow text-center" style="background-color:rgb(151, 255, 245); border-radius: 3%;">
                            <div class="card-body">
                                <h4 class="p-4">
                                    Total Recipes Bookmarked <i class="link-icon" data-feather="arrow-down-circle"></i>
                                    <strong style="letter-spacing: 5px"><b>({{ sizeof($products) }})</b></strong>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <br>

            <div class="row mt-5">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div id="chart1" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">

                <center>
                    <h2><b>Quiz History</b></h2>
                </center>

                <div class="accordion w-100" id="accordionExample">

                    @if(isset($quizes))
                            <?php $counter = 1; ?>
                        @foreach($quizes->groupBy('quizid') as $cou=>$q)

                            @if($q)

                                <div class="card">
                                    <div class="card-header" id="headingOne{{ $cou }}">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link spacing3px" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#collapseOne{{ $cou }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                        Quiz {{ $counter }} - #{{ $cou }}
                                                    </button>
                                                </h5>
                                            </div>
                                            <div class="col-md-2 spacing3px" style="margin-top: 5px">
                                                <b>{{ Carbon\Carbon::parse($q->first()->created_at)->format('d-m-Y') }}</b>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapseOne{{ $cou }}"
                                         class="collapse @if($counter==1)  @endif"
                                         aria-labelledby="headingOne{{ $cou }}"
                                         data-parent="#accordionExample">

                                        @foreach($q as $c=>$qq)
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if($qq->answer==$qq->questionData->correctanswer->option)
                                                            <strong style="color:green">
                                                                <b>Question {{ $c+1 }}</b> {{ $qq->questionData->question }}
                                                            </strong>
                                                        @else
                                                            <strong style="color:red">
                                                                <b>Question {{ $c+1 }}</b> {{ $qq->questionData->question }}
                                                            </strong>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @forelse($qq->questionData->options as $o=>$opt)
                                                        <div class="col-md-3">
                                                            <label style="margin-top: 10px;margin-left: 10px">{{ $opt->option }}</label>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <strong><b>Your Answer = </b> {{ $qq->answer }} </strong>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <strong><b>Correct Answer
                                                                = </b> {{ $qq->questionData->correctanswer->option }}
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach


                                    </div>
                                </div>
                            @endif
                                <?php $counter++; ?>
                        @endforeach

                    @endif


                </div>
            </div>

            <br>

            <h2 class="mt-5"><b>Bookmarked Recipes</b></h2>
            <div class="row mt-3">
                @forelse($products as $product)
                    <div class="recipes-block style-three col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box shadow h-100">
                            <div class="image position-relative">
                                <a href="{{ route('recipe_detail',[$product->productdata->slug]) }}">
                                    <img src="{{ URL::asset('admin/assets/uploads/'.$product->productdata->image )}}"
                                         class="img-fluid"
                                         style="width: 100%; height: 300px; object-fit: cover;" alt=""/>
                                </a>
                                @if(Auth::guard('websiteuser')->check())
                                    @if(in_array($product->productdata->id,Auth::guard('websiteuser')->user()->wishlistProducts()))
                                        <a href="{{ route('user.add_to_wislist',[$product->productdata->id]) }}"
                                           class="wishlist-btn btn btn-light"><i
                                                    class="fa fa-heart text-danger"></i></a>
                                    @else
                                        <a href="{{ route('user.add_to_wislist',[$product->productdata->id]) }}"
                                           class="wishlist-btn btn btn-light"><i class="fa fa-heart-o text-danger"></i></a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="wishlist-btn btn btn-light"><i
                                                class="fa fa-heart-o text-danger"></i></a>
                                @endif
                            </div>
                            <div class="lower-content">
                                <div class="author-image"><img
                                            src="{{ URL::asset('admin/assets/uploads/'.$product->productdata->image )}}"
                                            alt=""/></div>
                                <div class="category">{{ $product->productdata->category->name }}</div>
                                <h4>
                                    <a href="{{ route('recipe_detail',[$product->productdata->slug]) }}">{{ $product->productdata->heading }}</a>
                                </h4>
                                <div class="text">
                                    {{ Str::limit(strip_tags($product->productdata->description), 150) }}
                                </div>
                                <ul class="post-meta">
                                    <li><span class="icon flaticon-dish"></span>{{ $product->productdata->ingredients }}
                                    </li>
                                    <li>
                                        <span class="icon flaticon-clock-3"></span>{{ $product->productdata->prepration_time }}
                                    </li>
                                    <li>
                                        <span class="icon flaticon-business-and-finance"></span>{{ $product->productdata->serve }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="row text-center justify-content-center">
                        <center>
                            <h3>No record found</h3>
                        </center>
                    </div>
                @endforelse

            </div>

        </div>
    </section>
    <!-- End Popular Recipes Section -->

@endsection
@section('script')
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        Chart1();
        function Chart1() {

            const chartData = {!! $chartDataJson !!};

            var chart = new CanvasJS.Chart("chart1", {
                animationEnabled: true,
                title: {
                    text: "Daily Quiz Progress"
                },
                data: [{
                    type: "line",
                    startAngle: 240,
                    indexLabel: "{y}",
                    dataPoints: chartData
                }]
            });
            chart.render();
        }


    </script>
@endsection