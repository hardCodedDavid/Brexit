@extends('layouts.static')

@section('title', __('Vacation Rentals'))

@section('content')


<div id="page_wrapper" class="bg-light">
        
        @include('components.header')

        <!--============== Page Banner Start ==============-->
        <div class="page-banner-simple bg-secondary py-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="banner-title text-white">Vacation rentals</h3>
                        <span class="banner-tagline font-medium text-white">Invest in shares of vacation rentals. Earn passive income & appreciation.</span>
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
                            <span class="tagline-2 text-primary">Why vacation rentals?</span>
                            <h2 class="text-secondary mb-4">Build your real estate portfolio and participate in the high rental income from the rapidly growing short-term rental market.</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row row-cols-md-1 row-cols-1">
                            <div class="col border-start border-geay mb-5">
                                <div class="simple-thumb transation px-4">
                                    <p>Our goal has always been to democratize access to the wealth-building potential of real estate investment. Vantage Horizon's expansion into vacation rentals is another great step in the right direction toward fulfilling that vision.</p>
                                    <p>Short-term rentals have historically shown high returns and the market is growing as domestic travel patterns change and more people choose to stay in vacation homes. The cost of purchasing a home and the time, effort, and expertise needed to run a successful rental property has traditionally put this out of reach for the average person.</p>
                                    <p></p>
                                    <p>That's why we are adding this exciting new asset class to our platform. With Vantage Horizon anyone can buy shares in income-producing rental properties starting at just $100. Vantage Horizon takes care of all the real estate operations so that investors can sit back and collect net rental income and their share of the home's appreciation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Features End ==============-->

        <br><br><br>

        <!--============== Career Start ==============-->
        <div class="full-row bg-light pt-0">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="border-end">
                            <h5 class="text-primary mb-1">Co founder statement on vacation rentals </h5>
                            <span><strong></strong>Co-founder & CEO</span>
                        </div>
                    </div>
                    <div class="col-md-8 offset-md-1">
                        <h5 class="text-secondary mb-2">$13B Market</h5>
                        <p>US vacation rentals are currently a $13B market & expected to reach $20B by 2025, +53% growth!</p>
                        <h5 class="text-secondary mb-2">High Revenue</h5>
                        <p>On average, a full time vacation rental can generate up to 130% more revenue than a traditional long-term rental*.2 Growing Trend</p>
                        <p>Work-from-home flexibility & increased business + leisure travel have raised the average stay from 3.5 to 4+ nights from 2019 through 2021.3</p>
                        <a href="#" class="btn btn-primary mt-3">Download Details</a>
                        <a href="#" class="btn btn-secondary mt-3">Submit Application</a>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Career End ==============-->



        <!--============== Banner Start ==============-->
        <div class="full-row paraxify" style="background-image: url({{ asset('static/vacation/alpha.png') }}); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 500px;">
        </div>
        <!--============== Banner End ==============-->

        <!--============== Pricing Table Content Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 mb-5">
                        <div class="text-secondary mb-5">
                            <span class="text-primary text-uppercase pb-2 d-table tagline-2 font-fifteen">Get the best</span>
                            <h3 class="text-secondary mb-4">Vacation rentals vs. rental homes. What’s the better investment?</h3>
                        </div>
                    </div>
                </div>
                <div class="row divider-col-8 row-cols-xl-2 row-cols-md-2 row-cols-2">
                    <div class="col">
                        <div class="px-3 sm-px-0 mb-5">
                            <h4 class="text-secondary font-400">Vacation Rentals</h4>
                            <ul class="list-style-tick my-4">
                                <li>
                                    <strong>Higher potential revenue</strong>
                                    Vacation rentals in destinations like Nashville & Orlando have tremendous income potential. Why? Owners can charge higher, competitive hightly rates than they could for a long-term rental property. On average, a full-time vacation rental can generate up to 130% more revenue than a traditional long-term rental.
                                </li>
                                <li>
                                    <strong>Seasonal cashflow.</strong>
                                    Vacation rentals may have more significant income potential, but that income may not remain consistent. The reason? It’s a highly seasonal market. Vacation rentals are most active during their peak seasons, like summer and around the holidays. Less active periods will incur more vacancies and produce less income.
                                </li>
                                <li>
                                    <strong>Rapidly growing industry</strong>
                                    The total vacation rental market in the United States accounts for over $13B in revenue in 2022 alone. That market size is expected to reach $20B by 2025. A +53% growth in market size means there will be plenty of demand from travelers choosing vacation rentals for the next few years.
                                </li>
                            </ul>
                            <a href="#" class="btn btn-secondary d-table">Get Started</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-3 sm-px-0 mb-5">
                            <h4 class="text-secondary font-400">Home Rentals</h4>
                            <ul class="list-style-tick my-4">
                                <li>
                                    <strong>Consistent income with 1-2 year leases </strong>
                                    That’s right! Since long- term rental properties are leased to long-term tenants for long periods, it means no fluctuating income.Theresult?Steady, consistent income and cash flow.
                                </li>
                                <li>
                                    <strong>Lower operating costs</strong>
                                    It can be costly to maintain the upkeep and bookings of short- term rentals. Long-term rentals, however, are usually cheaper for the owner to maintain. The savings add up over time. Plus, you get complete control over tenant screening. Most property owners hire a property management company to help with this process.
                                </li>
                                <li>
                                    <strong>Tax advantages</strong>
                                    Rental homes on the Vantage Horizon platform receive the tax benefits of being structured as a REIT. So when a property is sold, there are capital gains taxes instead of ordinary income. Additionally, REITs can use a qualified business income deduction, which lowers taxable income by 20%.
                                </li>
                            </ul>
                            <a href="#" class="btn btn-secondary d-table">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Pricing Table Content End ==============-->



         <!--============== Features Start ==============-->
        <div class="full-row pb-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="text-secondary mb-2">
                            <img src="{{ asset('static/vacation/misfit.jpg') }}" alt="Agent Photo">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="text-secondary mb-2">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row row-cols-md-1 row-cols-1">
                            <div class="col mb-2">
                                <div class="simple-thumb transation px-4">
                                    <h3 class="text-secondary font-400">Misfit Homes</h3>
                                    <p >Misfit Homes is a vacation rental company based in Nashville, TN, specializing in what they refer to as "fun luxury stays". Each Misfit Home is decorated with high-end furnishings, Music City inspired art, and spaces designed to elevate your stay to a uniquely memorable experience. When you stay at one of these homes, you know you will be treated to thoughtful and fun amenities, such as skyline views, games, and karaoke rooms. Stand Out and Stay In with Misfit Homes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Features End ==============-->


         <!--============== Features Start ==============-->
        <div class="full-row pb-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="row row-cols-md-1 row-cols-1">
                            <div class="col mb-5">
                                <div class="simple-thumb transation px-4">
                                    <h3 class="text-secondary font-400">Alpha Geek Capital</h3>
                                    <p >
                                        Tony J. Robinson is the founder and managing partner of Alpha Geek Capital. He's widely
                                        regarded as one of the leading experts on investing in Short Term Rentals. He's the co-host of
                                        the BiggerPockets Real Estate Rookie Podcast, a top business podcast with over 11,000,000
                                        downloads. He and his wife, Sara, run the Real Estate Robinsons YouTube channel, with 25,000
                                        subscribers. Along with his partners, he's created a strong track record of creating solid returns
                                        within the short term rental asset.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="text-secondary mb-2">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-secondary mb-2">
                            <img src="{{ asset('static/vacation/alpha.png') }}" alt="Agent Photo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Features End ==============-->

        <br><br>


        <!--============== Page Banner Start ==============-->
        <div class="page-banner-simple bg-secondary py-50" style="background-image: url({{ asset('static/vacation/vacation.jpg') }}); background-repeat: no-repeat; background-position: center center; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="banner-title text-white">Our Services</h3>
                        <span class="banner-tagline font-medium text-white">We make strategies, design & development to create valuable products.</span>
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="btn btn-secondary mt-3 float-lg-end">Get My Rentals Started! <i class="fas fa-arrow-right-long me-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Page Banner End ==============-->

</div>

@endsection