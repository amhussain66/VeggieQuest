@extends('website.includes.master')

@section('title')
    Quiz
@endsection

@section('content')

<!-- Page Title -->
<section class="page-title" style="background-image:url({{ URL::asset('website/images/background/17.png') }})">
    <div class="auto-container">
        <h1>Fun Challenges</h1>
    </div>
</section>
<!--End Page Title-->

<div class="sidebar-page-container" style="background: linear-gradient(135deg, #e0f7fa 0%, #c8e6c9 100%); padding: 50px 0;">
    <div class="container">

        <div class="text-center mb-5">
            <h2 style="font-size: 40px; font-weight: bold;">🥦 Mission: Quiz Master!</h2>
            <p style="font-size: 18px; color: #555;">
                Answer all the veggie-powered questions to unlock your trivia badge!
            </p>
        </div>

        {{-- Quiz Logic --}}
        @if(isset($quizCompleted) && $quizCompleted)
            <div class="text-center my-5">
                <img src="{{ asset('website/images/resource/quiz-buddy-happy.png') }}" alt="Quiz Completed" style="max-width: 200px; border-radius: 20px;">
                <h3 class="text-success mt-3">🎉 You've completed today's quiz!</h3>
                <a href="{{ route('user.quiz.results', ['correct' => $correctCount ?? 0, 'total' => $totalQuestion ?? 10]) }}" 
                class="btn btn-primary mt-3">
                View Your Results
                </a>
            </div>
        @elseif(isset($question))
            {{-- Quiz Form --}}
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

                <div class="row align-items-stretch">
                    <!-- Left Column: Question + Options -->
                    <div class="col-md-8 d-flex flex-column">
                        <div class="row">
                            <h4>
                                <b>Q{{ $totalAnswers + 1 }}:</b> {{ $question->question }}
                            </h4>
                        </div>
                        <br>
                        <div class="row">
                            @foreach($question->options as $o => $opt)
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
                            @endforeach
                        </div>
                        <div class="row text-center justify-content-center">
                            <button class="btn btn-success mt-5 MyButton">
                                {{ ($totalAnswers + 1) == $totalQuestion ? 'Finish Quiz' : 'Next Question' }} 
                                <i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Right Column: Image / Feedback -->
                    <div class="col-md-4 d-flex">
                        @if(!session('quiz_result'))
                            @if(!empty($question->image))
                                <img src="{{ URL::asset('website/images/resource/' . $question->image) }}" 
                                    class="img-fluid rounded flex-grow-1" 
                                    style="object-fit: cover; width: 100%; border-radius: 20px;" 
                                    alt="Quiz Image">
                            @else
                                <img src="{{ URL::asset('website/images/icons/quiz-time.png') }}" 
                                    class="img-fluid rounded flex-grow-1" 
                                    style="object-fit: cover; width: 100%; border-radius: 20px;" 
                                    alt="Quiz Time">
                            @endif
                        @else
                            {{-- Feedback --}}
                            <div class="text-center mb-4 w-100">
                                @if(session('quiz_result') == 'correct')
                                    <img src="{{ asset('website/images/resource/quiz-buddy-happy.png') }}" class="img-fluid rounded w-100">
                                    <p class="text-success mt-2"><strong>Great job! You got it right! 🎉</strong></p>
                                @else
                                    <img src="{{ asset('website/images/resource/quiz-buddy-sad.png') }}" class="img-fluid rounded w-100">
                                    <p class="text-danger mt-2"><strong>Oops! Not quite right — try the next one! 😅</strong></p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        @endif

        {{-- 🧩 Daily Puzzle Section Always Visible --}}
        @if(isset($puzzles) && $puzzles->count())
            <div class="daily-puzzles mt-5 p-4" style="background-color: #fff8e1; border-radius: 10px;">
                <h2 class="text-center mb-4">🧩 Today's Veggie Puzzles</h2>
                <div class="row justify-content-center">
                    @foreach($puzzles as $puzzle)
                        <div class="col-md-6 col-lg-5 mb-4">
                            <div class="p-4 border rounded bg-white shadow-sm" style="border-radius: 10px;">
                                <h5 class="mb-2"><strong>Type:</strong> {{ ucfirst($puzzle->type) }}</h5>
                                <p class="lead mb-3">{{ $puzzle->question }}</p>
                                @if(in_array($puzzle->id, $answeredPuzzleIds))
                                    <p class="text-success mb-0">✅ Already answered!</p>
                                @else
                                    <form action="{{ route('user.puzzle.submit') }}" method="POST" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="puzzleid" value="{{ $puzzle->id }}">
                                        <input type="text" name="user_answer" class="form-control mb-2" placeholder="Your answer..." required>
                                        <button type="submit" class="btn btn-warning w-100 text-white" style="background-color: #ff9800;">Submit Answer</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center text-muted">No puzzles available for today. Check back tomorrow!</p>
        @endif

        {{-- 🎮 Extra Fun Section --}}
        <div class="extra-fun-section mt-5 p-5" style="background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%); border-radius: 15px;">
            <div class="row align-items-center">
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <img src="{{ asset('website/images/icons/fun-challenges.png') }}" 
                        class="img-fluid rounded" 
                        style="max-width: 60%; height: auto; border-radius: 20px; box-shadow: 0 0 20px rgba(255, 140, 0, 0.7);" 
                        alt="Fun Challenges">
                </div>
                <div class="col-md-6 text-center text-md-left">
                    <h2 class="mb-4" style="font-size: 36px; font-weight: bold; color: #ff6f00;">🎮 More Veggie Fun Awaits!</h2>
                    <p class="lead mb-4" style="font-size: 20px; color: #5d4037;">
                        Dive into a world of veggie-themed games, creative printables, and exciting challenges designed just for YOU!
                        <br> Let’s play and learn! 🎨🥦🎯
                    </p>
                    <a href="{{ url('/activities') }}" 
                    class="btn btn-lg" 
                    style="background-color: #ff9800; color: white; padding: 12px 30px; font-size: 18px; border-radius: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                    🚀 Explore Activities
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
