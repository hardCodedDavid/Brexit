@extends('layouts.static')

@section('title', __('Learning Centre'))

@section('content')

<div id="page_wrapper" class="bg-light">

        @include('components.header')

       <!--============== Page title Start ==============-->
        <div class="full-row py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-secondary">Blog List</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 bg-transparent p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="blog-grid-v1.html">Blog</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Blog List View</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Page title End ==============-->

        <!--============== Blog Area Start ==============-->
        <div class="full-row pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 order-xl-2">
                        <div class="blog-sidebar widget-box-model">
                            <!-- Search Field -->
                            <div class="widget widget_search">
                                <form role="search" method="get" class="search_form" action="http://localhost/axeman-wp/">
                                    <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                                </label>
                                    <input type="submit" class="search-submit" value="Search">
                                </form>
                            </div>
                            <!-- Category Field -->
                            <div class="widget widget_categories">
                                <h5 class="widget-title mb-3">Categories</h5>
                                <ul>
                                    <li class="cat-item cat-item-3"><a href="#">Apartment</a> (23)</li>
                                    <li class="cat-item cat-item-2"><a href="#">Condo</a> (10)</li>
                                    <li class="cat-item cat-item-2"><a href="#">Family House</a> (09)</li>
                                    <li class="cat-item cat-item-2"><a href="#">Modern Villa</a> (35)</li>
                                    <li class="cat-item cat-item-2"><a href="#">Town House</a> (05)</li>
                                </ul>
                            </div>
                            <!-- Recent Post -->
                            <div class="widget widget_recent_entries">
                                <h5 class="widget-title mb-3">Recent Post</h5>
                                <ul>
                                    <li>
                                        <a href="#">Habitasse felis magna velit posuere ridiculus curabitur</a>
                                        <span class="post-date">Oct 05, 2019</span>
                                    </li>
                                    <li>
                                        <a href="#">Elit auctor primis ac ullamcorper libero. Felis erat auctor</a>
                                        <span class="post-date">Sep 25, 2019</span>
                                    </li>
                                    <li>
                                        <a href="#">Tempus interdum justo aliquet id vulputate fringilla</a>
                                        <span class="post-date">Sep 10, 2019</span>
                                    </li>
                                    <li>
                                        <a href="#">Porttitor primis vel libero consectetuer eleifend feugiat</a>
                                        <span class="post-date">Aug 30, 2019</span>
                                    </li>
                                    <li>
                                        <a href="#">Conubia habitant vivamus nonummy per curabitur laoreet</a>
                                        <span class="post-date">July 18, 2019</span>
                                    </li>
                                </ul>
                            </div>

                            <!--============== Recent Property Widget Start ==============-->
                            <div class="widget widget_recent_property">
                                <h5 class="text-secondary mb-4">Recent Property</h5>
                                <ul>
                                    <li>
                                        <img src="assets/images/thumbnaillist/01.jpg" alt="">
                                        <div class="thumb-body">
                                            <h6 class="listing-title"><a href="property-single-1.html">Nirala Appartment</a></h6>
                                            <span class="listing-price">$3200<small>( Monthly )</small></span>
                                            <ul class="d-flex quantity font-fifteen">
                                                <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>6500 Sqft</li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="assets/images/thumbnaillist/02.jpg" alt="">
                                        <div class="thumb-body">
                                            <h6 class="listing-title"><a href="property-single-1.html">Condo House</a></h6>
                                            <span class="listing-price">$11500<small>( Monthly )</small></span>
                                            <ul class="d-flex quantity font-fifteen">
                                                <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>2200 Sqft</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="assets/images/thumbnaillist/03.jpg" alt="">
                                        <div class="thumb-body">
                                            <h6 class="listing-title"><a href="property-single-1.html">Luxury Condos</a></h6>
                                            <span class="listing-price">$17000<small>( Monthly )</small></span>
                                            <ul class="d-flex quantity font-fifteen">
                                                <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>3500 Sqft</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="assets/images/thumbnaillist/04.jpg" alt="">
                                        <div class="thumb-body">
                                            <h6 class="listing-title"><a href="property-single-1.html">Small Appartment</a></h6>
                                            <span class="listing-price">$5200<small>( Monthly )</small></span>
                                            <ul class="d-flex quantity font-fifteen">
                                                <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tags -->
                            <div class="widget widget_tag_cloud">
                                <h5 class="widget-title mb-3">Tags</h5>
                                <div class="tagcloud">
                                    <ul>
                                        <li><a href="#">general</a></li>
                                        <li><a href="#">videos</a></li>
                                        <li><a href="#">media</a></li>
                                        <li><a href="#">web</a></li>
                                        <li><a href="#">parallax</a></li>
                                        <li><a href="#">ecommerce</a></li>
                                        <li><a href="#">t-shirt</a></li>
                                        <li><a href="#">women</a></li>
                                        <li><a href="#">trade</a></li>
                                        <li><a href="#">animation</a></li>
                                        <li><a href="#">theme</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1 sm-mb-30">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-1.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Interior Design</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">What do you thinking about house for your family living.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-2.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Architecture</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">Amazing Arachitecture Condo Including Swiming Pool.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-3.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Village Home</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">We Construction Village Home for the People Who Love Villa.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-4.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Appartment</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">How to Architect and Design Our Special Appartment.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-5.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Village Home</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">What do you thinking about house for your family living.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-6.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Luxury Condo</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">What do you thinking about house for your family living.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-7.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Luxury Condo</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">What do you thinking about house for your family living.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-8.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Architecture</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">What do you thinking about house for your family living.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-1.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Interior</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">What do you thinking about house for your family living.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
                                    <div class="post-image overflow-hidden">
                                        <img src="assets/images/property_grid/property-grid-2.png" alt="Image not found!">
                                    </div>
                                    <div class="post-content ps-3">
                                        <div class="post-meta font-mini text-uppercase list-color-light">
                                            <a href="#"><span>Luxury Villa</span></a>
                                        </div>
                                        <h5 class="mb-2">
                                            <a href="#" class="transation text-dark hover-text-primary d-block">What do you thinking about house for your family living.</a>
                                        </h5>
                                        <p>Non id praesent rhoncus litora mauris vivamus vivamus eleifend ante consectetuer mollis sociis.</p>
                                        <div class="post-meta font-general">
                                            <a href="#"><span>By Robert Haven</span></a>
                                            <a href="#"><span>Dec 25, 2019</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-5">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-dotted-active justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous Page</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next Page</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Blog Area End ==============-->

        <!--============== Footer Section Start ==============-->
        <footer class="full-row p-0 text-dark footer-two">
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer-widget mb-5">
                                <h3 class="widget-title mb-4 font-400">Over 10000 Customers Already Connected</h3>
                                <p>Libero consectetuer fames montes habitasse lorem hendrerit dictumst sit blandit. Commodo justo. Blandit lobortis metus et. Dignissim netus netus convallis hendrerit. Molestie penatibus litora cubilia etiam.</p>
                                <div class="footer-widget media-widget mt-5">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row row-cols-sm-3 row-cols-1">
                                <div class="col">
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">Learn More</h4>
                                        <ul>
                                            <li><a href="#">Privacy statement</a></li>
                                            <li><a href="#">Modern slavery statement</a></li>
                                            <li><a href="#">Perrys past & present</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">About Special Service</h4>
                                        <ul>
                                            <li><a href="#">Power Steering</a></li>
                                            <li><a href="#">Engine Overhaul</a></li>
                                            <li><a href="#">Tyre Balancing</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">Invest</h4>
                                        <ul>
                                            <li><a href="properties.html">Properties</a></li>
                                            <li><a href="#">Download app</a></li>
                                            <li><a href="#">Careers</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">Learn</h4>
                                        <ul>
                                            <li><a href="how-it-works.html">How it Works</a></li>
                                            <li><a href="help-faq.html">Help & FAQ</a></li>
                                            <li><a href="learning-centre.html">Learning Centre</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="footer-widget footer-nav mb-5">
                                        <h4 class="widget-title mb-4">About</h4>
                                        <ul>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="vacation-rentals.html">Vacation Rentals</a></li>
                                            <li><a href="web-3-properties.html">Web3 Properties</a></li>
                                            <li><a href="historical-performance.html">Historical Performance</a></li>
                                            <li><a href="stakeholder-commitments.html">Stakeholder Commitments</a></li>
                                            <li><a href="sell-your-home.html">Sell Your Home</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="copyright-border text-secondary">
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
            <div class="copyright-border text-secondary">
                <div class="container py-4">
                    <div class="row row-cols-lg-2 row-cols-1">
                        <div class="col">
                            <span>Copyright © 2023 Vintage Horizon All right reserved</span>
                        </div>
                        <div class="col">
                            <ul class="line-menu float-lg-end list-color-secondary">
                                <li><a href="terms-and-condition.html">Terms and Condition</a></li>
                                <li>|</li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li>|</li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--============== Copyright Section End ==============-->
        </footer>

        <!-- Scroll to top -->
        <div class="scroll-top-vertical xs-mx-none" id="scroll">Go Top <i class="ms-2 fa-solid fa-arrow-right-long"></i></div>
        <!-- End Scroll To top -->
        <!--============== Footer Section End ==============-->

        <!-- Scroll to top -->
        <div class="scroll-top-vertical xs-mx-none" id="scroll">Go Top <i class="ms-2 fa-solid fa-arrow-right-long"></i></div>
        <!-- End Scroll To top -->

    </div>

@endsection