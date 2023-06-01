@extends('layouts.static')

@section('title', __('How it works'))

@section('content')



<div id="page_wrapper" class="bg-light">

        @include('components.header')

        <!--============== Page Banner Start ==============-->
        <div class="page-banner-simple bg-secondary py-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="banner-title text-white">How it Works</h3>
                        <!-- <span class="banner-tagline font-medium text-white">We make strategies, design & development to create valuable products.</span> -->
                    </div>
                </div>
            </div>
        </div>
        <!--============== Page Banner End ==============-->

        <br><br><br>
        <!--============== Property Tab Start ==============-->
        <div class="full-row pt-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h2 class="main-title down-line w-50 mx-auto mb-4 w-sm-100">What you need to know about our process</h2>
                        <span class="d-table w-50 w-sm-100 sub-title mx-auto">We do all the hard work to source, remodel, and decorate properties. Choose from this professionally managed and carefully selected portfolio. Once you pick your favorites, become an owner! Mix and match multiple properties, or invest in one that you believe in - it’s entirely up to you how you would like to build your portfolio.</span>
                        <p></p>
                        <span class="d-table w-50 w-sm-100 sub-title mx-auto">Sit back and relax while Vantage Horizon earns you cash dividends. We maximize your profitability using decades of Real Estate experience and lessons we’ve learned through managing dozens of Vacation Rental properties. Watch your investment portfolio grow through our online portal!</span>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Property Tab End ==============-->


        <!--============== Banner Start ==============-->
        <div class="full-row" style="background-image: url({{ asset('static/works/001.jpg') }}); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 500px;">
        </div>
        <!--============== Banner End ==============-->


        <br><br><br>
        <!--============== Property Tab Start ==============-->
        <div class="full-row pt-10">
            <div class="container align-">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h2 class="main-title down-line w-50 mx-auto mb-4 w-sm-100">A Better Experience For Investors</h2>
                        <span class="d-table w-50 w-sm-100 sub-title mx-auto">Traditional investing in rental properties is complex and time-consuming. Below is the 16-step process needed for purchasing a rental home. There is a steep learning curve, and the process requires significant time and resources. We set out to radically simplify this process and make it accessible to anyone.</span>
                        <p></p>

                        <span class="d-table w-50 w-sm-100 sub-title mx-auto">On Vantage Horizon, anyone can buy shares in rental homes and vacation rentals with a simple four-step process. With this innovative technology-driven process, you can buy shares in seconds and start earning income quickly.</span>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Property Tab End ==============-->



        <!--============== About Us Section Start ==============-->
        <div class="full-row bg-white">
            <div class="container">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <span class="text-primary mb-2 d-table tagline-2 font-medium font-600">How it Works</span>
                        <h2 class="text-dark mb-4">The Vantage Horizon Way to Buy Rental Properties</h2>
                        <p>
                            <ul>
                                <li>Investors browse available homes and vacation rental properties pre-vetted based on their appreciation and income potential.</li>
                                <li>Select Shares – Investors determine how much money they want to invest in each property and select shares.</li>
                                <li>Sign & Invest – Investors review the terms, sign an online contract, and fund the investment by linking their bank account</li>
                                <li>Earn Income – Investors sit back and collect their share of net rental income and participate in the property value appreciation.</li>
                                <li>Third party managment- Investors are able to assign a registered professional manager to their portfolio so long he/she has been validated by vantage horizon.</li>
                        </p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('static/works/002.png') }}" alt="uniland real estate">
                    </div>
                </div>
            </div>
        </div>
        <!--==============- About Us Section End ==============-->



        <!--============== About Us Section Start ==============-->
        <div class="full-row bg-white">
            <div class="container">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <img src="{{ asset('static/works/003.jpg') }}" alt="uniland real estate">
                    </div>
                    <div class="col">
                        <span class="text-primary mb-2 d-table font-medium font-600">How it Works</span>
                        <h2 class="text-dark mb-4">Our Process</h2>
                        <p>In addition to making the investing experience faster and easier, we have spent a great deal of time developing an operational model that allows us to maximize returns for our investors. While many different components go into maximizing investor returns, the two main areas that we focus on are the acquisition and management of our rental properties. Below you can learn more about the Vantage Horizon process.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--==============- About Us Section End ==============-->


        <!--============== About Us Section Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <span class="text-primary mb-2 d-table tagline-2 font-medium font-600">How it Works</span>
                        <h2 class="text-dark mb-4">Robust Property Acquisition:</h2>
                        <p>Vantage Horizon uses data science to ensure that we find and acquire the right home at the right price. This process starts with analyzing hundreds of different markets to identify which offer strong cash flow and property appreciation potential. We then pick the best neighborhoods and desired home attributes in those markets. Once we find properties that fit the bill, we create a property and financial analysis that is presented to our investment committee for review. This process ensures that we are only selecting and acquiring the properties that will maximize the returns for our investors.</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('static/works/004.jpg') }}" alt="uniland real estate">
                    </div>
                </div>
            </div>
        </div>
        <!--==============- About Us Section End ==============-->


        <!--============== About Us Section Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <img src="{{ asset('static/works/005.jpg') }}" alt="uniland real estate">
                    </div>
                    <div class="col">
                        <span class="text-primary mb-2 d-table font-medium font-600">How it Works</span>
                        <h2 class="text-dark mb-4">Efficient Property Management</h2>
                        <p>IOnce we have acquired the right property at the right price, our operations team steps in to ensure that the property is managed efficiently and that we can reap the benefits of both scale and technology adoption. To start, our operations team works with trusted contractors to renovate the property and invest in the areas that will give us the best returns and reduce maintenance expenses in the future. We then work with a local expert property manager to start vetting tenants with our data-driven criteria to minimize potential issues that could affect property returns. Last, our operating team uses a technology platform to monitor the property and provide the residents with attentive customer service.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--==============- About Us Section End ==============-->




        <!--============== About Us Section Start ==============-->
        <div class="full-row bg-white">
            <div class="container">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <span class="text-primary mb-2 d-table tagline-2 font-medium font-600">How it Works</span>
                        <h2 class="text-dark mb-4">Benefits to Investing with Vantage Horizon</h2>
                        <p>
                            <span>Not only have we dramatically improved the investor experience and built a robust operations strategy, but we have also focused on building many other benefits that make investing in top- quality real estate easier. Below are a few benefits of investing on the Vantage Horizon platform.</span>
                            <ul class="artical-list mb-3" style="list-style-type: circle;">
                                <li>Diversify your investments – Diversification is a potent tool for reducing risk. You are accessing this diversification by investing in multiple real estate properties, markets, or asset types.</li>
                                <li>No Operational Responsibility – Vantage Horizon takes all operational responsibility for the home, so you can sit back and relax.</li>
                                <li>Truly Passive and Consistent Income – We have designed our product around ensuring that rental payments are consistently paid out to our investors. Investors receive rental payments quarterly.</li>
                                <li>Top Renters – We vet our long-term tenants, and they can become co-investors by buying shares in the rental property they are staying in.</li>
                                <li>Benefits from Scale – Thanks to our scale of operations, we can further decrease many different types of costs and improve returns.</li>
                                <li>No personal liability – We place all new properties in an LLC, which means there is zero personal liability for investors from any lawsuits or personal guarantees for financing debt.</li>
                                <li>Access to the most lucrative markets – We allow investors to access markets with the highest returns, even if those markets are very far away from where you live.</li>
                                <li>Access to professional-grade technology – We utilize several advanced (and expensive) technology platforms to help us make better property acquisition and management decisions.</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('static/works/006.jpeg') }}" alt="uniland real estate">
                    </div>
                </div>
            </div>
        </div>
        <!--==============- About Us Section End ==============-->

    </div>

@endsection