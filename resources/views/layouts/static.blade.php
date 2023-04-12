<!doctype html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vintage Horizon">
    <meta name="keywords" content="real estate, property, property search, property search, property broker, booking, business, idx, housing, real estate agency, rental">
    <meta name="author" content="unicoder">
    <title>Vintage Horizon | @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('static/assets/images/favicon.ico') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Required style of the theme -->
    <link rel="stylesheet" href="{{ asset('static/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/webfonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/layerslider.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/colors/color.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/loader.css') }}">
</head>

<body>

    <div class="preloader">
	    <div class="loader clock xy-center"></div>
	</div>

    @yield('content')

    <!--============== Footer Section Start ==============-->
    <footer class="full-row footer-default-dark bg-footer" style="padding-bottom: 30px">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                <div class="col">
                    <div class="footer-widget mb-4">
                        <div class="footer-logo mb-4">
                            <a href="#"><img src="assets/images/logo/logo-full-white.png" alt="Image not found!" /></a>
                        </div>
                        <p>Risus commodo congue augue phas ellus morbi hymenaeos ante tincidu eu orci dictum bibe ndum lacus pla tea primis mi lacinia</p>
                    </div>
                    <div class="footer-widget media-widget mb-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget contact-widget mb-4">
                        <h3 class="widget-title mb-4">Contact Info</h3>
                        <ul>
                            <li>Unicoder Design Agency 301 The Greenhouse, Custard Factory, London, E3 8DY.</li>
                            <li>+1 246-345-0695</li>
                            <li>helpline@homex.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget footer-nav mb-4">
                        <h3 class="widget-title mb-4">Quick Links</h3>
                        <ul>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Investment Solution</a></li>
                            <li><a href="#">Frequenly Ask Question</a></li>
                            <li><a href="#">How It Work</a></li>
                            <li><a href="#">Become a Member</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget newslatter-widget mb-4">
                        <h4 class="widget-title mb-4">Appointment</h4>
                        <p>Litora ligula dapibus scelerisque vitae, fermentum aenean gravida lobortis mus pulvinar magna turient primis.</p>
                        <a href="#" class="btn btn-primary w-100">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--============== Footer Section End ==============-->

    <!--============== Copyright Section Start ==============-->
    <div class="copyright bg-footer text-default py-4">
        <div class="container">
            <div class="row row-cols-md-2 row-cols-1">
                <div class="col">
                    <span class="text-white">© 2022 Uniland All right reserved</span>
                </div>
                <div class="col">
                    <ul class="line-menu float-end list-color-gray">
                        <li><a href="#">Privacy & Policy </a></li>
                        <li>|</li>
                        <li><a href="#">Site Map</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--============== Copyright Section End ==============-->

    <!-- Scroll to top -->
    <a href="#" class="text-general scroll-top-vertical xs-mx-none" id="scroll">Scroll to top</a>
    <!-- End Scroll To top -->

    <!-- Javascript Files -->
    <script src="{{ asset('static/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/owl.js') }}"></script>
    <script src="{{ asset('static/assets/js/wow.js') }}"></script>
    <script src="{{ asset('static/assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/paraxify.js') }}"></script>
    <script src="{{ asset('static/assets/js/custom.js') }}"></script>
</body>

</html>