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

    <div class="sidebar-page-container">
        <div class="container">

            <div class="text-center mb-5">
                <h2 style="font-size: 40px; font-weight: bold;">🥦 Mission: Quiz Master!</h2>
                <p style="font-size: 18px; color: #555;">
                    Answer all the veggie-powered questions to unlock your trivia badge!
                </p>
            </div>

            {{-- Show completion screen if quiz is done --}}
            @if(isset($quizCompleted) && $quizCompleted)
                <div class="text-center my-5">
                    <img src="{{ asset('website/images/resource/quiz-buddy-happy.png') }}" alt="Quiz Completed" style="max-width: 200px; border-radius: 20px;">
                    <h3 class="text-success mt-3">🎉 You've completed today's quiz!</h3>
                    <a href="{{ route('user.quiz.results', ['correct' => $correctCount ?? 0, 'total' => $totalQuestion ?? 10]) }}" 
                    class="btn btn-primary mt-3">
                    View Your Results
                    </a>
                </div>

            {{-- Show quiz form if still ongoing --}}
            @elseif(isset($question))

                <form action="{{ route('user.savequiz') }}" method="post" class="MyForm">
                    @csrf

                    <input type="hidden" name="questionid" value="{{ $question->id }}">
                    <input type="hidden" name="quizid" value="{{ $quizid }}">
                    <input type="hidden" name="totalAnswers" value="{{ $totalAnswers }}">
                    <input type="hidden" name="totalQuestion" value="{{ $totalQuestion }}">
                    <input type="hidden" name="userid" value="{{ Auth::guard('websiteuser')->user()->id }}">

                    <div class="progress my-3" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ ($totalAnswers / $totalQuestion) * 100 }}%;" 
                            aria-valuenow="{{ $totalAnswers }}" 
                            aria-valuemin="0" 
                            aria-valuemax="{{ $totalQuestion }}">
                            {{ $totalAnswers }} / {{ $totalQuestion }} answered
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <h4>
                                    <b>Q{{ $totalAnswers + 1 }}:</b> {{ $question->question }}
                                </h4>
                            </div>
                            <br>

                            <div class="row">
                                @forelse($question->options as $o => $opt)
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check p-3 border rounded shadow-sm bg-light">
                                            <input class="form-check-input" type="radio" 
                                                name="answer" 
                                                id="opt{{ $o }}" 
                                                value="{{ $opt->option }}" 
                                                required>
                                            <label class="form-check-label" for="opt{{ $o }}">
                                                {{ $opt->option }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <p>No options available.</p>
                                @endforelse
                            </div>

                            <div class="row text-center justify-content-center">
                                @if(($totalAnswers + 1) == $totalQuestion)
                                    <button class="btn btn-success mt-5 MyButton">Finish Quiz <i class="fa fa-arrow-circle-o-right"></i></button>
                                @else
                                    <button class="btn btn-success mt-5 MyButton">Next Question <i class="fa fa-arrow-circle-o-right"></i></button>
                                @endif
                            </div>

                            @if($totalAnswers == $totalQuestion)
                                <div class="mt-4">
                                    <img src="{{ asset('website/images/resource/badge-complete.png') }}" alt="Badge" style="max-width: 120px;">
                                    <p class="text-success mt-2">🎉 You’ve completed this challenge! Check your profile for your badge!</p>
                                </div>
                            @endif

                        </div>

                        {{-- Right column for image/feedback --}}
                        <div class="col-md-4">
                            @if(!session('quiz_result') && isset($question->image) && !empty($question->image))
                                <img src="{{ URL::asset('website/images/resource/' . $question->image) }}" style="width: 100%" alt="">
                            @endif

                            @if(session('quiz_result'))
                                <div class="text-center mb-4">
                                    @if(session('quiz_result') == 'correct')
                                        <img src="{{ asset('website/images/resource/quiz-buddy-happy.png') }}" 
                                            alt="Correct!" 
                                            style="border-radius: 20px; max-width: 100%; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                        <p class="text-success mt-2"><strong>Great job! You got it right! 🎉</strong></p>
                                    @else
                                        <img src="{{ asset('website/images/resource/quiz-buddy-sad.png') }}" 
                                            alt="Incorrect." 
                                            style="border-radius: 20px; max-width: 100%; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                        <p class="text-danger mt-2"><strong>Oops! Not quite right — try the next one! 😅</strong></p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                </form>

            @endif {{-- closes @elseif for quiz --}}
            
        </div>
    </div>

    @endsection
