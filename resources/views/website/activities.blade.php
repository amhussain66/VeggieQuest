@extends('website.includes.master')

@section('title')
    Games & Activities
@endsection

@section('content')

<!-- 🎯 Hero Banner -->
<section class="page-title" style="background-image:url('{{ URL::asset('website/images/background/game-and-activities-bg.png') }}'); background-size: cover; background-position: center;">
    <div class="auto-container text-center py-5">
        <h1 class="display-4 text-white">Let’s Play & Learn!</h1>
        <p class="lead text-white">Explore veggie games, fun fitness, and activities made just for kids!</p>
    </div>
</section>

<!-- 🎮 Brain Games -->
<section class="game-section py-5">
    <div class="auto-container text-center">
        <h2 class="section-title mb-4">🧠 Brain Games</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <!-- <img src="{{ asset('website/images/games/match-it.jpg') }}" class="img-fluid rounded shadow" alt="Match It Game">
                <a href="https://www.example.com/match-it" class="btn btn-orange mt-2">Play Match It</a> -->
                <H3>Match It Game</H3>
                <iframe id="webplayer"
                title="Match It - Fruits and Vegetables Free Games online for kids in Nursery by Tiny Tap"
                style="background-color:transparent" width="100%" height="300" webkitallowfullscreen=""
                mozallowfullscreen="" allowfullscreen="" allowtransparency="true"
                data_src="https://static.tinytap.com/media/webplayer/webplayer.html?id=4AAEE896-CA1A-4B77-837C-B1BAC6DD608C"
                src="https://static.tinytap.com/media/webplayer/webplayer.html?id=4AAEE896-CA1A-4B77-837C-B1BAC6DD608C"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- 🥦 Healthy Food Games -->
<section class="game-section bg-light py-5">
    <div class="auto-container text-center">
        <h2 class="section-title mb-4">🍎 Healthy Food Games</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <img src="{{ asset('website/images/more-games.png') }}" class="img-fluid rounded shadow" alt="More Games">
                <a href="https://wordwall.net/resource/4153860/healthy-and-unhealthy-food" class="btn btn-orange mt-2">Play More Games</a>
            </div>
        </div>
    </div>
</section>

<!-- 🕺 Fitness Videos -->
<section class="game-section py-5">
    <div class="auto-container text-center">
        <h2 class="section-title mb-4">🏃 Fun Fitness Videos</h2>
        <div class="row justify-content-center">
            <!-- Video 1 -->
            <div class="col-md-4 mb-4">
                <iframe width="100%" height="215" src="https://www.youtube.com/embed/LhYtcadR9nw" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Video 2 -->
            <div class="col-md-4 mb-4">
                <iframe width="100%" height="215" src="https://www.youtube.com/embed/-1-s8GBpFeQ" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Video 3 -->
            <div class="col-md-4 mb-4">
                <iframe width="100%" height="215" src="https://www.youtube.com/embed/QphRMalB_LM" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- 🖍️ Printable Pages Section -->
<section class="printable-section py-5">
    <div class="auto-container text-center">
        <h2 class="mb-4" style="color: #7a57fa; font-weight: bold;">
            🖍️ Printable Fun Pages
        </h2>

        <!-- Buttons -->
        <div class="mb-4 d-flex justify-content-center flex-wrap gap-3">
        <button class="btn btn-warning px-4 py-2 fw-bold shadow-sm"
                data-bs-toggle="collapse"
                data-bs-target="#coloringCollapse"
                onclick="togglePrintables('coloring')">
                🎨 Coloring Pages
            </button>
            <button class="btn btn-success px-4 py-2 fw-bold shadow-sm"
                data-bs-toggle="collapse"
                data-bs-target="#wordSearchCollapse"
                onclick="togglePrintables('wordsearch')">
                🔍 Word Searches
            </button>
        </div>

 <!-- Coloring Pages Collapse -->
        <div id="coloringCollapse" style="display: none;">
            <div class="row g-4 justify-content-center">
                @foreach($printables as $printable)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ asset('website/pdf/colouring_pages/' . $printable['file']) }}" target="_blank" class="text-decoration-none">
                            <div class="coloring-card text-center p-4">
                                <img src="{{ asset('website/images/icons/' . $printable['icon']) }}"
                                    alt="{{ $printable['title'] }}"
                                    class="img-fluid coloring-icon rounded-icon mb-3" />
                                <h6 class="coloring-title">{{ $printable['title'] }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Word Search Collapse -->
        <div id="wordSearchCollapse" style="display: none;">
            <div class="row g-4 justify-content-center">
                @foreach($wordSearches as $search)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ asset('website/pdf/word_searches/' . $search['file']) }}" target="_blank" class="text-decoration-none">
                            <div class="coloring-card text-center p-4">
                                <img src="{{ asset('website/images/icons/' . $search['icon']) }}"
                                    alt="{{ $search['title'] }}"
                                    class="img-fluid coloring-icon rounded-icon mb-3" />
                                <h6 class="text-success fw-bold">{{ $search['title'] }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    function togglePrintables(type) {
        const coloring = document.getElementById('coloringCollapse');
        const wordsearch = document.getElementById('wordSearchCollapse');

        if (type === 'coloring') {
            coloring.style.display = 'flex';
            wordsearch.style.display = 'none';
        } else {
            wordsearch.style.display = 'flex';
            coloring.style.display = 'none';
        }
    }

    // Default to coloring pages on load
    document.addEventListener("DOMContentLoaded", () => {
        togglePrintables('coloring');
    });
</script>

@endsection
