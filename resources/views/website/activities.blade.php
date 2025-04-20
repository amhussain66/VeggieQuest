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

<!-- 🌟 Sticky Navigation Buttons -->
<div class="auto-container my-5">
    <div class="d-flex justify-content-center flex-wrap gap-4">
        <a href="#brain-games" class="btn btn-outline-primary px-4 py-2 fw-bold">🍎 Food Games</a>
        <a href="#food-games" class="btn btn-outline-success px-4 py-2 fw-bold">🧠 Match It Games</a>
        <a href="#fitness-videos" class="btn btn-outline-info px-4 py-2 fw-bold">🏃 Fitness</a>
        <a href="#printables" class="btn btn-outline-warning px-4 py-2 fw-bold">🖍️ Printables</a>
    </div>
</div>

<!-- 🎮 Helathy Foods -->
<section id="brain-games" class="game-section py-5"style=" background-color:rgba(252, 213, 85, 0.62);" >
    <div class="auto-container text-center">
    <h2 class="section-title mb-4">🍎 Healthy Food Games</h2>
    <p class="lead text-muted mb-4">Get ready to explore fun, interactive games that teach kids all about healthy food choices! Click a game to jump right in.</p>

        <div class="row justify-content-center g-4">

            <!-- Game 1: Match It (iframe) -->
            <!-- <div class="col-md-6 col-lg-3">
                <h5 class="fw-bold mb-3">Match It Game</h5>
                <div class="ratio ratio-4x3 rounded shadow overflow-hidden">
                    <iframe 
                        title="Match It - Fruits and Vegetables Game"
                        allowfullscreen allowtransparency="true"
                        style="border: none;"
                        src="https://static.tinytap.com/media/webplayer/webplayer.html?id=4AAEE896-CA1A-4B77-837C-B1BAC6DD608C">
                    </iframe>
                </div>
            </div> -->

          <!-- Game 1: Lunchbox Hero -->
              <div class="col-md-6 col-lg-3">
              <a href="https://wordwall.net/resource/4153860/healthy-and-unhealthy-food" target="_blank" class="text-decoration-none">
                    <img src="{{ asset('website/images/games/game-1.png') }}" class="img-fluid rounded shadow" alt="HEALTHY AND UNHEALTHY FOOD" />
                    <h6 class="mt-2 text-dark fw-bold">Healthy and Unhealthy Food</h6>
                </a>
            </div>
            

            <!-- Game 2: Lunchbox Hero -->
            <div class="col-md-6 col-lg-3">
                <a href="https://www.healthforkids.co.uk/game/lunchbox-hero/" target="_blank" class="text-decoration-none">
                    <img src="{{ asset('website/images/games/game-2.png') }}" class="img-fluid rounded shadow" alt="Lunchbox Hero" />
                    <h6 class="mt-2 text-dark fw-bold">Lunchbox Hero</h6>
                </a>
            </div>

            <!-- Game 3: USDA Nutrition Explorer -->
            <div class="col-md-6 col-lg-3">
                <a href="https://www.fns.usda.gov/apps/TNinteractive/index.html" target="_blank" class="text-decoration-none">
                    <img src="{{ asset('website/images/games/game-3.png') }}" class="img-fluid rounded shadow" alt="USDA Nutrition Explorer" />
                    <h6 class="mt-2 text-dark fw-bold">Nutrition Explorer</h6>
                </a>
            </div>

            <!-- Game 4: Pick Your Plate -->
            <div class="col-md-6 col-lg-3">
                <a href="https://ssec.si.edu/pick-your-plate" target="_blank" class="text-decoration-none">
                    <img src="{{ asset('website/images/games/game-4.png') }}" class="img-fluid rounded shadow" alt="Pick Your Plate" />
                    <h6 class="mt-2 text-dark fw-bold">Pick Your Plate</h6>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- 🥦 Brain Games -->
<section id="food-games" class="game-section bg-light py-5" style="background-image: url('/website/images/\background\match-it-games-bg.svg'); background-size: cover; ">
    <div class="auto-container text-center">
    <h2 class="section-title mb-4">🥦 Match It Games</h2>
    <p class="lead text-muted mb-4">Challenge your brain with these fun matching games. Perfect for developing memory and learning about fruits and veggies!</p>

        <div class="row justify-content-center">
            <!-- First Game -->
            <div class="col-md-6 col-lg-5 mb-4">
                <div class="match-card">
                    <iframe
                        class="match-iframe"
                        title="Match It - Fruits and Vegetables Game"
                        src="https://static.tinytap.com/media/webplayer/webplayer.html?id=4AAEE896-CA1A-4B77-837C-B1BAC6DD608C"
                        allowfullscreen allowtransparency="true">
                    </iframe>
                    <div class="match-caption">🍓 Match the Fruits & Veggies!</div>
                </div>
            </div>

            <!-- Second Game -->
            <div class="col-md-6 col-lg-5 mb-4">
                <div class="match-card">
                    <iframe
                        class="match-iframe"
                        title="Healthy Eating Game"
                        src="https://static.tinytap.com/media/webplayer/webplayer.html?id=2CFFF832-0B1C-45BE-964C-E2CF4FE77B07"
                        allowfullscreen allowtransparency="true">
                    </iframe>
                    <div class="match-caption">🥕 Healthy Eating Challenge!</div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- 🕺 Fitness Videos -->
<section id="fitness-videos" class="game-section py-5"  style=" background-color:#17a2b8;" >
    <div class="auto-container text-center">
    <h2 class="section-title mb-4">🏃 Fun Fitness Videos</h2>
    <p class="lead text-muted mb-4">Time to move your body! Join in with these exciting, kid-friendly videos to stay active and have fun at the same time.</p>

        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <iframe width="100%" height="215" src="https://www.youtube.com/embed/LhYtcadR9nw" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 mb-4">
                <iframe width="100%" height="215" src="https://www.youtube.com/embed/-1-s8GBpFeQ" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 mb-4">
                <iframe width="100%" height="215" src="https://www.youtube.com/embed/QphRMalB_LM" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- 🖍️ Printable Pages Section -->
<section id="printables" class="printable-section py-5" style=" background-color:rgba(252, 213, 85, 0.62);" >
    <div class="auto-container text-center">
    <h2 class="mb-4" style="color: #7a57fa; font-weight: bold;">🖍️ Printable Fun Pages</h2>
    <p class="lead text-muted mb-4">Enjoy hands-on fun with printable coloring sheets and word searches. Just click, print, and play!</p>


        <!-- Toggle Buttons -->
        <div class="mb-4 d-flex justify-content-center flex-wrap gap-3">
            <button class="btn btn-warning px-4 py-2 fw-bold shadow-sm"
                onclick="togglePrintables('coloring')">🎨 Coloring Pages</button>
            <button class="btn btn-success px-4 py-2 fw-bold shadow-sm"
                onclick="togglePrintables('wordsearch')">🔍 Word Searches</button>
        </div>

        <!-- Coloring Pages -->
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

        <!-- Word Search Pages (Styled same as Coloring Pages) -->
        <div id="wordSearchCollapse" style="display: none;">
            <div class="row g-4 justify-content-center">
                @foreach($wordSearches as $search)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ asset('website/pdf/word_searches/' . $search['file']) }}" target="_blank" class="text-decoration-none">
                            <div class="coloring-card text-center p-4">
                                <img src="{{ asset('website/images/icons/' . $search['icon']) }}"
                                    alt="{{ $search['title'] }}"
                                    class="img-fluid coloring-icon rounded-icon mb-3" />
                                <h6 class="coloring-title">{{ $search['title'] }}</h6>
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

<!-- Smooth Scroll -->
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

@endsection
