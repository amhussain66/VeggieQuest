@extends('website.includes.master')

@section('title')
    Quiz Results
@endsection

@section('content')

<!-- Page Title -->
<section class="page-title" style="background-image:url({{ URL::asset('website/images/background/17.png') }}); background-size: cover; background-position: center;">
    <div class="auto-container text-center py-5">
        <h1 style="color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.7); font-size: 3rem;">
            Quiz Results
        </h1>
    </div>
</section>
<!-- End Page Title -->

<div class="sidebar-page-container py-5">
    <div class="container text-center">

        {{-- 🎯 Score Line --}}
        <h2 class="mb-4 fs-3">
            🎯 You got <strong>{{ $correct }}</strong> out of <strong>{{ $total }}</strong> questions right!
        </h2>

        {{-- 🌟 Veggie Character Feedback --}}
        <div class="my-4">
            @if($correct == $total)
                <img src="{{ asset('website/images/resource/quiz-veggie-hero1.png') }}" alt="You're a Hero!" class="img-fluid rounded shadow" style="max-height: 250px;">
                <h3 class="text-success mt-3 fs-4">🌟 You're a Veggie Hero! 🌟</h3>
            @elseif($correct >= 5)
                <img src="{{ asset('website/images/resource/quiz-veggie-hero2.png') }}" alt="Well Done!" class="img-fluid rounded shadow" style="max-height: 250px;">
                <h3 class="text-primary mt-3 fs-4">Well done! You're almost a master! 💪</h3>
            @else
                <img src="{{ asset('website/images/resource/quiz-veggie-hero3.png') }}" alt="Try Again!" class="img-fluid rounded shadow" style="max-height: 250px;">
                <h3 class="text-warning mt-3 fs-4">Better luck next time! Keep practicing! 🍀</h3>
            @endif
        </div>

        {{-- 🚀 CTA Buttons --}}
        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('recipes') }}" class="btn btn-success btn-lg shadow-sm">
                🍽️ Try a Veggie Recipe
            </a>
            <a href="{{ route('veggie_facts_benefits') }}" class="btn btn-info btn-lg shadow-sm">
                🌿 Learn Veggie Facts
            </a>
        </div>

    </div>
</div>

@if($correct == $total)
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
        <script>
            window.onload = function () {
                const duration = 4 * 1000;
                const animationEnd = Date.now() + duration;
                const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 2000 };

                function randomInRange(min, max) {
                    return Math.random() * (max - min) + min;
                }

                const interval = setInterval(function () {
                    const timeLeft = animationEnd - Date.now();

                    if (timeLeft <= 0) {
                        return clearInterval(interval);
                    }

                    confetti(Object.assign({}, defaults, {
                        particleCount: 50,
                        origin: { x: randomInRange(0.1, 0.9), y: Math.random() - 0.2 }
                    }));
                }, 250);
            }
        </script>
    @endpush
@endif


@endsection
