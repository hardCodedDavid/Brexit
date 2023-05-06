<!doctype html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vantage Horizon">
    <meta name="keywords" content="real estate, property, property search, property search, property broker, booking, business, idx, housing, real estate agency, rental">
    <meta name="author" content="unicoder">
    <title>Vantage Horizon | @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('static/assets/images/favicon.ico') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
        <footer class="full-row p-0 text-dark footer-two">
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="row row-cols-sm-3 row-cols-1">
                                <div class="col">
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">About</h4>
                                        <ul>
                                            <li><a href="{{ route('about') }}">About Us</a></li>
                                            <li><a href="{{ route('vacation') }}">Vacation Rentals</a></li>
                                            <li><a href="{{ route('web') }}">Web3 Properties</a></li>
                                            <li><a href="{{ route('historical') }}">Historical Performance</a></li>
                                            <li><a href="{{ route('stakeholder') }}">Stakeholder Commitments</a></li>
                                            <li><a href="{{ route('learning') }}">Learning Centre</a></li>
                                            <li><a href="{{ route('sellHome') }}">Sell Your Home</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">Invest</h4>
                                        <ul>
                                            <li><a href="{{ route('listProperty') }}">Properties</a></li>
                                            {{-- <li><a href="#">Download app</a></li>
                                            <li><a href="#">Careers</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">Learn</h4>
                                        <ul>
                                            <li><a href="{{ route('how-it-works') }}">How it Works</a></li>
                                            <li><a href="{{ route('faq') }}">Help & FAQ</a></li>
                                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="text-light font-200">Vantage Horizon, Inc. ("Vantage Horizon") operates the VantageHorizon.com All securities related activity is conducted through RERA  Group LLC (“RERA”), a registered broker-dealer and member of FINRA/SIPC, located at 525 Green Place, Woodmere, NY 11598.<br>
                        You should speak with your financial advisor, accountant and/or attorney when evaluating any offering. Neither Vantage Horizon nor RERA makes any recommendations or provides advice about investments, and no communication, through this Site or in any other medium, should be construed as a recommendation for any security offered on or off this Site.<br>
                        Vantage Horizon is conducting public offerings pursuant to Regulation A, as amended, through the Site. Past performance is no guarantee of future results. Investments such as those on the Vantage Horizon platform are speculative and involve substantial risks to consider before investing, outlined in the respective offering materials and including, but not limited to, illiquidity, lack of diversification and complete loss of capital. Key risks include, but are not limited to, limited operating history, limited diversification, risk of asset damage or theft and lack of voting rights. Also, the adverse economic effects of the COVID-19 pandemic are unknown and could materially impact this investment. An investment in an offering constitutes only an investment in a particular series and not in Vantage Horizon or the underlying asset(s). Investors should carefully review the risks located in the respective offering materials for a more comprehensive discussion of risk.<br>
                        From time to time, Vantage Horizon will seek to qualify additional series offerings of securities under regulation A. For offerings that have not yet been qualified, no money or other consideration is being solicited and, if sent in response, will not be accepted. No offer to buy securities of a particular offering can be accepted, and no part of the purchase price can be received, until an offering statement filed with the Securities and Exchange Commission (the "SEC") relating to that series has been qualified by the SEC. Any such offer may be withdrawn or revoked, without obligation or commitment of any kind, at any time before notice of acceptance given after the date of qualification by the SEC. An indication of interest involves no obligation or commitment of any kind.<br>
                        Investment overviews contained herein contain summaries of the purpose and the principal business terms of the investment opportunities. Such summaries are intended for informational purposes only and do not purport to be complete, and each is qualified in its entirety by reference to the more-detailed discussions contained in the respective offering circular filed with the SEC.
                        </span>
                        <span class="text-light font-200">The Site may make forward-looking statements. Potential investors should not rely on any forward-looking statements regarding any investment opportunity, which is based on our beliefs and information currently available to us. The words “anticipate,” “believe,” “expect,” “aim,” “potential,” “design,” “target,” “intend,” “may,” “might,” “plan,” “estimate,” “project,” “projection,” “should,” “will,” “would,” “result” and similar expressions identify forward-looking statements. Such statements are subject to risks, uncertainties, and assumptions and are not guarantees of future performance, which may be affected by known and unknown risks, trends, uncertainties, and factors that are beyond our control. These risks could result in the loss of your investment.</span>
                        <span class="text-light font-200">See the offering materials for detailed information.<br>
                        Vantage Horizon does not offer refunds after an investment has been made. Please review the relevant offering materials and subscription documentation for more information.<br>
                        An active trading market for any series of Vantage Horizon interests may not develop or be sustained. If an active public trading market for Vantage Horizon series interests does not develop or is not sustained, it may be difficult or impossible for you to resell your interests at any price. Even if an active market does develop, the market price could decline below the amount you paid for your interests. There is no assurance that the Vantage Horizon platform will provide an active market for resales of Vantage Horizon series interests. Further, without the Vantage Horizon platform, it may be difficult or impossible for you to dispose of your interests. If the market develops for any series of Vantage Horizon interests, the market price of such interests could fluctuate significantly for many reasons, including reasons unrelated to performance, the underlying assets or any series, such as reports by industry analysts, investor perceptions or announcements by competitors regarding their own performance, as well as general economic and industry conditions.
                        </span>
                    </div>
                </div>
            </div>

            <!--============== Copyright Section Start ==============-->
            {{-- <div class="copyright-border text-secondary">
                <div class="container py-4">
                    <div class="row row-cols-lg-2 row-cols-1">
                        <div class="col">
                            <span>Copyright © 2022 Vantage Horizon All right reserved</span>
                        </div>
                        <div class="col">
                            <ul class="line-menu float-lg-end list-color-secondary">
                                <li><a href="+15187038716">+15187038716</a></li>
                                <li>|</li>
                                <li><a href="mail:support@vantagehorizon.com">support@vantagehorizon.com</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--============== Copyright Section End ==============-->
        </footer>

        <!-- Scroll to top -->
        <div class="scroll-top-vertical xs-mx-none" id="scroll">Go Top <i class="ms-2 fa-solid fa-arrow-right-long"></i></div>
        <!-- End Scroll To top -->
        <!--============== Footer Section End ==============-->

        <!-- Scroll to top -->
        <div class="scroll-top-vertical xs-mx-none" id="scroll">Go Top <i class="ms-2 fa-solid fa-arrow-right-long"></i></div>
        <!-- End Scroll To top -->

    <!-- Javascript Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

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