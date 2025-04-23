@extends('website.includes.master')

@section('title')
    Resources
@endsection

@section('content')

    <!-- Page Title -->
    <!-- 🌟 Hero Section -->
    <section class="page-title py-5 text-center" style="background-image:url({{ URL::asset('website/images/background/12.png') }}); background-size: cover; background-position: center;">
        <div class="auto-container">
            <h1 class="display-4 text-white fw-bold">Resources for Parents & Teachers</h1>
            <p class="lead text-white mt-3">Helpful tools, tips, and fun activities to support your child’s healthy eating journey!</p>
        </div>
    </section>


    <!-- 🔗 Quick Access Resources -->
    <section class="py-5 bg-light">
        <div class="auto-container text-center">
            <h2 class="fw-bold text-success mb-4">Find the right section for you</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-4">
                    <a href="#meal-tips" class="card shadow h-100 p-4 text-decoration-none">
                        <h4 class="text-success">🍽️ Meal Planning Tips</h4>
                        <p class="text-muted">Easy ways to organize your family's meals.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#printables" class="card shadow h-100 p-4 text-decoration-none">
                        <h4 class="text-success">🖨️ Printable Activities</h4>
                        <p class="text-muted">Fun coloring pages, word searches & more.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#faqs" class="card shadow h-100 p-4 text-decoration-none">
                        <h4 class="text-success">❓ FAQs & Advice</h4>
                        <p class="text-muted">Answers to your top questions on healthy eating.</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Resources Section -->
    <section class="video-section"
             style="background-image: url({{ URL::asset('website/images/background/1.png') }});padding-top: 0px">
        <div class="auto-container">

            <div class="row text-center justify-content-center">
                <h1 class="mb-3">
                    <b>
                        Ready to get your to-do list <br> under control?
                    </b>
                </h1>
            </div>

            
            <section class="about-section">
                <div class="layer-one"
                     style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
                <div class="layer-two"
                     style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ URL::asset('website/images/resource/p1.png') }}"
                                         alt=""/>
                                </div>
                            </div>
                        </div>

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <!-- Sec Title -->
                                <div class="sec-title">
                                    <div class="title">Meal planning tips</div>
                                    <h2>MEAL PLANNING TIPS</h2>
                                </div>
                                <div class="text">
                                    <p>Sunday AM - While drinking coffee at the breakfast table with the kids, I
                                        reference our meal index and choose 5 dinners for the week. I put those dinners
                                        in a OneNote template that my husband created.</p>

                                    <p>Sunday AM - I reference recipes and add ingredients to the same OneNote template.
                                        I also add anything else we need for breakfasts, lunches, or snacks, checking
                                        the fridge and pantry as I go.</p>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row clearfix">
                        <p>Sunday AM - My husband goes grocery shopping using the OneNote template that syncs to his
                            phone.</p>

                        <p> Sunday PM - I make our Monday dinner in advance because Mondays are bonkers!</p>

                        <p>Sunday PM - My husband usually cooks a new recipe or one that takes longer since we have more
                            time on Sunday as compared to a weeknight.</p>

                        <p>Monday - We eat the pre-made dinner in shifts between dance and piano</p>

                        <p>Tuesday - Tacos, enchiladas, or some variation (meal chosen on Sunday)</p>

                        <p>Wednesday - Some sort of chicken dish usually (meal chosen on Sunday)</p>

                        <p>Thursday - Some sort of pasta dish usually (meal chosen on Sunday)</p>

                        <p>Friday - Pizza and movie night (alternate homemade and take-out)</p>

                        <p>Saturday - Out to eat or leftovers</p>

                        <p>I want to highlight why this routine works so well and doesn't take a ton of time so that you
                            can see the process behind creating an effective and easy routine.</p>
                    </div>

                </div>
            </section>

            <div class="row">

                <!-- Column -->
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <div class="card shadow p-3">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="https://www.nhs.uk/health-assessment-tools/calculate-your-body-mass-index/calculate-bmi-for-adults">
                                <h2>BMI calculator <br> <b>For Adults</b> <br> <i class="fa fa-arrow-circle-right"></i>
                                </h2>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="column col-lg-6 col-md-6 col-sm-12">
                    <div class="card shadow p-3">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="https://www.nhs.uk/health-assessment-tools/calculate-your-body-mass-index/calculate-bmi-for-children-teenagers">
                                <h2>BMI calculator <br> <b>Children and Teenagers</b> <br> <i
                                            class="fa fa-arrow-circle-right"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="column col-lg-12 col-md-12 col-sm-12 text-center mt-4">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f" href="https://mondaymandala.com/vegetable-coloring-pages/">
                                <h2>Printable Pfd <b>(colouring pages)</b> <i class="fa fa-arrow-circle-right"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <section class="about-section">
                <div class="layer-one"
                     style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
                <div class="layer-two"
                     style="background-image: url({{ URL::asset('website/images/resource/category-pattern-1.png') }})"></div>
                <div class="auto-container">
                    <div class="row clearfix">

                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <!-- Sec Title -->
                                <div class="sec-title">
                                    <div class="title">ADVICE</div>
                                    <h2>How To Add Extra Nutrients Into My Child’s Dinner</h2>
                                </div>
                                <div class="text">
                                    <p>
                                        There is so much talk these days about what foods kids ‘shouldn’t’ eat, and that
                                        can be really overwhelming for families. In this series of blogs, I’m talking
                                        all about my favourite ways to ADD extra nutrients into your child’s meals – in
                                        this case, dinner! I find it’s much easier to think about ways we can add things
                                        in, rather than worrying about what we should take out.
                                    </p>

                                    <p>
                                        In our house, dinner can be quite chaotic, as it’s the end of the day and
                                        everyone is tired – and I’m usually running low on time and energy! That often
                                        means a ‘picky’ dinner – which are some of my favourite for getting in a good
                                        mix of food groups and nutrients. I am actually a big fan of dinner being a warm
                                        meal and it tends to be my largest of the day, so I will often serve the kids
                                        the same meal I’m having – even if just a smaller portion.
                                    </p>

                                    <p class="mb-0">Fruit and vegetables</p>
                                    <p class="mb-0">Wholegrains</p>
                                    <p class="mb-0">Protein/iron rich foods</p>
                                    <p class="mb-0">Dairy Foods</p>

                                </div>
                            </div>
                        </div>

                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ URL::asset('website/images/resource/p2.webp') }}"
                                         alt=""/>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row clearfix mt-4">
                        <h4 class="text-dark"><b>Add Extra Veggies!</b></h4>
                        <p>Ideally, it’s good to include some vegetables in anything you’re creating for dinner. These can be added on the side, as a salad or included in the dish. For example, if you’re making spaghetti bolognaise, why not include some red pepper and mushrooms as well as a handful of spinach. You can buy these frozen and so they don’t need to cost a lot but they add fibre, vitamins and minerals as well as colour and texture into a dish. Root veggies, red peppers and foods such as sweet potato can also add sweetness which might help little ones to more readily accept new dishes too.</p>
                        <p>Another thing I like to do is offer my kids a ‘starter.’ I do this whilst I’m preparing the main meal, and it’s always something super simple – e.g. a ‘salad’ with cucumber and tomatoes, or some mixed frozen veg (peas and sweetcorn go down well in our house) quickly steamed in the microwave. I’ll put this in the middle of the table for them to pick at whilst they wait. They don’t always go for it, but more often than not, they’re quite happy with this and it’s a great way to get in a few extra nutrients whilst they’ve got a bit more of an appetite! </p>
                        <p>Additionally at dinner I always try to have at least one to two portions of veggies on the side of the meal – this helps them to have variety, visibly see and familiarise with veggies in their whole form, adds extra colour and texture to the dinner as well as adding extra nutrients such a fibre and vitamins and minerals.</p>
                    </div>

                </div>
            </section>

            <div class="row">
                <div class="col-md-12 text-center justify-content-center">
                    <div class="card shadow p-3" style="background-color: #D68135">
                        <div class="card-body">
                            <h2 style="color: white"><b>
                                    “These are printable resources to help you <br> on your journey”
                                </b></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3" style="cursor: pointer" onclick="show('div1')">
                    <div class="card shadow p-3">
                        <div class="card-body text-center">
                            <h2>Food Diary</h2>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3" style="cursor: pointer" onclick="show('div2')">
                    <div class="card shadow p-3">
                        <div class="card-body text-center">
                            <h2>Colouring Pages</h2>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3" style="cursor: pointer" onclick="show('div3')">
                    <div class="card shadow p-3">
                        <div class="card-body text-center">
                            <h2>Word Search</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div id="div1" style="display: none" class="row">
                <div class="col-lg-12 text-center">
                    <h1><b>Food Diary</b></h1>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow p-3">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f" href="{{ URL::asset('website/pdf/food_diary.pdf') }}" download="">
                                <h2>Food Diary <i class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="div2" style="display: none" class="row">

                <div class="col-lg-12 text-center">
                    <h1><b>Colouring Pages</b></h1>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Broccoli-Coloring-Page-For-Preschoolers.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Simple-Outline-Of-Common-Vegetables-For-Preschoolers</p>
                                    <i class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Brown-Onions-Coloring-Page.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Vine-Tomatoes-Coloring-Page</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Carrots-Coloring-Page-For-Kids.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Broccoli-Coloring-Page-For-Preschoolers</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Coloring-Page-Of-Corn-On-The-Cob.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Coloring-Page-Of-Corn-On-The-Cob</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Mushrooms-Coloring-Sheet.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Mushrooms-Coloring-Sheet</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Outline-Of-Popular-Vegetables.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Outline-Of-Popular-Vegetables</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Simple-Outline-Of-Common-Vegetables-For-Preschoolers.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Brown-Onions-Coloring-Page</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Vegetables-Coloring-Pages.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Carrots-Coloring-Page-For-Kids</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/colouring_pages/Vine-Tomatoes-Coloring-Page.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">Vegetables-Coloring-Pages</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div id="div3" style="display: none" class="row">
                <div class="col-lg-12 text-center">
                    <h1><b>Word Search</b></h1>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/word_search/ADA_BTSWordsearch.pdf') }}" download="">
                                <h2><p style="font-size: 14px">ADA_BTSWordsearch</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/word_search/healthy_eating_word_search.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">healthy_eating_word_search</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">
                            <a style="color: #ff7d5f"
                               href="{{ URL::asset('website/pdf/word_search/superfoods-word-search.pdf') }}"
                               download="">
                                <h2><p style="font-size: 14px">superfoods-word-search</p> <i
                                            class="fa fa-arrow-circle-down"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Resources Section -->

    <!-- Healthy Eating Tips -->
    <section class="about-section py-5" style="background-color: #f0fdf7;">
        <div class="auto-container">
            <h2 class="text-success fw-bold mb-4">🥦 Healthy Eating Tips for Little Ones</h2>
            <p>Encouraging kids to eat healthy can be fun and rewarding! Here are some tried-and-true tips:</p>
            <ul class="text-start mt-3">
                <li>🍎 Keep fruits and veggies visible and within reach.</li>
                <li>🥕 Let children pick a new veggie each week to try together.</li>
                <li>🍽️ Eat together and be a veggie role model!</li>
                <li>🎨 Make meals colorful and fun – let them decorate their plate.</li>
                <li>🧑‍🍳 Get them involved in simple cooking tasks to boost interest.</li>
            </ul>
        </div>
    </section>

    <!-- Educational Videos -->
    <section class="py-5 bg-light">
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
                <!-- Add more if needed -->
            </div>
        </div>
    </section>
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
<section class="py-5 bg-white">
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
@endsection
