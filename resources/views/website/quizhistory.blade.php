@extends('website.includes.master')

@section('title')
    Quiz History
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/blogs-bg.png') }})">
        <div class="auto-container">
            <h1>Quiz History</h1>
        </div>
    </section>
    <!--End Page Title-->

    <div class="contact-page-container">
        <div class="pattern-layer"
             style="background-image:url({{ URL::asset('website/images/background/16.png') }})"></div>
        <div class="auto-container pt-0">
            <div class="row clearfix" style="margin-top: -60px">

                <div class="form-column col-lg-12 col-md-12 col-sm-12">

                    <center>
                        <h2><b>Quiz History</b></h2>
                    </center>

                    <div class="row mt-5">
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
                                                            <button class="btn btn-link" type="button"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapseOne{{ $cou }}"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapseOne">
                                                                Quiz {{ $counter }} - #{{ $cou }}
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-2" style="margin-top: 5px">
                                                        <b>{{ Carbon\Carbon::parse($q->first()->created_at)->format('d-m-Y') }}</b>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="collapseOne{{ $cou }}"
                                                 class="collapse @if($counter==1) show @endif"
                                                 aria-labelledby="headingOne{{ $cou }}"
                                                 data-parent="#accordionExample">

                                                @foreach($q as $c=>$qq)
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                @if($qq->answer==$qq->questionData->correctanswer->option)
                                                                    <strong style="color:green">
                                                                    <b>Question {{ $c+1 }}</b> {{ $qq->questionData->question }}</strong>
                                                                @else
                                                                    <strong style="color:red">
                                                                    <b>Question {{ $c+1 }}</b> {{ $qq->questionData->question }}</strong>
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
                </div>

            </div>
        </div>
    </div>

@endsection
