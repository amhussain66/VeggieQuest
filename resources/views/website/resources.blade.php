@extends('website.includes.master')

@section('title')
    Resources
@endsection

@section('content')

    <!-- Page Title -->
    <!-- 🌟 Hero Section -->
    <section class="page-title py-5 text-center" style="background-image:url({{ URL::asset('website/images/background/teachers-bg.png') }}); background-size: cover; background-position: center;">
        <div class="auto-container">
            <h1 class="display-4 text-white fw-bold"><br>
            For Parents & Teachers</h1>
            <p class="lead text-white mt-3">Helpful tools, tips, and fun activities to support your child’s healthy eating journey!</p>
        </div>
    </section>


        <!-- 🔗 Quick Access Resources -->
        <section class="py-4 bg-light">
            <div class="auto-container text-center">
                <h3 class="fw-bold text-success mb-3">Find the right section for you below</h3>
                <div class="row justify-content-center g-3">

                    @php
                        $resources = [
                            ['id' => 'meal-tips', 'icon' => '🍽️', 'title' => 'Meal Planning Tips', 'desc' => "Easy ways to organize your family's meals."],
                            ['id' => 'helpful-tools', 'icon' => '🔧', 'title' => 'Helpful Tools', 'desc' => 'BMI calculators & more to support healthy living.'],
                            ['id' => 'blogs', 'icon' => '📝', 'title' => 'Blogs', 'desc' => 'Read inspiring articles and practical tips.'],
                            ['id' => 'printables', 'icon' => '🖨️', 'title' => 'Printable PDFs', 'desc' => 'Coloring pages, word searches, and fun activities.'],
                            ['id' => 'advice-tips', 'icon' => '💡', 'title' => 'Advice & Tips', 'desc' => 'Learn how to add more nutrients to meals.'],
                            ['id' => 'faqs', 'icon' => '❓', 'title' => 'FAQs', 'desc' => 'Your top questions about healthy eating answered.'],
                        ];
                    @endphp

                    @foreach($resources as $resource)
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <a href="#{{ $resource['id'] }}" class="card shadow-sm h-100 p-3 text-decoration-none">
                                <h5 class="text-success mb-2">{{ $resource['icon'] }} {{ $resource['title'] }}</h5>
                                <p class="text-muted small mb-0">{{ $resource['desc'] }}</p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>



    <!-- Resources Section -->
    <section class="video-section"
             style="background-image: url({{ URL::asset('website/images/background/1.png') }});padding-top: 0px">
        <div class="auto-container">

            <div class="row text-center justify-content-center">
                <h1 class="mb-3">
                    <!-- <b>
                        Ready to get your to-do list <br> under control?
                    </b> -->
                </h1>
            </div>

            
            <sectio id="meal-tips" class="about-section py-5">
                <div class="auto-container">
                    <div class="card shadow-lg p-4">
                        <div class="card-body">
                            <div class="layer-one"
                                style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
                            <div class="layer-two"
                                style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>

                            <div class="row clearfix">
                                <!-- Image Column -->
                                <div class="image-column col-lg-6 col-md-12 col-sm-12 d-flex align-items-stretch">
                                    <div class="inner-column w-100">
                                        <div class="image h-100">
                                            <img src="{{ URL::asset('website/images/resource/p1.png') }}" 
                                                alt="" 
                                                class="img-fluid w-100 h-100" 
                                                style="object-fit: cover; border-radius: 10px;" />
                                        </div>
                                    </div>
                                </div>


                                <!-- Content Column -->
                                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <!-- Sec Title -->
                                        <div class="sec-title">
                                            <div class="title text-primary">Meal Planning Tips</div>
                                            <h2 class="fw-bold">MEAL PLANNING TIPS</h2>
                                        </div>
                                        <div class="text text-muted">
                                            <p><strong>Sunday AM -</strong> While drinking coffee at the breakfast table with the kids, I
                                                reference our meal index and choose 5 dinners for the week. I put those dinners
                                                in a OneNote template that my husband created.</p>

                                            <p><strong>Sunday AM -</strong> I reference recipes and add ingredients to the same OneNote template.
                                                I also add anything else we need for breakfasts, lunches, or snacks, checking
                                                the fridge and pantry as I go.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix mt-4 text-muted align-items-stretch">
                                <p><strong>Sunday AM -</strong> My husband goes grocery shopping using the OneNote template that syncs to his phone.</p>
                                <p><strong>Sunday PM -</strong> I make our Monday dinner in advance because Mondays are bonkers!</p>
                                <p><strong>Sunday PM -</strong> My husband usually cooks a new recipe or one that takes longer since we have more time on Sunday as compared to a weeknight.</p>
                                <p><strong>Monday - </strong>We eat the pre-made dinner in shifts between dance and piano.</p>
                                <p><strong>Tuesday -</strong> Tacos, enchiladas, or some variation (meal chosen on Sunday).</p>
                                <p><strong>Wednesday -</strong> Some sort of chicken dish usually (meal chosen on Sunday).</p>
                                <p><strong>Thursday - </strong>Some sort of pasta dish usually (meal chosen on Sunday).</p>
                                <p><strong>Friday - </strong>Pizza and movie night (alternate homemade and take-out).</p>
                                <p><strong>Saturday - </strong>Out to eat or leftovers.</p>
                                <p>I want to highlight why this routine works so well and doesn't take a ton of time so that you
                                    can see the process behind creating an effective and easy routine.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="helpful-tools" class="py-5" style="background-color: #fefefe;">
                <div class="auto-container">
                    <!-- Caption Above Buttons -->
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">Some Helpful Tools 🔧</h3>
                        <p class="text-muted">Knowing your BMI is an important step in understanding and managing your health.</p>
                    </div>

                    <!-- Button Cards -->
                    <div class="row g-4">
                        <!-- Adult BMI Calculator -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card shadow p-3 h-100">
                                <div class="card-body text-center">
                                    <a style="color:rgb(221, 137, 28); text-decoration: none;"
                                    href="https://www.nhs.uk/health-assessment-tools/calculate-your-body-mass-index/calculate-bmi-for-adults">
                                        <h2>⚖️ BMI Calculator <br> <b>For Adults</b> <br> <i class="fa fa-arrow-circle-right"></i></h2>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Children BMI Calculator -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card shadow p-3 h-100">
                                <div class="card-body text-center">
                                    <a style="color:rgb(221, 137, 28); text-decoration: none;"
                                    href="https://www.nhs.uk/health-assessment-tools/calculate-your-body-mass-index/calculate-bmi-for-children-teenagers">
                                        <h2>🚸 BMI Calculator <br> <b>Children and Teenagers</b> <br> <i class="fa fa-arrow-circle-right"></i></h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Why BMI Section -->
                    <div class="mt-5">
                        <div class="card shadow p-4">
                            <div class="card-body">
                                <h4 class="fw-bold text-success mb-3">Why Knowing BMI Matters</h4>
                                <p class="text-muted">
                                    Body Mass Index (BMI) helps assess whether an individual has a healthy weight for their height.
                                    For adults, it’s a useful tool for identifying potential health risks like heart disease or diabetes.
                                </p>
                                <p class="text-muted">
                                    <strong>For children and teenagers</strong>, BMI is especially important as it supports tracking healthy growth.
                                    Since their bodies are still developing, understanding BMI ensures they’re on the right track physically and can help prevent future health issues.
                                    Promoting healthy habits early sets the foundation for lifelong wellness!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


                        <!-- Blog Section -->
                        <section id="blogs" class="entertaining-section py-5 mb-5" style="background-color: #fff9f0;">
                            <div class="auto-container">
                                <!-- Sec Title -->
                                <div class="sec-title text-center mb-5">
                                    <h2>📝 Latest Blog Posts</h2>
                                    <p>Explore our latest blog posts below and discover more by clicking one.</p>
                                </div>

                                <div class="row clearfix">
                                    @forelse($blogs as $blog)
                                        <div class="entertaining-block col-lg-3 col-md-6 col-sm-12 mb-4">
                                            <div class="inner-box shadow-sm h-100 d-flex flex-column rounded-lg overflow-hidden">
                                                <div class="image">
                                                    <a href="{{ route('blog_detail', [$blog->slug]) }}">
                                                        <img src="{{ URL::asset('admin/assets/uploads/' . $blog->image) }}"
                                                            style="width: 100%; height: 300px; object-fit: cover;" alt="{{ $blog->heading }}"/>
                                                    </a>
                                                </div>
                                                <div class="lower-content text-center p-3 flex-grow-1 d-flex flex-column justify-content-between">
                                                    <ul class="post-meta list-unstyled mb-2">
                                                        <li><small>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</small></li>
                                                    </ul>
                                                    <h5 class="fw-bold mb-3" style="font-size: 1.1rem;">
                                                        <a href="{{ route('blog_detail', [$blog->slug]) }}" style="text-decoration: none; color: #333;">
                                                            {{ $blog->heading }}
                                                        </a>
                                                    </h5>
                                                    <a href="{{ route('blog_detail', [$blog->slug]) }}" class="btn btn-outline-warning fw-bold mt-auto">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center text-muted">No blog posts found.</p>
                                    @endforelse
                                </div>
                            </div>
                        </section>
                        
        <!-- 🌈 Printable Resources Section -->
        <section id="printables" class="py-5 mb-5" style="background-color: rgba(255, 252, 241, 0.62);">
            <div class="auto-container text-center">
                <h2 class="mb-4" style="color:rgb(7, 66, 13); font-weight: bold;">Printable Fun Pages</h2>
                <p class="lead text-muted mb-4">From various different printable pages to chose from, download some now for your little one to try.</p>

                <!-- Toggle Buttons Styled Like Games Page -->
                <div class="mb-4 d-flex justify-content-center flex-wrap gap-3">
                    <button class="btn btn-info px-4 py-2 fw-bold shadow-sm"
                    onclick="togglePrintables('diary')">📒 Food Diary</button>
                    <button class="btn btn-warning px-4 py-2 fw-bold shadow-sm"
                        onclick="togglePrintables('coloring')">🎨 Coloring Pages</button>
                    <button class="btn btn-success px-4 py-2 fw-bold shadow-sm"
                        onclick="togglePrintables('wordsearch')">🔍 Word Searches</button>
                </div>


                <!-- Food Diary Section -->
                <div id="foodDiaryCollapse" style="display: none;" class="row g-4 justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ asset('website/pdf/food_diary.pdf') }}" target="_blank" class="text-decoration-none">
                            <div class="coloring-card text-center p-4">
                                <img src="{{ asset('website/images/icons/food-diary.png') }}"
                                    alt="Food Diary"
                                    class="img-fluid coloring-icon rounded-icon mb-3" />
                                <h6 class="coloring-title">Food Diary</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Coloring Pages Section -->
                <div id="coloringCollapse" style="display: none;" class="row g-4 justify-content-center">
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

                <!-- Word Search Section -->
                <div id="wordSearchCollapse" style="display: none;" class="row g-4 justify-content-center">
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
        </section>


            <section id="advice-tips" class="about-section">
                <div class="auto-container">
                    <div class="card shadow-lg p-4" style="border-radius: 15px;">

                        <!-- Inner Background Layers (optional for effect) -->
                        <div class="layer-one"
                            style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }}); position: absolute; top: 0; left: 0; right: 0; height: 100%; opacity: 0.1; border-radius: 15px;"></div>
                        <div class="layer-two"
                            style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }}); position: absolute; top: 0; left: 0; right: 0; height: 100%; opacity: 0.1; border-radius: 15px;"></div>

                        <!-- Content -->
                        <div class="row clearfix align-items-stretch">
                            <!-- Advice Content -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12 d-flex">
                                <div class="card shadow-sm p-4 w-100">
                                    <div class="card-body advice-inner">
                                        <!-- Sec Title -->
                                        <div class="sec-title">
                                            <div class="title text-primary">ADVICE</div>
                                            <h2 class="fw-bold">How To Add Extra Nutrients Into My Child’s Dinner</h2>
                                        </div>
                                        <div class="text text-muted">
                                            <p>There is so much talk these days about what foods kids ‘shouldn’t’ eat, and that
                                                can be really overwhelming for families. In this series of blogs, I’m talking
                                                all about my favourite ways to ADD extra nutrients into your child’s meals – in
                                                this case, dinner! I find it’s much easier to think about ways we can add things
                                                in, rather than worrying about what we should take out.</p>

                                            <p>In our house, dinner can be quite chaotic, as it’s the end of the day and
                                                everyone is tired – and I’m usually running low on time and energy! That often
                                                means a ‘picky’ dinner – which are some of my favourite for getting in a good
                                                mix of food groups and nutrients. I am actually a big fan of dinner being a warm
                                                meal and it tends to be my largest of the day, so I will often serve the kids
                                                the same meal I’m having – even if just a smaller portion.</p>

                                            <ul class="list-unstyled mb-0">
                                                <li>🥦 Fruit and vegetables</li>
                                                <li>🌾 Wholegrains</li>
                                                <li>🍗 Protein/iron rich foods</li>
                                                <li>🧀 Dairy Foods</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12 d-flex align-items-stretch">
                                <div class="card shadow-sm w-100">
                                    <div class="image h-100">
                                        <img src="{{ URL::asset('website/images/resource/p2.webp') }}"
                                            alt=""
                                            class="img-fluid w-100 h-100"
                                            style="object-fit: cover; border-radius: 10px;" />
                                    </div>
                                </div>
                            </div>
                        </div>

            <!-- Additional Advice Text -->
            <div class="row clearfix mt-4">
                <h4 class="text-dark fw-bold">Add Extra Veggies!</h4>
                <p>Ideally, it’s good to include some vegetables in anything you’re creating for dinner. These can be added on the side, as a salad or included in the dish. For example, if you’re making spaghetti bolognaise, why not include some red pepper and mushrooms as well as a handful of spinach. You can buy these frozen and so they don’t need to cost a lot but they add fibre, vitamins and minerals as well as colour and texture into a dish. Root veggies, red peppers and foods such as sweet potato can also add sweetness which might help little ones to more readily accept new dishes too.</p>
                <p>Another thing I like to do is offer my kids a ‘starter.’ I do this whilst I’m preparing the main meal, and it’s always something super simple – e.g. a ‘salad’ with cucumber and tomatoes, or some mixed frozen veg (peas and sweetcorn go down well in our house) quickly steamed in the microwave. I’ll put this in the middle of the table for them to pick at whilst they wait. They don’t always go for it, but more often than not, they’re quite happy with this and it’s a great way to get in a few extra nutrients whilst they’ve got a bit more of an appetite!</p>
                <p>Additionally at dinner I always try to have at least one to two portions of veggies on the side of the meal – this helps them to have variety, visibly see and familiarise with veggies in their whole form, adds extra colour and texture to the dinner as well as adding extra nutrients such a fibre and vitamins and minerals.</p>
            </div>
        </div>
    </div>
</section>


          
         </div>
    </div>
</section>

    <!-- End Resources Section -->

        <!-- Healthy Eating Tips -->
        <section class="about-section py-5" style="background-color: #f0fdf7;">
            <div class="auto-container">
                <h2 class="text-success fw-bold mb-4 text-center">🥦 Healthy Eating Tips for Little Ones</h2>
                <div class="row">
                    <!-- Tips Column -->
                    <div class="col-lg-6">
                        <h4 class="text-primary fw-bold">⭐ Tried-and-True Tips</h4>
                        <ul class="text-start mt-3 list-unstyled">
                            <li>🍎 Keep fruits and veggies visible and within reach.</li>
                            <li>🥕 Let children pick a new veggie each week to try together.</li>
                            <li>🍽️ Eat together and be a veggie role model!</li>
                            <li>🎨 Make meals colorful and fun – let them decorate their plate.</li>
                            <li>🧑‍🍳 Get them involved in simple cooking tasks to boost interest.</li>
                        </ul>
                    </div>

                    <!-- Add Suggestion Column -->
                    <div class="col-lg-6">
                        <h4 class="text-primary fw-bold">💬 Add Your Own Tips</h4>
                        <form action="{{ route('submit.tip') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name (optional):</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="e.g. Jane Doe">
                            </div>
                            <div class="mb-3">
                                <label for="tip" class="form-label">Your Healthy Eating Tip:</label>
                                <textarea class="form-control" id="tip" name="tip" rows="4" placeholder="Share your tip..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success fw-bold px-4 py-2 shadow-sm">Submit Tip</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Display Submitted Tips -->
        <section class="py-5" style="background-color: #f9f9f9;">
            <div class="auto-container">
                <h2 class="text-success fw-bold mb-4">🌱 Community Healthy Tips</h2>
                <div class="row">
                    @foreach($tips as $tip)
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm p-3">
                                <p class="mb-2">{{ $tip->tip }}</p>
                                @if($tip->name)
                                    <small class="text-muted">— {{ $tip->name }}</small>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>



    <!-- Educational Videos -->

    <!-- <section class="py-5 bg-light">
        <div class="auto-container text-center">
            <h2 class="fw-bold text-info mb-4">🎥 Quick Educational Videos</h2>
            <p class="mb-4">Watch these short clips with your child to learn more about the power of healthy eating!</p>

            <div class="row justify-content-center">
                <div class="col-md-6 mb-4">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/00xZyFeUSf8"
                            title="Discover Healthy Vegetables" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
      
            </div>
        </div>
    </section> -->


    <!-- Parent Tips -->
<section class="py-5" style="background-color:#fff9eb;">
    <div class="auto-container text-center">
        <h2 class="fw-bold text-success mb-4">👨‍👩‍👧‍👦 Parent Tips & Stories</h2>
        <p>Here’s what other parents have shared about making healthy eating fun at home:</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Letting my kids help wash veggies made them excited to eat what they prepared!"</p>
                    <footer class="blockquote-footer">Emily, Mom of 2</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"We use a sticker chart for every veggie tried. It works wonders!"</p>
                    <footer class="blockquote-footer">James, Dad of 1</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Veggie taste tests are now our family’s weekend game!"</p>
                    <footer class="blockquote-footer">Priya, Mom of 3</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

            <!-- FAQs -->
            <section id="faqs" class="py-5 bg-white">
                <div class="auto-container">
                    <h2 class="text-success fw-bold text-center mb-4">❓ Frequently Asked Questions</h2>

                    <div class="accordion" id="faqAccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true">
                                    What if my child refuses to eat veggies?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Keep offering a variety without pressure! Try new ways like smoothies, dips, or fun shapes.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                    How much vegetables should my child eat?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Aim for 5 portions a day – a portion is about a handful for their age/size.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                    What if my child has food allergies?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Always check labels and consult with your healthcare provider for safe veggie choices.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                    What are good snacks for active kids?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Great snack options include fruit, yoghurt, vegetable sticks with hummus, cheese cubes, wholegrain crackers, or a small smoothie.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                                    My child is a picky eater. Should I be worried?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Picky eating is common in young children. Keep offering a variety of healthy foods without pressure, and avoid turning mealtimes into a battle. Most children grow out of it.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
                                    How can I make healthy meals more appealing?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Make food colourful and fun—use cookie cutters for sandwiches, create food faces or fun shapes, and serve a variety of textures. Involving your child in meal prep can also spark their interest.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


@endsection



@section('script')
    <script>
        function show(val) {
            $("#div1").hide();
            $("#div2").hide();
            $("#div3").hide();
            $("#" + val).show();
        }
    </script>

<script>
function togglePrintables(type) {
    const coloring = document.getElementById('coloringCollapse');
    const wordsearch = document.getElementById('wordSearchCollapse');
    const diary = document.getElementById('foodDiaryCollapse');

    // Hide all
    coloring.style.display = 'none';
    wordsearch.style.display = 'none';
    diary.style.display = 'none';

    // Show based on selection
    if (type === 'coloring') {
        coloring.style.display = 'flex';
    } else if (type === 'wordsearch') {
        wordsearch.style.display = 'flex';
    } else if (type === 'diary') {
        diary.style.display = 'flex';
    }
}

// Default to Coloring Pages on Load
document.addEventListener("DOMContentLoaded", () => {
    togglePrintables('diary');
});

</script>
@endsection
