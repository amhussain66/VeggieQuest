@extends('website.includes.master')

@section('title')
    Veggie Facts & Benefits
@endsection

@section('content')

<!-- 🌿 Hero Banner -->
<section class="page-title" style="background-image:url({{ URL::asset('website/images/background/facts-bg.png') }}); background-size: cover; background-position: center;">
    <div class="auto-container text-center py-5">
        <h1 class="display-4 text-white">Veggie Facts & Benefits</h1>
        <p class="lead text-white">Explore superpowers hidden in your favorite veggies!</p>
    </div>
</section>

<!-- 🌟 Sticky Nav -->
<!-- <div class="auto-container my-5">
    <div class="d-flex justify-content-center flex-wrap gap-3">
        <a href="#broccoli" class="btn btn-outline-success">🥦 Broccoli</a>
        <a href="#carrots" class="btn btn-outline-warning">🥕 Carrots</a>
        <a href="#sweet-potatoes" class="btn btn-outline-danger">🍠 Sweet Potatoes</a>
        <a href="#avocados" class="btn btn-outline-success">🥑 Avocados</a>
        <a href="#spinach" class="btn btn-outline-primary">🥬 Spinach</a>
        <a href="#corn" class="btn btn-outline-warning">🌽 Corn</a>
    </div>
</div> -->

<!-- 🥦 Veggie Facts Carousel -->
<section class="veggie-carousel-section py-5">
    <div class="auto-container text-center">
        <h2 class="mb-4 text-success fw-bold">🌿 Discover the Superpowers of Veggies!</h2>
        <p class="mb-5">Press on the veggie you want to learn more about! And to find out about the other veggies,
            <br> click through to learn fun facts and awesome benefits!</p>
            <!-- 🌟 Sticky Nav -->
            <div class="auto-container my-5">
                <!-- 🌟 Veggie Nav Buttons -->
                <div class="d-flex justify-content-center flex-wrap gap-3 mb-5">
                <button class="btn btn-outline-success" data-bs-target="#veggieFactsSlider" data-bs-slide-to="11">🥦 Broccoli</button>
                <button class="btn btn-outline-warning" data-bs-target="#veggieFactsSlider" data-bs-slide-to="7">🥕 Carrots</button>
                <button class="btn btn-outline-danger" data-bs-target="#veggieFactsSlider" data-bs-slide-to="0">🎃 Pumpkin</button>
                <button class="btn btn-outline-success" data-bs-target="#veggieFactsSlider" data-bs-slide-to="5">🌱 Green Onion</button>
                <button class="btn btn-outline-primary" data-bs-target="#veggieFactsSlider" data-bs-slide-to="2">🍆 Aubergine </button>
                <button class="btn btn-outline-warning" data-bs-target="#veggieFactsSlider" data-bs-slide-to="8">🌽 Corn</button>
            </div>
        </div>

        <div id="veggieFactsSlider" class="carousel slide carousel-dark carousel-fade">
        <div class="carousel-indicators">
    @for ($i = 0; $i < 15; $i++)
        <button type="button" data-bs-target="#veggieFactsSlider" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}" aria-current="{{ $i == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}"></button>
    @endfor
</div>
    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/1-pumpkin.png') }}" class="mb-4 veggie-icon-lg" alt="Pumpkin Icon" />
                <h4>🎃 Pumpkin – Power Packed Potions</h4>
                <p>Pumpkins are full of Vitamin A, which helps your eyes see in the dark like a superhero!</p>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/2-pepper.png') }}" class="mb-4 veggie-icon-lg" alt="Pepper Icon" />
                <h4>🌶️ Bell Peppers – Rainbow Crunch</h4>
                <p>Red, yellow, green—bell peppers are full of Vitamin C to keep you strong and smiling!</p>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="p-4">
            <img src="{{ asset('website/images/icons/3-orb.png') }}" class="mb-4 veggie-icon-lg" alt="Orb Icon" />
            <h4>🍆 Aubergine  – Brain Boost Buddy</h4>
            <p>Aubergines are full of antioxidants that help keep your brain sharp and focused!</p>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/4-red-onion.png') }}" class="mb-4 veggie-icon-lg" alt="Red Onion Icon" />
                <h4>🧅 Red Onion – The Flavor Ninja</h4>
                <p>Red onions sneak flavor into your meals and help your body fight off germs!</p>
            </div>
        </div>

        <!-- Slide 5 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/5-chilli.png') }}" class="mb-4 veggie-icon-lg" alt="Chilli Icon" />
                <h4>🌶️ Chilli – The Tiny Fireball</h4>
                <p>Just a little bit of chilli can wake up your taste buds and speed up your metabolism!</p>
            </div>
        </div>

        <!-- Slide 6 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/6-green-onion.png') }}" class="mb-4 veggie-icon-lg" alt="Green Onion Icon" />
                <h4>🌱 Green Onion – The Little Helper</h4>
                <p>These skinny veggies help your heart and give your meals a zesty kick!</p>
            </div>
        </div>

        <!-- Slide 7 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/7-beetroot.png') }}" class="mb-4 veggie-icon-lg" alt="Beetroot Icon" />
                <h4>❤️ Beetroot – Heartbeat Hero</h4>
                <p>Beets keep your blood strong and your heart pumping happily!</p>
            </div>
        </div>

        <!-- Slide 8 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/8-carrot.png') }}" class="mb-4 veggie-icon-lg" alt="Carrot Icon" />
                <h4>🥕 Carrots – Night Vision Ninjas</h4>
                <p>Carrots help you see clearly—especially in the dark! 🥷</p>
            </div>
        </div>

        <!-- Slide 9 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/9-corn.png') }}" class="mb-4 veggie-icon-lg" alt="Corn Icon" />
                <h4>🌽 Corn – Pop of Power</h4>
                <p>Corn helps your tummy stay happy and strong with its fiber goodness!</p>
            </div>
        </div>

        <!-- Slide 10 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/10-red-pepper.png') }}" class="mb-4 veggie-icon-lg" alt="Red Pepper Icon" />
                <h4>❤️ Red Pepper – Vitamin C Champion</h4>
                <p>Red peppers have even more Vitamin C than oranges. Wow! 💪</p>
            </div>
        </div>

        <!-- Slide 11 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/11-colliflower.png') }}" class="mb-4 veggie-icon-lg" alt="Cauliflower Icon" />
                <h4>🧠 Cauliflower – Brainy Bites</h4>
                <p>This white veggie helps your brain stay sharp and focused!</p>
            </div>
        </div>

        <!-- Slide 12 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/12-broccoli.png') }}" class="mb-4 veggie-icon-lg" alt="Broccoli Icon" />
                <h4>🥦 Broccoli – Tiny Tree of Strength</h4>
                <p>Broccoli is a superhero veggie with iron, fiber, and more Vitamin C than oranges!</p>
            </div>
        </div>

        <!-- Slide 13 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/13-squash.png') }}" class="mb-4 veggie-icon-lg" alt="Squash Icon" />
                <h4>🍠 Squash – Energy Zapper</h4>
                <p>Squash is soft, sweet, and full of potassium to keep you moving!</p>
            </div>
        </div>

        <!-- Slide 14 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/14-potato.png') }}" class="mb-4 veggie-icon-lg" alt="Potato Icon" />
                <h4>🥔 Potatoes – Earthy Energy Balls</h4>
                <p>Potatoes give you long-lasting fuel for fun, learning, and games!</p>
            </div>
        </div>

        <!-- Slide 15 -->
        <div class="carousel-item">
            <div class="p-4">
                <img src="{{ asset('website/images/icons/15-mushroom.png') }}" class="mb-4 veggie-icon-lg" alt="Mushroom Icon" />
                <h4>🍄 Mushrooms – Forest Power Caps</h4>
                <p>Mushrooms boost your immune system and give your meals super flavor!</p>
            </div>
        </div>

    </div>

    <!-- Controls -->
    <a class="carousel-control-prev" href="#veggieFactsSlider" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#veggieFactsSlider" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

    </div>
</section>

<!-- 🧩 Veggie Comic Strip -->
<section class="comic-strip py-5" style="background-color: #fffbe6;">
  <div class="container">
    <h2 class="text-center mb-5 text-warning fw-bold">🥕 Super Veggie Adventures!</h2>
    <p class="comic-caption text-center mb-5">
     <em>Read the Veggie Comic below to see how your favorite superhero veggies save the day with their amazing powers!</em>
    </p>

    <div class="comic-panels d-flex flex-wrap justify-content-center gap-4">
      
      <!-- Panel 1 -->
      <div class="comic-panel">
        <img src="{{ asset('website/images/comic/panel1.png') }}" alt="Carrot yelling night vision">
        <p class="caption">“The kids look tired,” says Broccoli</p>
      </div>

      <!-- Panel 2 -->
      <div class="comic-panel">
        <img src="{{ asset('website/images/comic/panel2.png') }}" alt="Sad kids in night vision">
        <p class="caption">Super Carrot yells: "Night Vision!"</p>
      </div>

      <!-- Panel 3 -->
      <div class="comic-panel">
        <img src="{{ asset('website/images/comic/panel3.png') }}" alt="Pepper superhero">
        <p class="caption">Carrot scans the kids in night vision mode.</p>
      </div>

      <!-- Panel 4 -->
      <div class="comic-panel">
        <img src="{{ asset('website/images/comic/panel4.png') }}" alt="Kids in garden night mode">
        <p class="caption">Red Pepper to the rescue: "I'll boost their immunity!" </p>
      </div>

      <!-- Panel 5 -->
      <div class="comic-panel">
        <img src="{{ asset('website/images/comic/panel5.png') }}" alt="Kids high five veggies">
        <p class="caption">Mission complete! High-fives all around!</p>
      </div>

    </div>
  </div>
</section>


<!-- 🍽️ Veggie Recipes Carousel Section -->
<section class="py-5 vg-fact-bg" style="background-color:rgb(184, 231, 223);">
    <div class="auto-container">
        <div class="text-center mb-5">
            <h2 class="text-info fw-bold">🍽️ Veggie Recipes to Try!</h2>
            <p class="text-muted">Tasty, healthy dishes packed with veggie superpowers!</p>
        </div>

        <div class="row align-items-center">
            <!-- 📊 Difficulty Legend -->
            <div class="recipe-difficulty-guide">
                <h5 class="fw-bold mb-3">🍳 Recipe Difficulty Guide</h5>
                <div class="d-flex align-items-center justify-content-start gap-4">
                    <div class="text-center">
                        <img src="{{ asset('website/images/icons/difficulty-1.png') }}" class="difficulty-guide-icon" alt="Easy">
                        <p class="small mt-2">Easy<br><span class="text-muted">Little help needed</span></p>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('website/images/icons/difficulty-2.png') }}" class="difficulty-guide-icon" alt="Medium">
                        <p class="small mt-2">Medium<br><span class="text-muted">Some grown-up help</span></p>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('website/images/icons/difficulty-3.png') }}" class="difficulty-guide-icon" alt="Hard">
                        <p class="small mt-2">Hard<br><span class="text-muted">Grown-up needed</span></p>
                    </div>
                </div>
            </div>


            <!-- 🥕 Carousel -->
            <div class="col-md-8">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($featuredRecipes as $index => $recipe)
                            <div class="carousel-item @if($index == 0) active @endif">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 text-center">
                                        <a href="{{ route('recipe_detail', [$recipe->slug]) }}">
                                            <img src="{{ asset('admin/assets/uploads/'.$recipe->image) }}"
                                                 class="w-100 rounded-top recipe-img"
                                                 alt="{{ $recipe->heading }}">
                                        </a>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <h4 class="text-success mb-0">{{ $recipe->heading }}</h4>
                                                @php
                                                    $difficultyIcon = 'difficulty-' . $recipe->difficulty . '.png';
                                                @endphp
                                                <img src="{{ asset('website/images/icons/' . $difficultyIcon) }}"
                                                    alt="Difficulty Level {{ $recipe->difficulty }}"
                                                    class="recipe-difficulty-icon">
                                            </div>
                                            <p class="text-muted">{{ Str::limit(strip_tags($recipe->description), 120) }}</p>
                                            <a href="{{ route('recipe_detail', [$recipe->slug]) }}" class="btn btn-outline-success">View Recipe</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- 🌱 Closing CTA -->
<section class="py-5 text-center" style="background-color: #e6fff2;">
    <div class="auto-container">
        <h2 class="text-success fw-bold mb-3">🌟 Eat Your Superpowers!</h2>
        <p class="text-muted mb-4">Add colorful veggies to your plate every day to boost your body, sharpen your mind, and feel amazing inside and out!</p>
        @auth
            <a href="{{ url('/Quiz') }}" class="btn btn-success btn-lg px-4 shadow">
                🧠 Take the Veggie Quiz!
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-success btn-lg px-4 shadow">
                🔒 Login to Take the Veggie Quiz!
            </a>
        @endauth

    </div>
</section>

<!-- 🎬 Video -->
<section class="py-5 bg-light">
    <div class="auto-container text-center">
        <h4 class="fw-bold mb-3">🎥 Watch & Learn</h4>
        <iframe width="800" height="450" src="https://www.youtube.com/embed/00xZyFeUSf8"
            title="Discover Healthy Vegetables"
            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen class="rounded shadow"></iframe>
    </div>
</section>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>



@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const myCarousel = document.querySelector('#veggieFactsSlider');
            if (myCarousel) {
                new bootstrap.Carousel(myCarousel, {
                    interval: false,
                    ride: false
                });
            }
        });
    </script>
@endsection
