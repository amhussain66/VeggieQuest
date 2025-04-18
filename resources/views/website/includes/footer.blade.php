<?php
$system = App\Models\Setting::first();
?>
        <!-- Main Footer -->
{{--<footer class="main-footer" style="background-image:url({{ URL::asset('website/images/background/5.png') }})">--}}
<footer class="main-footer mt-5" style="background-color: #d68135;color: white">
    <div class="auto-container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <a href="{{ route('/') }}"><img
                                src="{{ URL::asset('/admin/assets/uploads/'.$system->logo) }}"
                                alt="{{ $system->name }}"></a>
                </div>
                <p>
                    {{ $system->footer_description }}
                </p>
            </div>
            <div class="col-md-4">
                <h4 class="mt-5"><b>Quick Links</b></h4>
                <div class="row text-center justify-content-center mt-4">
                    <ul class="text-center justify-content-center">
                        <li><a style="color: white" href="{{ route('/') }}">Home</a></li>
                        <li><a style="color: white" href="{{ route('recipes') }}">Veggie Recipes</a></li>
                        <li><a style="color: white" href="{{ route('blogs') }}">Blogs</a></li>
                        <li><a style="color: white" href="{{ route('contactus') }}">Contact Us</a></li>
                        @if(Auth::guard('websiteuser')->check())
                            <li><a style="color: white" href="">Quiz History</a></li>
                            <li><a style="color: white" href="{{ route('user.wishlist') }}">Wishlist</a></li>
                            <li><a style="color: white" href="{{ route('user.profile') }}">Profile</a></li>

                            <li class="recipe mt-3"><a href="{{ route('user.userlogout') }}" style="background-color: #182b29;color: antiquewhite;padding: 10px;letter-spacing: 2px"><span class="icon fa fa-user"></span> Logout</a></li>
                        @else
                            <li><a style="color: white" href="{{ route('activities') }}">Games & Activities</a></li>
                            <li><a style="color: white" href="{{ route('user.quiz') }}}">Fun Challenges</a></li>
                            <li><a style="color: white" href="{{ route('resources') }}">Parents & Teachers</a></li>
{{--                            <li><a style="color: white" href="{{ route('login') }}">login</a></li>--}}
                            <li class="recipe mt-3"><a href="{{ route('login') }}" style="background-color: #182b29;color: antiquewhite;padding: 10px;letter-spacing: 2px"><span class="icon fa fa-user"></span> Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="mt-5"><b>BMI calculator</b></h4>
                <div class="row text-center justify-content-center mt-4">
                    <ul class="text-center justify-content-center">
                        <li><a style="color: white"
                               href="https://www.nhs.uk/health-assessment-tools/calculate-your-body-mass-index/calculate-bmi-for-adults">BMI
                                CalculatorFor Adults</a></li>
                        <li><a style="color: white"
                               href="https://www.nhs.uk/health-assessment-tools/calculate-your-body-mass-index/calculate-bmi-for-children-teenagers">BMI
                                CalculatorFor Children and Teenagers</a></li>
                    </ul>
                </div>
                <h4 class="mt-2"><b>Contact Details</b></h4>
                <div class="row text-center justify-content-center">
                    <ul class="text-center justify-content-center">
                        <li><a style="color: white" href="tel:{{ $system->phone }}">{{ $system->phone }}</a></li>
                        <li><a style="color: white" href="mailto:{{ $system->email }}">{{ $system->email }}</a></li>
                        <li><a style="color: white">{{ $system->location }}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright" style="color: white"><b>&copy; All Right Reserved <?php echo date('Y') ?></b></div>
    </div>
</footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

<script src="{{ URL::asset('website/js/jquery.js') }}"></script>
<script src="{{ URL::asset('website/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('website/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('website/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ URL::asset('website/js/jquery.fancybox.js') }}"></script>
<script src="{{ URL::asset('website/js/appear.js') }}"></script>
<script src="{{ URL::asset('website/js/owl.js') }}"></script>
<script src="{{ URL::asset('website/js/wow.js') }}"></script>
<script src="{{ URL::asset('website/js/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('website/js/script.js') }}"></script>

<script>

    function ShowLoader() {
        $('#MyLoader').show();
    }

    function HideLoader() {
        $('#MyLoader').hide();
    }

    $('.MyForm').submit(function () {
        // $('#MyLoader').show();
        $(".MyButton").attr("disabled", true);
        $(".MyButton").html('Please wait . . .  <i class="fa fa-spinner"></i>');
    });

</script>

</body>

</html>
