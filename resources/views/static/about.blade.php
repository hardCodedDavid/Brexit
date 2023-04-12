@extends('layouts.static')

@section('title', __('About'))

@section('content')

<div id="page_wrapper" class="bg-light">

        @include('components.header')

        <!--============== Page Banner Start ==============-->
        <div class="page-banner-simple bg-secondary py-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="banner-title text-white">About Us</h3>
                        <span class="banner-tagline font-medium text-white">We make strategies, design & development to create valuable products.</span>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Page Banner End ==============-->

        <!--============== Features Start ==============-->
        <div class="full-row pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-secondary mb-5">
                            <span class="tagline-2 text-primary">Who We Are</span>
                            <h2 class="text-secondary mb-4">We're empowering the world to build wealth through modern real estate investing.</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col border-start border-geay mb-5">
                                <div class="simple-thumb transation px-4">
                                    <p>Residential real estate has proven to be the best long term investment in modern history, providing returns in line with stocks, but with half the volatility. The problem is, the majority of people who want to invest in real estate aren't able to do it. Most people are prevented from participating due to the high initial investment needed for down-payments and the many operational requirements of managing a property.</p>
                                    <p>Our goal is to make real estate investing as simple as investing in stocks or crypto. Diversification is key to any investment strategy, but the barrier to entry for real estate investing has always been so high. We don't believe that should be the case.</p>
                                </div>
                            </div>
                            <div class="col border-start border-geay mb-5">
                                <div class="simple-thumb transation px-4">
                                    <p>We're on a mission to make property investing accessible to everyone with strong technical background and legal expertise.</p>
                                    <p>That's why we're building a new way to invest in real estate that makes it 10x easier for people to start diversifying today. With Vantage Horizon you can buy a fraction of a cash flowing rental properties starting for just $500.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Features End ==============-->

        <!--============== Banner Start ==============-->
        <div class="full-row paraxify" style="background-image: url({{ asset('static/assets/images/background/bg-4.png') }}); background-repeat: no-repeat; background-position: center center; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8">
                        <div class="text-white">
                            <span class="tagline text-primary">How We Work</span>
                            <h3 class="mb-4 text-white">We maximize returns through data-driven decision making, collaboration with local market experts, our powerful tools, and scaled efficiencies.</h3>
                            <p>We've built our operating strategy around acquiring high-quality properties in desirable neighborhoods and effectively operating them with the highest degree of care. We select investments across the country with great return profiles that offer stable cash dividends and superior appreciation potential. Our differentiated asset strategy and streamlined operating plan allows us to minimize costs through economies of scale and efficient processes. These two areas of focus allow us to deliver profits and peace of mind for our investors.</p>
                        </div>
                    </div>
                    <div class="row row-cols-lg-4 row-cols-sm-4 row-cols-1 g-3 align-items-center">
                        <div class="col">
                            <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary h-100">
                                <h6 class="d-block text-secondary">Data-Driven Decision Making</h5>
                                <p>Leveraging data and technology to make better decisions.</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary h-100">
                                <h6 class="d-block text-secondary">Advanced Tools with a Local Touch</h5>
                                <p>Combining advanced tools with local market expertise.</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary h-100">
                                <h6 class="d-block text-secondary">Scale & Efficiency</h5>
                                <p>Bringing scale and efficient operations to reduce costs and maximize returns.</p>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-xl-6 col-lg-8">
                    <div class="text-white">
                        <p>We've built our operating strategy around acquiring high-quality properties in desirable neighborhoods and effectively operating them with the highest degree of care. We select investments across the country with great return profiles that offer stable cash dividends and superior appreciation potential. Our differentiated asset strategy and streamlined operating plan allows us to minimize costs through economies of scale and efficient processes. These two areas of focus allow us to deliver profits and peace of mind for our investors.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Banner End ==============-->
        <br><br>
        <!--============== Approch Section Start ==============-->
        <div class="full-row pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="">
                            <span class="tagline-2 text-primary">Our Team</span>
                            <h2 class="text-secondary mb-4">We have an array of professionals who are dedicated to ensuring wealth is distributed</h2>
                            <a href="#" class="btn btn-secondary mt-3">Our Team <i class="fas fa-arrow-right-long me-1"></i></a>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row row-cols-lg-3 row-cols-1 g-4 agent-style-1">
                            <!-- Agent thumb -->
                            <div class="col">
                                <div class="entry-wrapper bg-white transation-this hover-shadow">
                                    <div class="entry-thumbnail-wrapper transation bg-secondary hover-img-zoom">
                                        <img src="{{ asset('static/assets/images/team/1.jpg') }}" alt="Agent Photo">
                                    </div>
                                    <div class="entry-content-wrapper">
                                        <div class="entry-header d-flex pb-2">
                                            <div class="me-auto">
                                                <h6 class="text-dark mb-0"><a href="#">Ryan Frazier</a></h6>
                                                <span class="text-primary font-fifteen">Co-founder & CEO</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Agent thumb -->
                            <div class="col">
                                <div class="entry-wrapper bg-white transation-this hover-shadow">
                                    <div class="entry-thumbnail-wrapper transation bg-secondary hover-img-zoom">
                                        <img src="{{ asset('static/assets/images/team/1.jpg') }}" alt="Agent Photo">
                                    </div>
                                    <div class="entry-content-wrapper">
                                        <div class="entry-header d-flex pb-2">
                                            <div class="me-auto">
                                                <h6 class="text-dark mb-0"><a href="#">Alejandro Chouza</a></h6>
                                                <span class="text-primary font-fifteen">Co-founder & COO</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Agent thumb -->
                            <div class="col">
                                <div class="entry-wrapper bg-white transation-this hover-shadow">
                                    <div class="entry-thumbnail-wrapper transation bg-secondary hover-img-zoom">
                                        <img src="{{ asset('static/assets/images/team/1.jpg') }}" alt="Agent Photo">
                                    </div>
                                    <div class="entry-content-wrapper">
                                        <div class="entry-header d-flex pb-2">
                                            <div class="me-auto">
                                                <h6 class="text-dark mb-0"><a href="#">Kenny Cason</a></h6>
                                                <span class="text-primary font-fifteen">Co-founder & CTO</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Agent thumb -->
                            <div class="col">
                                <div class="entry-wrapper bg-white transation-this hover-shadow">
                                    <div class="entry-thumbnail-wrapper transation bg-secondary hover-img-zoom">
                                        <img src="{{ asset('static/assets/images/team/1.jpg') }}" alt="Agent Photo">
                                    </div>
                                    <div class="entry-content-wrapper">
                                        <div class="entry-header d-flex pb-2">
                                            <div class="me-auto">
                                                <h6 class="text-dark mb-0"><a href="#">Joel Mezistrano</a></h6>
                                                <span class="text-primary font-fifteen">CFO</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Agent thumb -->
                            <div class="col">
                                <div class="entry-wrapper bg-white transation-this hover-shadow">
                                    <div class="entry-thumbnail-wrapper transation bg-secondary hover-img-zoom">
                                        <img src="{{ asset('static/assets/images/team/1.jpg') }}" alt="Agent Photo">
                                    </div>
                                    <div class="entry-content-wrapper">
                                        <div class="entry-header d-flex pb-2">
                                            <div class="me-auto">
                                                <h6 class="text-dark mb-0"><a href="#">Amanda LaRocca</a></h6>
                                                <span class="text-primary font-fifteen">Business Operations Manager</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Agent thumb -->
                            <div class="col">
                                <div class="entry-wrapper bg-white transation-this hover-shadow">
                                    <div class="entry-thumbnail-wrapper transation bg-secondary hover-img-zoom">
                                        <img src="{{ asset('static/assets/images/team/1.jpg') }}" alt="Agent Photo">
                                    </div>
                                    <div class="entry-content-wrapper">
                                        <div class="entry-header d-flex pb-2">
                                            <div class="me-auto">
                                                <h6 class="text-dark mb-0"><a href="#">Shirley Leung</a></h6>
                                                <span class="text-primary font-fifteen">Finance Director</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Approch Section End ==============-->
        <br><br>

        <!--============== Statistics Section Start ==============-->
        <div class="full-row pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-secondary mb-5">
                            <span class="tagline-2 text-primary">Statistics</span>
                            <h2 class="text-secondary mb-4">We are making impact</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="fact-counter">
                            <div class="row row-cols-md-3 row-cols-1">
                                <div class="col">
                                    <div class="mb-30 text-start count wow fadeIn" data-wow-duration="300ms">
                                        <span class="text-secondary h1">$</span><span class="count-num text-secondary h1" data-speed="3000" data-stop="65">200</span><span class="text-secondary h1">M+</span>
                                        <div class="text-secondary h5 py-2">Property Value Funded</div>
                                        <p>Thousands of Vantage Horizon investors are fully funding new single family rental properties and investing in building their long-term wealth.</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-30 text-start count wow fadeIn" data-wow-duration="300ms">
                                        <span class="text-secondary h1">$</span><span class="count-num text-secondary h1" data-speed="3000" data-stop="65">350</span><span class="text-secondary h1">M+</span>

                                        <div class="text-secondary h5 py-2">Company Funding</div>
                                        <p>Vantage Horizon is backed by a world class group of investors and partnered with top tier financial institutions that believe in our mission of democratizing real estate investing.</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-30 text-start count wow fadeIn" data-wow-duration="300ms">
                                        <span class="count-num text-secondary h1" data-speed="3000" data-stop="65">300</span><span class="text-secondary h1">+</span>
                                        <div class="text-secondary h5 py-2">Properties Funded</div>
                                        <p>All Vantage Horizon properties are hand-picked and individually analyzed by our investment team, ensuring that our investors choose from an exceptional selection of homes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="capability-avg">
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="pb-2 d-block text-start">UI/UX Design</span>
                                <div class="progress bg-general count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="80">80</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="80" aria-valuemax="100"> </div>
                                </div>
                            </div>
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="pb-2 d-block text-start">Java Development</span>
                                <div class="progress bg-general count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="51">51</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="51" aria-valuemax="100"> </div>
                                </div>
                            </div>
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="pb-2 d-block text-start">PHP Programming</span>
                                <div class="progress bg-general count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="95">95</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="95" aria-valuemax="100"> </div>
                                </div>
                            </div>
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="pb-2 d-block text-start">Mobile App</span>
                                <div class="progress bg-general count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="90">90</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="90" aria-valuemax="100"> </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--============== Statistics Section End ==============-->
        <br><br>

        <!--============== Agents Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="md-mb-30">
                            <span class="tagline-2 text-primary">Our Investors</span>
                            <h2 class="text-secondary mb-0">Where we come from</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row row-cols-md-4 row-cols-sm-2 row-cols-2 g-4 ">
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-1.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-2.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-3.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-4.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-5.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-9.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-8.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-7.1.png') }}" alt="creative template">
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                    <img src="{{ asset('static/assets/images/partner/client-6.png') }}" alt="creative template">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Agents End ==============-->
        <br><br>

        <!--============== Testimonials Start ==============-->
        <div class="full-row bg-white" style="background-image: url({{ asset('static/assets/images/background/oh_bg-min.png') }}); background-size: 100%">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto position-relative">
                        <span class="tagline text-primary">Testimonial</span>
                        <h2 class="mb-5"><span class="font-weight-bold">What People</span> Says About Us</h2>
                        <div class="owl-carousel single-carusel testimonial-slider dot-disable position-static">
                            <div class="testimonial-item font-medium">
                                <span class="flaticon-right-quote quote-icon flat-medium text-primary"></span>
                                <p>Hendrerit dapibus natoque class taciti, egestas orci dis dictumst duis platea penatibus. Pretium fusce. Nullam. Dui nec purus nam. Aenean quam nulla mauris primis mi blandit turpis nulla. Blandit suscipit eleifend dignissim
                                    ac faucibus. Ad primis nisl scelerisque rutrum. Fusce, sapien interdum inceptos, amet maecenas augue platea Tincidunt magnis nostra, sit imperdiet porttitor consectetuer.</p>
                                <span class="name text-secondary h6 font-weight-medium mt-4 d-table">Gilbert E. Lyons, CEO Unicoder</span>
                            </div>
                            <div class="testimonial-item font-medium">
                                <span class="flaticon-right-quote quote-icon flat-medium text-primary"></span>
                                <p>Hendrerit dapibus natoque class taciti, egestas orci dis dictumst duis platea penatibus. Pretium fusce. Nullam. Dui nec purus nam. Aenean quam nulla mauris primis mi blandit turpis nulla. Blandit suscipit eleifend dignissim
                                    ac faucibus. Ad primis nisl scelerisque rutrum. Fusce, sapien interdum inceptos, amet maecenas augue platea Tincidunt magnis nostra, sit imperdiet porttitor consectetuer.</p>
                                <span class="name text-secondary h6 font-weight-medium mt-4 d-table">Gilbert E. Lyons, CEO Unicoder</span>
                            </div>
                            <div class="testimonial-item font-medium">
                                <span class="flaticon-right-quote quote-icon flat-medium text-primary"></span>
                                <p>Hendrerit dapibus natoque class taciti, egestas orci dis dictumst duis platea penatibus. Pretium fusce. Nullam. Dui nec purus nam. Aenean quam nulla mauris primis mi blandit turpis nulla. Blandit suscipit eleifend dignissim
                                    ac faucibus. Ad primis nisl scelerisque rutrum. Fusce, sapien interdum inceptos, amet maecenas augue platea Tincidunt magnis nostra, sit imperdiet porttitor consectetuer.</p>
                                <span class="name text-secondary h6 font-weight-medium mt-4 d-table">Gilbert E. Lyons, CEO Unicoder</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Testimonials End ==============-->

        <!--============== Footer Section Start ==============-->
        <footer class="full-row p-0 text-dark footer-two">
            <div class="full-row">
                <div class="container">
                    <div class="row">
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
        </footer>

</div>

@endsection
