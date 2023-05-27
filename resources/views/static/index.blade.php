@extends('layouts.static')

@section('title', __('Home'))

@section('content')
    <!--<div class="preloader">
			<div class="loader clock xy-center"></div>
		</div>-->

    <div id="page_wrapper" style=" background-size: 100%; background-repeat: no-repeat">
        
        <!--============== Header Section Start ==============-->
        <header class="nav-on-banner fixed-bg-white">
            <div class="main-nav py-2 xs-p-0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-expand-lg nav-secondary nav-primary-hover nav-line-active">
                                <a class="navbar-brand" href="{{ route('index') }}"><img class="nav-logo" src="{{ asset('static/assets/images/logo/Vantage-horizon-logo-large.png') }}" alt="Image not found !"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon flaticon-menu flat-small text-primary"></span>
                                  </button>
                                <div class="collapse navbar-collapse sm-ml-0" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#">Invest</a>
                                            <ul class="dropdown-menu">
                                                <li> <a class="dropdown-item" href="{{ route('listProperty') }}">Properties</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#">About</a>
                                            <ul class="dropdown-menu">
                                                <li> <a class="dropdown-item" href="{{ route('about') }}">About us</a>
                                                <li> <a class="dropdown-item" href="{{ route('vacation') }}">Vacation Rental</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('web') }}">Web 3 Properties</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('historical') }}">Historical Performance</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('stakeholder') }}">Stakeholder Commitment</a></li>
                                                {{-- <li> <a class="dropdown-item" href="{{ route('sellHome') }}">Sell Your Home</a></li> --}}
                                                {{-- <li> <a class="dropdown-item" href="vacation-rentals.html">Vacation rentals</a>
                                                <li> <a class="dropdown-item" href="web3-properties.html">Web 3 properties</a>
                                                <li> <a class="dropdown-item" href="historical-performance.html">Historical Performance</a>
                                                <li> <a class="dropdown-item" href="stakeholder-commitments.html">Stakeholder Commitments</a>
                                                <li> <a class="dropdown-item" href="sell-your-home.html">Sell your home</a> --}}
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#">Learn</a>
                                            <ul class="dropdown-menu">
                                                <li> <a class="dropdown-item" href="{{ route('how-it-works') }}">How it works</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('faq') }}">Help & FAQ</a>
                                                <li> <a class="dropdown-item" href="{{ route('learning') }}">Learning Center</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('privacy') }}">Privacy Policy</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
                                            </ul>
                                        </li>
                                    </li>
                                    <!-- <ul class="navbar-nav sm-mx-none border-start ps-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="signin.html"><i class="fas fa-user"></i> Login/Register</a>
                                        </li> -->
                                    </ul>
                                    <a href="#" class="btn">|</a>
                                    @if(!auth()->user())
                                        <a href="{{ route('login') }}" class="btn">Login</a>
                                        <a href="{{ route('account.type') }}" class="btn btn-primary add-listing-btn">Register</a>
                                    @else
                                        <a href="{{ route('home') }}" class="btn btn-primary add-listing-btn">Dashboard</a>
                                    @endif
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--============== Header Section End ==============-->

        <!--============== Search Banner Start ==============-->
        <div class="full-row p-70" style="background: rgba(255,255,255,.5); background-image: url('{{ asset('static/home/header1.jpeg') }}'); background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row justify-content-left py-8">
                    <div class="col-md-5 ">
                        <div class="sm-p-0 text-white" style="padding-top: 170px; padding-bottom: 190px; color: white;">
                            <h1 class="text-start text-dark font-700">A Better Way to Invest in Real Estate</h1>
                            <p>
                            <span class="d-table text-dark font-medium mb-4">We're built for people who want to invest in real estate, but don't want to buy a whole home
or deal with the operational headaches.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Search Banner End ==============-->


        <!--============== Company Featured start ==============-->
        <div class="full-row p-0 sm-m-0" style="margin-top: -200px;">
            <div class="container">
                <div class="row row-cols-md-3 row-cols-1 g-4 bg-light p-5 mx-0">
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-life-insurance text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Consistent Passive Income</h4>
                        <p>Earn rental income and receive deposits quarterly</p>
                    </div>
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-data text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Property Appreciation</h4>
                        <p>Watch your investment grow as the home appreciates</p>
                    </div>
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-id-card text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Save Time & Energy</h4>
                        <p>Kick back and relax! Arrived acquires & manages your properties</p>
                    </div>
                </div>

                <div class="row row-cols-md-3 row-cols-1 g-4 bg-light p-5 mx-0">
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-money text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Tax Advantages</h4>
                        <p>Benefit from favorable real estate tax deductions</p>
                    </div>
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-home text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Diversify with Real Estate</h4>
                        <p>Access historically consistent returns with low correlation to the stock market</p>
                    </div>
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-money text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Flexible Investment Amounts</h4>
                        <p>Invest anywhere from $5,000 to $100,000,000 per house and build a portfolio across several properties</p>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Company Featured End ==============-->


        <!--============== Property Location Start ==============-->

        <div class="full-row bg-light">
            <div class="container">
                <div class="row">
                <div class="col">
                        {{-- <span class="tagline-3 d-table mx-auto mb-3">Our Services</span> --}}
                        <h1 class="main-title w-50 mx-auto mb-4 text-center w-sm-100">Investing In Real Estate Has Never Been Easier</h1>
                    </div>
                </div>
                <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 g-4">
                    <div class="col">
                        <div class="text-center p-35 bg-white transation box-shadow h-100 hover-style-1">
                            <span class="flaticon-home flat-medium text-primary"></span>
                            <h5 class="mb-3 font-400"><a href="#" class="d-block text-secondary hover-text-primary font-700 mt-4">Browse Homes</a></h5>
                            <p>Browse Vantage horizon homes, each pre-vetted for their investment potential</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center p-35 bg-white transation box-shadow h-100 hover-style-1">
                            <span class="flaticon-shop flat-medium text-primary"></span>
                            <h5 class="mb-3 font-400"><a href="#" class="d-block text-secondary hover-text-primary font-700 mt-4">Select Property</a></h5>
                            <p>Determine how much money you want to invest and select your shares</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center p-35 bg-white transation box-shadow h-100 hover-style-1">
                            <span class="flaticon-partner flat-medium text-primary"></span>
                            <h5 class="mb-3 font-400"><a href="#" class="d-block text-secondary hover-text-primary font-700 mt-4">Buy Shares</a></h5>
                            <p>Review the terms, sign electronically, and fund your investment</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center p-35 bg-white transation box-shadow h-100 hover-style-1">
                            <span class="flaticon-partner flat-medium text-primary"></span>
                            <h5 class="mb-3 font-400"><a href="#" class="d-block text-secondary hover-text-primary font-700 mt-4">Earn Income & Appreciation</a></h5>
                            <p>Earn your share of rental income and home appreciation on our holdings.</p>
                        </div>
                    </div>
                </div>

                <div class="col" style="justify-content: center; display: flex;">
                    <a href="/how-it-works" style="width: 300px;" class="btn btn-primary mt-5">How vantage horizon works<i class="flaticon-rocket flat-mini text-white"></i> </a>
                </div>
            </div>
        </div>
        <!--============== Property Location End ==============-->


        <!--============== Contennt section Start ==============-->
        <!-- Meetings Section Start -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('static/home/cash.png') }}" alt="">
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="position-relative y-center">
                            {{-- <span class="tagline mb-1 d-block text-primary">Meetings</span> --}}
                            <h2 class="mb-40 down-line">Earn cash dividends and appreciation</h2>
                            <p>Sit back and relax while Vantage horizon earns you cash dividends. We maximize your profitability using decades of Real Estate experience and lessons we’ve learned through managing dozens of properties. Watch your investment portfolio grow through our online portal!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1 order-lg-2">
                        <img src="{{ asset('static/home/invest.jpeg') }}" alt="">
                    </div>
                    <div class="col-lg-5 order-lg-1">
                        <div class="position-relative y-center">
                            {{-- <span class="tagline mb-1 d-block text-primary">Collaborate</span> --}}
                            <h2 class="mb-40 down-line">Invest with a few clicks in less than 5 minutes</h2>
                            <p>Found your next investment? In less than 5 minutes you can choose how much you'd like to invest, make the purchase, and see the shares stack up in your investment portal. Over time you can build a portfolio of properties that are working to generate income for you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('static/home/build.png') }}" alt="">
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="position-relative y-center">
                            {{-- <span class="tagline mb-1 d-block text-primary">Meetings</span> --}}
                            <h2 class="mb-40 down-line">Build the future you deserve</h2>
                            <p>Use your rental income to buy more and more real estate – you’re on the path to financial freedom.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Meetings Section End -->
        <!--============== Contennt section End ==============-->



        <!--============== Property Tab Start ==============-->
        {{-- <div class="full-row bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h2 class="main-title down-line mb-5">Consider Properties for Investment</h2>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="mb-3 btn-link text-secondary hover-text-primary transation float-md-end d-table">More Properties &gt;</a>
                    </div>
                </div>
                <div class="row row-cols-xl-3 row-cols-lg-1 row-cols-md-2 row-cols-1 g-4">
                    @foreach($plans as $property)
                        @php
                            $property_img = App\PropertyImage::where('plan_id', $property->id)->get();
                        @endphp

                    <div class="col">
                        <div class="property-grid-5 property-block rounded border transation-this bg-white hover-shadow">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                <a href="#" class="listing-ctg text-white"><span>{{ $property->type }}</span></a>
                                 <div id="carouselExampleIndicators{{ $property->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-indicators">
                                        @foreach($property_img as $key => $image)
                                            <button type="button" data-bs-target="#carouselExampleIndicators{{ $property->id }}" data-bs-slide-to="{{$key}}" class="@if($key==0) active @endif"  aria-current="@if($key==0) true @endif" aria-label="Slide {{$key}}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">
                                    @foreach($property_img as $key => $image)
                                        <div class="carousel-item @if($key==0) active @endif">
                                            <img src="{{ $image->img_url }}" alt="{{ $image->title }}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{ $property->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{ $property->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                
                                <ul class="position-absolute quick-meta">
                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-3">
                                <h5 class="listing-title"><a href="/invest-noww/invest/{{ $property->slug }}">{{ $property->name }}</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> {{ $property->location }}</span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Leverage"><span><i class="fa-solid fa-house"></i></span>{{ $property->leverage }}</li>
                                    <li title="Shares"><span><i class="fa-solid fa-house-circle-check"></i></span>{{ $property->shares }}</li>
                                    <li title="Investors"><span><i class="fa-solid fa-users"></i></span>{{ $property->investors }}</li>
                                    <li title="funding"><span><i class="fa-solid fa-money-check-dollar"></i></span>{{ $property->funding }}</li>
                                </ul>
                                <div class="agent">
                                    <ul class="d-flex justify-content-between">
                                        <li><span>Rental</span><div class="text-dark">( {{ $property->rental }} )</div></li>
                                        <li><span>Status</span><div class="text-dark">Active</div></li>
                                        <li><span>Time</span><div class="text-dark">{{ date('d M, Y', strtotime($property->created_at)) }}</div></li>
                                    </ul>
                                </div>
                                <div class="entry-footer">
                                    <span class="listing-price">${{ number_format($property->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if($plans->count() == 0)
                        <p class="text-center">No result found</P>
                    @endif
                </div>
            </div>
        </div> --}}
        <!--============== Property Tab End ==============-->


        <!--=============== Problem solving Section Start ===============-->
        <div class="full-row bg-light" style="padding: 150px 0; background-image: url('{{ asset('static/home/header.jpeg') }}'); background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 order-lg-1 text-white">
                        {{-- <span class="tagline mb-1 d-block text-white md-mt-40">Solve Problems</span> --}}
                        <h1 class="mb-40 text-white">Crowdfunding</h1>
                        <p style="font-size: 20px;">crowdfunding allows multiple investors to pool their money and collectively invest in larger real
                            estate projects than they could on their own.
                            As an investor in a crowdfunding deal, you, along with dozens or even hundreds of other
                            investors, purchase a portion of interest in a property or real estate project, similar to owning
                            shares in a company. Capital that is raised goes to the real estate developer to invest in building,
                            renovating or recapitalizing the property, which with the goal of potentially generating ROI for
                            each investor
                        </p>
                        {{-- <a href="#" class="btn btn-primary mt-5">Get Started <i class="flaticon-rocket flat-mini text-white"></i> </a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--=============== Problem solving Section End ===============-->

        <div class="full-row bg-light">
            <div class="container">
                {{-- <div class="row">
                    <div class="col mb-5">
                        <h2 class="text-dark down-line w-50 mx-auto mb-4 text-center w-sm-100">What You Area Looking For?</h2>
                        <span class="d-table w-50 w-sm-100 sub-title general-font fw-normal mx-auto text-center">Mauris primis turpis Laoreet magna felis mi amet quam enim curae. Sodales semper tempor dictum faucibus habitasse.</span>
                    </div>
                </div> --}}
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <a href="#" class="text-center d-flex flex-column justify-content-center align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary">
                            <div class="box-70px position-relative">
                                <i class="flaticon-home flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">You don’t have to be a pro to invest like one</h5>
                            <p>Get instant access to great property deals, in-depth analysis, and a community of wealth builders from around the world.</p>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="#" class="text-center d-flex flex-column justify-content-center align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary">
                            <div class="box-70px position-relative">
                                <i class="flaticon-sketch-1 flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Skip the down payment</h6>
                            <p>Acquire fractional ownership of rental properties.</p>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="#" class="text-center d-flex flex-column justify-content-center align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary">
                            <div class="box-70px position-relative">
                                <i class="flaticon-online-booking flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Earn rent today, appreciation tomorrow</h6>
                            <p>Get daily rent payouts (not monthly or quarterly) and collect property appreciation when you cash out.</p>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="#" class="text-center d-flex flex-column justify-content-center align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary">
                            <div class="box-70px position-relative">
                                <i class="flaticon-shop flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Own multiple properties without the landlord headaches</h6>
                            <p>Diversify your portfolio without multiplying your workload. Vote on key property decisions, and professional property managers handle the rest.</p>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="#" class="text-center d-flex flex-column justify-content-center align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary">
                            <div class="box-70px position-relative">
                                <i class="flaticon-online-booking flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Keep full control of your investments</h6>
                            <p>Forget expensive brokers and lock-in periods. Easily reinvest your rental income for the long term, or list your holdings for sale whenever you like.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="full-row bg-light">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-1 mb-5">
                    <div class="col mb-5">
                        <h2 class="mb-4">We're on a mission </h2>
                        <p>At Vantage Horizon our mission is to empower the world to build wealth through modern real
                            estate investing.
                            While residential real estate has been the best long-run investment in modern history,
                            operational headaches and larger upfront financial commitments prevent many people from
                            participating.
                        </p>
                        <p>
                            By breaking down the barriers to investing in rental properties, we believe we can help millions of
                            people better access this incredible asset class.
                        </p>
                        <p>
                            (The Rate of Return on Everything, 1870–2015 (2019 Research Study)
                            The first key finding is that residential real estate, not equity, has been the best long-run
                            investment over the course of modern history. Although returns on housing and equities are
                            similar, the volatility of housing returns is substantially lower, as Table II shows. Returns on the
                            two asset classes are in the same ballpark—around 7%—but the standard deviation of housing
                            returns is substantially smaller than that of equities (10% for housing versus 22% for equities).
                            Predictably, with thinner tails, the compounded return (using the geometric average) is vastly
                            better for housing than for equities—6.6% for housing versus 4.7% for equities. This finding
                            appears to contradict one of the basic tenets of modern valuation models: higher risks should
                            come with higher rewards)
                        </p> 
                        <p>Our goal is to make real estate investing as simple as investing in stocks or crypto. Diversification is key to any investment strategy, but the barrier to entry for real estate investing has always been so high. We don't believe that should be the case.</p>
                        <p>We're on a mission to make property investing accessible to everyone with strong technical background and legal expertise.</p>
                        <a href="#" class="btn btn-primary mt-5">Signup <i class="flaticon-rocket flat-mini text-white"></i> </a>
                    </div>
                    <div class="col">
                        <div class="capability-avg">
                            <img src="{{ asset('static/home/mission.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--=============== Problem solving Section Start ===============-->
        <div class="full-row bg-dark" style="padding: 150px 0; background-image: url(static/home/home.png); background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="capability-avg">
                            <img src="{{ asset('static/home/simple.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 order-lg-1 text-white">
                        {{-- <span class="tagline mb-1 d-block text-white md-mt-40">Solve Problems</span> --}}
                        <h1 class="mb-40 text-white">Simple and Fast:</h1>
                        <p style="font-size: 20px;">
                            We have simplified the process of investing in real estate. While the old process required over 15
                            steps and several months of hard work, the Arrived process is radically simple. In just 4 steps
                            you can buy shares in a rental home or vacation rental property.
                        </p>
                        {{-- <a href="#" class="btn btn-primary mt-5">Get Started <i class="flaticon-rocket flat-mini text-white"></i> </a> --}}
                    </div>
                    
                </div>
            </div>
        </div>
        <!--=============== Problem solving Section End ===============-->


<!--============== Our Aminities Section Start ==============-->
        <div class="full-row bg-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        {{-- <span class="tagline-3 d-table mx-auto mb-3">Our Aminities</span> --}}
                        <h1 class="main-title w-50 mx-auto mb-4 text-center w-sm-100">The Vantage horizon way</h1>
                    </div>
                </div>
                <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 gy-5">
                    <div class="col">
                        <div class="service-style-1 text-center p-35 bg-white hover-bg-primary transation box-shadow h-100 rounded">
                            <div class="bg-gray icon-wrap"><span class="icon flaticon-user flat-medium text-primary"></span></div>
                            <h5 class="title mb-3 font-400"><a href="#" class="d-block text-secondary font-700 mt-4">Signup</a></h5>
                            <a href="#" class="btn-icon box-shadow"><i class="icon fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-style-1 text-center p-35 bg-white hover-bg-primary transation box-shadow h-100 rounded">
                            <div class="bg-gray icon-wrap"><span class="icon flaticon-data flat-medium text-primary"></span></div>
                            <h5 class="title mb-3 font-400"><a href="#" class="d-block text-secondary font-700 mt-4">Browse Property</a></h5>
                            <a href="#" class="btn-icon box-shadow"><i class="icon fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-style-1 text-center p-35 bg-white hover-bg-primary transation box-shadow h-100 rounded">
                            <div class="bg-gray icon-wrap"><span class="icon flaticon-money flat-medium text-primary"></span></div>
                            <h5 class="title mb-3 font-400"><a href="#" class="d-block text-secondary font-700 mt-4">Purchase Shares</a></h5>
                            <a href="#" class="btn-icon box-shadow"><i class="icon fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-style-1 text-center p-35 bg-white hover-bg-primary transation box-shadow h-100 rounded">
                            <div class="bg-gray icon-wrap"><span class="icon flaticon-home flat-medium text-primary"></span></div>
                            <h5 class="title mb-3 font-400"><a href="#" class="d-block text-secondary font-700 mt-4">Earn income & Appreciation</a></h5>
                            <a href="#" class="btn-icon box-shadow"><i class="icon fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Our Aminities Section End ==============-->

<!--=============== Problem solving Section Start ===============-->
        <div class="full-row bg-light" style="padding: 150px 0; background-image: url('{{ asset('static/home/home.jpeg') }}'); background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 order-lg-1 text-white">
                        {{-- <span class="tagline mb-1 d-block text-white md-mt-40">Solve Problems</span> --}}
                        <h1 class="mb-40 text-white">Our Process</h1>
                        <p style="font-size: 20px;">
                            In addition to making the investing experience faster and easier, we have spent a great deal of
                            time developing an operational model that allows us to maximize returns for our investors. While
                            many different components go into maximizing investor returns, the two main areas that we
                            focus on are the selection of high-quality property management (PM) partners and acquiring
                            properties with great return profiles.
                        </p>
                        {{-- <a href="#" class="btn btn-primary mt-5">Get Started <i class="flaticon-rocket flat-mini text-white"></i> </a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--=============== Problem solving Section End ===============-->


        <div class="full-row bg-light">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-1 mb-5">
                    <div class="col mb-5">
                        <h2 class="mb-4">Diversify your investments </h2>
                        <p>
                            Diversification is a very powerful tool to lower your risk while keeping your potential for
                            returns high. There are multiple ways Arrived is designed to help you mitigate risk through
                            diversification.
                        </p>
                        <a href="/" class="btn btn-primary mt-5">Learn More <i class="flaticon-rocket flat-mini text-white"></i> </a>
                    </div>
                    <div class="col">
                        <div class="capability-avg">
                            {{-- <img src="{{ asset('static/home/mission.jpeg') }}" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!--============== Explore Properties Section Start ==============-->
        <div class="full-row half-bg-secondary p-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bg-primary d-flex flex-wrap flex-lg-nowrap align-items-center justify-content-between p-5">
                            <div class="text-white font-medium" style="width: 80%;">
                                <h1 class="text-white">Start investing in properties shares with vantage horizon</h1>
                                {{-- <p>We can help you realize your dream of a new home</p> --}}
                            </div>
                            <div class="btn-wrap">
                                <a class="btn btn-white font-medium" href="/login">Get Started <i class="icon fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Explore Properties Section End ==============-->

        <!--============== Modal Start ==============-->
        <div class="overlay-dark modal fade quick-view-modal" id="quick-view">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="close view-close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body property-block summary p-3">
                        <div class="row row-cols-xl-2 row-cols-1">
                            <div class="col">
                                <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom m-2">
                                    <div class="cata position-absolute">
                                        <span class="sale bg-secondary text-white">For Rent</span>
                                        <span class="featured bg-primary text-white">Featured</span>
                                    </div>
                                    <a href="#"><img class="w-100" src="{{ asset('static/assets/images/property/2.png') }}" alt=""></a>
                                    <ul class="position-absolute quick-meta">
                                        <li><a href="#"><i class="flaticon-transfer flat-mini"></i></a></li>
                                        <li><a href="#"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                        <li><a href="#"><i class="flaticon-share flat-mini"></i></a></li>
                                        <li><a href="#"><i class="flaticon-printer flat-mini"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="property_text transation py-3 pe-3">
                                    <span class="d-inline-block text-primary">Condos</span>
                                    <h5 class="modal-title mb-1" id="staticBackdropLabel"><a href="#" class="text-secondary hover-text-primary transation">Luxury Condos Infront of the street of Green Park</a></h5>
                                    <span class="mt-1 mb-3 d-block font-fifteen"><i class="fas fa-map-marker-alt text-primary"></i> 2305 Tree Frog Lane Overlandpk, MO 66210</span>
                                    <a href="#" class="d-block text-light hover-text-primary font-small mb-2">( 100 People Recommended )</a>
                                    <div class="d-flex">
                                        <span class="text-secondary font-large">$5600 - $8300/<small>mo</small></span>
                                        <span class="text-white font-mini px-2 rounded product-status ms-5 my-1 bg-primary"><i class="fas fa-check"></i> Available</span>
                                    </div>
                                    <div class="product-offers mt-3">
                                        <ul class="product-offers-list">
                                            <li class="product-offer-item"> <strong>Special Price </strong>Get extra 19% off (price inclusive of discount)</li>
                                            <li class="product-offer-item"> <strong>Bank Offer </strong> 10% instant discount on VISA Cards</li>
                                            <li class="product-offer-item"> <strong>No cost EMI $49/month.</strong> Standard EMI also available</li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="quantity">
                                        <ul class="d-flex">
                                            <li><span>Rooms:</span> 5</li>
                                            <li><span>Beds:</span> 3</li>
                                            <li><span>Bathrooms:</span> 2</li>
                                            <li><span>Garage:</span> 1</li>
                                            <li><span>Area:</span> 1100 Sqft</li>
                                        </ul>
                                    </div>
                                    <h5 class="text-secondary my-3">Description</h5>
                                    <p>Bibendum purus aenean mus aenean eu interdum nonummy ipsum ad consequat. Dui eros donec faucibus convallis tempus rutrum id donec mus hymenaeos placerat congue curae mauris turpis gravida viverra consequat consequat
                                        gravida luctus.</p>
                                    <div class="short-description d-flex">
                                        <span class="me-4"><b>Highlights:</b></span>
                                        <div class="short-description">
                                            <ul class="list-style-tick">
                                                <li>Regular Fit.</li>
                                                <li>Full sleeves.</li>
                                                <li>Machine wash, tumble dry.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center post-meta mt-2 py-3 border-top">
                                        <div class="agent">
                                            <a href="#" class="d-flex text-general align-items-center"><img class="rounded-circle me-2" src="{{ asset('static/assets/images/team/1.jpg') }}" alt="avata"><span>Ali Tufan</span></a>
                                        </div>
                                        <div class="post-date ms-auto"><span>2 Month Ago</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Modal End ==============-->

    </div>
@endsection
