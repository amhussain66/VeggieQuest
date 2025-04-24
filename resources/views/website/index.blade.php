@extends('website.includes.master')

@section('title')
    Home
@endsection

@section('content')

<style>
    @keyframes bounceScale {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    .veggie-animation { animation: bounceScale 2s infinite ease-in-out; }

    .progress-bar {
        background-color: #4CAF50; /* Green progress bar */
        height: 20px;
        border-radius: 10px;
        text-align: center;
        color: white;
    }
    .progress-container {
        background-color: #eee;
        border-radius: 10px;
        overflow: hidden;
        width: 80%;
        margin: 0 auto;
    }
</style>

<!-- Hero Section -->
<section class="banner-section" style="background-image:url({{ URL::asset('website/images/resource/Veggie-superheros-togther.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container text-center" style="padding-top: 20vh;">
        <h1 class="text-white" style="font-size: 64px;">Join the Veggie Heroes!</h1>
        <h4 class="text-white">Power up your health with fun games, recipes, and more!</h4>
        <a href="#start-adventure" class="theme-btn btn-style-one mt-4">Start Your Adventure</a>
    </div>
</section>



<!-- Veggie of the Week -->
<section class="categories-section">
    <div class="auto-container text-center">
        <h2><b>Veggie of the Week</b></h2>
        <p>Unlock this week’s hero veggie and its secret power!</p>
        <button id="reveal-veggie-btn" class="theme-btn btn-style-one mt-3">Reveal Veggie</button>

        <div id="veggie-of-week-box" class="veggie-of-week my-5" style="display: none;">
            <h3 class="mb-3">This week's Veggie Hero: <br>{{ $fact->title }}</h3>
            <img src="{{ asset($fact->image_path) }}" alt="{{ $fact->title }}" style="max-width: 300px;" class="mb-3 veggie-animation">
            <p>{{ $fact->fact }}</p>
        </div>
    </div>
</section>

<!-- Veggie Power Level -->
<section class="trending-section bg-light py-5">
    <div class="auto-container text-center">
        <h2>🌟 Your Veggie Power Level</h2>
        
        @php
            $points = Auth::guard('websiteuser')->user()->points ?? 0;
            $maxPoints = 100;
            $progress = min(100, ($points / $maxPoints) * 100);
        @endphp

        <div class="progress-container my-3" style="background-color: #eee; border-radius: 10px; overflow: hidden; width: 80%; margin: 0 auto; height: 20px;">
            <div id="progress-bar" style="background-color: #ffc107; height: 100%; line-height: 20px; text-align: center; color:white; width: {{ intval($progress) }}%;">
                {{ intval($progress) }}%
            </div>
        </div>

        <p>Eat veggies, complete missions, and level up!</p>
    </div>
</section>



<!-- Mission of the Week -->
<section class="trending-section py-5 bg-light" id="start-adventure">
    <div class="auto-container">
        <div class="row align-items-center">

            <!-- Text Column -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <div class="inner-column">
                    <h2 class="mb-3">🚀 Mission of the Week: Build Your Super Salad!</h2>
                    <p class="mb-4">Create a colorful salad with 3 or more veggies. Share it and earn your badge!</p>

                    <div class="progress-container mb-3">
                        <div class="progress-bar" style="width: 20%;">1 of 5 Missions Complete</div>
                    </div>

                    <a href="/user/Quiz" class="theme-btn btn-style-one mb-3 d-inline-block">Accept the Mission</a>

                    <button id="complete-mission-btn" class="theme-btn btn-style-two mb-3 d-inline-block">I Did It!</button>

                    <div id="mission-complete" style="display: none;">
                        <p class="fact-text">🎉 You earned a badge!</p>
                        <img src="{{ URL::asset('website/images/resource/veggie-mission-badge-1.jpg') }}" class="badge-img" alt="Mission Badge">
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-lg-6 col-md-12">
                <div class="inner-column text-center">
                    <img src="{{ URL::asset('website/images/resource/super-salad.png') }}" alt="Super Salad Mission" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
                </div>
            </div>

        </div>
    </div>
</section>

<div class="row mt-5 text-center">
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

<!-- Fun Games & Activities -->
<section class="categories-section">
    <div class="auto-container text-center">
        <h2>🎮 Fun Games & Activities</h2>
        <p>Play, color, and quiz your way to veggie mastery!</p>
        <div class="row justify-content-center mt-4">
            <!-- Add your game/activity links -->
            <div class="col-md-3">
                <a href="/games" class="theme-btn btn-style-one">Play Games</a>
            </div>
            <div class="col-md-3">
                <a href="/activities" class="theme-btn btn-style-one">Coloring Pages</a>
            </div>
            <div class="col-md-3">
                <a href="/quizzes" class="theme-btn btn-style-one">Veggie Quiz</a>
            </div>
        </div>
    </div>
</section>

<!-- Fun Recipes -->
<section class="popular-recipes-section">
    <div class="auto-container text-center">
        <h2>🍽️ Power-Up Recipes</h2>
        <p>Cook fun, healthy meals with your favorite veggies!</p>
        <a href="{{ route('recipes') }}" class="theme-btn btn-style-one mt-3">See Recipes</a>
    </div>
</section>

<!-- Parent & Teacher Zone -->
<section class="call-to-action-section text-center" style="background-color: #f9f9f9;">
    <div class="auto-container">
        <h2>👩‍🏫 Parent & Teacher Zone</h2>
        <p>Helpful guides, resources, and tips to support young veggie heroes!</p>
        <a href="/parents-teachers" class="theme-btn btn-style-two mt-3">Visit Grown-Up Zone</a>
    </div>
</section>


<style>
.progress-container {
    background-color: #eee;
    border-radius: 10px;
    overflow: hidden;
    width: 80%;
    margin: 0 auto;
    height: 20px;
}

.progress-bar {
    background-color: #ffc107; /* Start as yellow */
    height: 100%;
    line-height: 20px;
    border-radius: 10px;
    text-align: center;
    color: white;
    transition: width 0.5s ease, background-color 0.5s ease, box-shadow 0.5s ease;
    box-shadow: 0 0 5px #ffc107, 0 0 10px #ffc107; /* Glow effect */
}

.badge-img {
    border-radius: 50%; /* Make it circular */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add soft shadow */
    max-width: 150px;
    margin-top: 10px;
    display: inline-block;
}

#mission-complete {
    text-align: center;
    margin-top: 20px;
}

#mission-complete img {
    border-radius: 50%; /* Make it a circle */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Soft shadow */
    max-width: 150px; /* Slightly bigger if you'd like */
    margin-top: 10px;
}

</style>

<script>
let progress = {{ intval($progress) }};
let hasRevealedVeggie = localStorage.getItem('lastRevealDate') === new Date().toISOString().split('T')[0];
let missionCompleted = localStorage.getItem('missionCompleted') === 'true';

function updateProgress(increase) {
    progress = Math.min(100, progress + increase);
    const progressBar = document.getElementById("progress-bar");
    progressBar.style.width = progress + "%";
    progressBar.innerText = progress + "%";

    // Animate color & glow
    if (progress < 50) {
        progressBar.style.backgroundColor = '#ffc107'; // Yellow
        progressBar.style.boxShadow = '0 0 5px #ffc107, 0 0 10px #ffc107';
    } else if (progress < 80) {
        progressBar.style.backgroundColor = '#ff9800'; // Orange
        progressBar.style.boxShadow = '0 0 5px #ff9800, 0 0 15px #ff9800';
    } else {
        progressBar.style.backgroundColor = '#4CAF50'; // Green
        progressBar.style.boxShadow = '0 0 5px #4CAF50, 0 0 20px #4CAF50';
    }

    // Save progress to backend
    fetch('{{ url("/update-progress") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ points: progress })
    }).then(response => response.json())
      .then(data => {
        if (data.success) {
            console.log('Progress saved:', data.points + '%');
        }
    });
}

function awardBadge(badgeName) {
    fetch('{{ url("/award-badge") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ badge_name: badgeName })
    }).then(response => response.json())
      .then(data => {
        console.log('Badge response:', data);
    });
}


// Reveal Veggie Logic (Once Per Day)
document.getElementById("reveal-veggie-btn").addEventListener("click", function () {
    const box = document.getElementById("veggie-of-week-box");
    box.style.display = (box.style.display === "none" || box.style.display === "") ? "block" : "none";

    if (!hasRevealedVeggie) {
        updateProgress(20);
        awardBadge('veggie_fact_finder');
        localStorage.setItem('lastRevealDate', new Date().toISOString().split('T')[0]);
        hasRevealedVeggie = true;
    }
});

// Complete Mission Logic (Once Only)
document.getElementById("complete-mission-btn").addEventListener("click", function () {
    if (missionCompleted) return;

    document.getElementById("mission-complete").style.display = "block";
    updateProgress(10);
    awardBadge('mission1');
    localStorage.setItem('missionCompleted', 'true');
    missionCompleted = true;
});
</script>


@endsection
