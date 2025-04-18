@extends('website.includes.master')

@section('title')
    Quiz
@endsection

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('website/images/background/17.png') }})">
        <div class="auto-container">
            <h1>Quiz</h1>
        </div>
    </section>
    <!--End Page Title-->

    <div class="sidebar-page-container ">
        <div class="container">

            {{--            <div class="row text-center justify-content-center mb-4">--}}
            {{--                <div class="col-md-3"><img src="{{ URL::asset('website/images/resource/level1.png') }}" style="width:100%;object-fit: cover"></div>--}}
            {{--                <div class="col-md-9"></div>--}}
            {{--            </div>--}}

            @if(isset($question))

                <form action="{{ route('user.savequiz') }}" method="post" class="MyForm">
                    @csrf
                    <input type="hidden" name="questionid" value="{{ $question->id }}">
                    <input type="hidden" name="quizid" value="{{ $quizid }}">
                    <input type="hidden" name="totalAnswers" value="{{ $totalAnswers }}">
                    <input type="hidden" name="totalQuestion" value="{{ $totalQuestion }}">
                    <input type="hidden" name="userid" value="{{ Auth::guard('websiteuser')->user()->id }}">

                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <h4><b>Q : </b>{{ $question->question }}</h4>
                            </div>
                            <br>

                            @forelse($question->options as $o=>$opt)
                                <div class="row">
                                    <input type="radio" value="{{ $opt->option }}" id="opt{{ $o }}" name="answer" required>
                                    <label for="opt{{ $o }}" style="margin-top: 10px;margin-left: 10px">{{ $opt->option }}</label>
                                </div>
                            @empty
                            @endforelse

                            <div class="row text-center justify-content-center">
                                @if(($totalAnswers+1)==$totalQuestion)
                                    <button class="btn btn-success mt-5 MyButton">Finish Quiz <i class="fa fa-arrow-circle-o-right"></i></button>
                                @else
                                <button class="btn btn-success mt-5 MyButton">Next Question <i class="fa fa-arrow-circle-o-right"></i></button>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4">
                            @if(isset($question->image) && !empty($question->image))
                                <img src="{{ URL::asset('website/images/resource/video-3.jpg') }}" style="width: 100%"
                                     alt="">
                            @endif
                        </div>
                    </div>

                </form>

            @endif

        </div>
    </div>

@endsection
