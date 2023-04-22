@extends('layouts.static')

@section('title', __('Home'))

@section('content')
    <!--<div class="preloader">
			<div class="loader clock xy-center"></div>
		</div>-->

    <div id="page_wrapper" style="background-image: url('static/assets/images/background/vintage-horizin-bg-1.1.jpg'); background-size: 100%; background-repeat: no-repeat">
        
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
                                                <li> <a class="dropdown-item" href="{{ route('faq') }}">FAQ</a>
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
                                                <li> <a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('vacation') }}">Vacation Rental</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('historical') }}">Historical Performance</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('stakeholder') }}">Stakeholder Commitment</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('sellHome') }}">Sell Your Home</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('learning') }}">Learning Center</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('web') }}">Web 3 Properties</a></li>
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
        <div class="full-row p-70" style="background-image: url(assets/images/background/vintage-horizin-bg-1.1.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row justify-content-left py-8">
                    <div class="col-md-5 ">
                        <div class="sm-p-0 text-white" style="padding-top: 170px; padding-bottom: 190px; color: white;">
                            <h1 class="text-start text-dark font-700">Discover Your Your Most Reliable Way to Building Wealth</h1>
                            <p>
                            <span class="d-table text-dark font-medium mb-4">We are Vintage Horizon and we are coxmmitted to helping the community build wealth through Real Estate</span></p>
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
                        <h4 class="mb-3 font-400">Instalment Booking</h4>
                        <p>Amet eleifend nostra torquent facilisi pharetra ante gravida cursus auctor consequat metus sociosqu. Aenean nec egestas fusce integer ante.</p>
                    </div>
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-data text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Property Managment</h4>
                        <p>Amet eleifend nostra torquent facilisi pharetra ante gravida cursus auctor consequat metus sociosqu. Aenean nec egestas fusce integer ante.</p>
                    </div>
                    <div class="col">
                        <div class="mb-4"><i class="flaticon-id-card text-primary flat-medium"></i></div>
                        <h4 class="mb-3 font-400">Lifetime Membership</h4>
                        <p>Amet eleifend nostra torquent facilisi pharetra ante gravida cursus auctor consequat metus sociosqu. Aenean nec egestas fusce integer ante.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Company Featured End ==============-->


        <!--============== Property Location Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-secondary mb-5">
                            <h2 class="text-secondary mb-4">Our Team</h2>
                            <span class="d-table w-50 w-sm-100 sub-title">Mauris primis turpis Laoreet magna felis mi amet quam enim curae. Sodales semper tempor dictum faucibus habitasse.</span>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 g-4">
                    <div class="col">
                        <div class="hover-img-zoom position-relative">
                            <div class="overflow-hidden transation thumbnail-img rounded-lg bg-secondary">
                                <img src="{{ asset('static/assets/images/property/5.png') }}" alt="image not found">
                            </div>
                            <div class="position-absolute text-center p-4 w-100 bottom-0">
                                <h5 class="transation"><a class="text-white font-400 text-nowrap" href="#">Ryan Frazier</a></h5>
                                <span class="d-table mx-auto text-white">Co-founder & CEO</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="hover-img-zoom position-relative">
                            <div class="overflow-hidden transation thumbnail-img rounded-lg bg-secondary">
                                <img src="{{ asset('static/assets/images/property/6.png') }}" alt="image not found">
                            </div>
                            <div class="position-absolute text-center p-4 w-100 bottom-0">
                                <h5 class="transation"><a class="text-white font-400 text-nowrap" href="#">Alejandro Chouza</a></h5>
                                <span class="d-table mx-auto text-white">Co-founder & COO</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="hover-img-zoom position-relative">
                            <div class="overflow-hidden transation thumbnail-img rounded-lg bg-secondary">
                                <img src="{{ asset('static/assets/images/property/7.png') }}" alt="image not found">
                            </div>
                            <div class="position-absolute text-center p-4 w-100 bottom-0">
                                <h5 class="transation"><a class="text-white font-400 text-nowrap" href="#">Kenny Cason</a></h5>
                                <span class="d-table mx-auto text-white">Co-founder & COO</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="hover-img-zoom position-relative">
                            <div class="overflow-hidden transation thumbnail-img rounded-lg bg-secondary">
                                <img src="{{ asset('static/assets/images/property/8.png') }}" alt="image not found">
                            </div>
                            <div class="position-absolute text-center p-4 w-100 bottom-0">
                                <h5 class="transation"><a class="text-white font-400 text-nowrap" href="#">Joel Mezistrano</a></h5>
                                <span class="d-table mx-auto text-white">CFO</span>
                            </div>
                        </div>
                    </div>
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
                        <img src="{{ asset('static/assets/images/clipart/9.png') }}" alt="">
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="position-relative y-center">
                            <span class="tagline mb-1 d-block text-primary">Meetings</span>
                            <h2 class="mb-40 down-line">Stay up to date on new besiness ideas</h2>
                            <p>Aliquam faucibus, odio nec commodo aliquam, neque felis placerat dui, a porta ante lectus dapibus est. Aliquam a bibendum mi, sed condimentum est. Mauris arcu odio, vestibulum quis dapibus sit amet, finibus id turpis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1 order-lg-2">
                        <img src="{{ asset('static/assets/images/clipart/10.png') }}" alt="">
                    </div>
                    <div class="col-lg-5 order-lg-1">
                        <div class="position-relative y-center">
                            <span class="tagline mb-1 d-block text-primary">Collaborate</span>
                            <h2 class="mb-40 down-line">Drive more customer by digital</h2>
                            <p>Aliquam faucibus, odio nec commodo aliquam, neque felis placerat dui, a porta ante lectus dapibus est. Aliquam a bibendum mi, sed condimentum est. Mauris arcu odio, vestibulum quis dapibus sit amet, finibus id turpis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Meetings Section End -->
        <!--============== Contennt section End ==============-->



        <!--============== Property Tab Start ==============-->
        <div class="full-row bg-light">
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
                    <div class="col">
                        <div class="property-grid-5 property-block rounded border transation-this bg-white hover-shadow">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                <a href="#" class="listing-ctg text-white"><span>Apartment</span></a>
                                <div class="owl-carousel single-carusel dot-disable nav-between-in">
                                    <div class="item">
                                        <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-1.png') }}" alt="Image Not Found!"></a>
                                    </div>
                                    <div class="item">
                                        <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-2.png') }}" alt="Image Not Found!"></a>
                                    </div>
                                </div>
                                
                                <ul class="position-absolute quick-meta">
                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-3">
                                <h5 class="listing-title"><a href="property-single-v1.html">Family House Residense</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 3 Industrial Road, Boston, MA 5502, USA</span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>7 Bed</li>
                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>5 Bath</li>
                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                </ul>
                                <div class="agent">
                                    <ul class="d-flex justify-content-between">
                                        <li><span>Realtors</span><div class="text-dark">Albart Rone</div></li>
                                        <li><span>Status</span><div class="text-dark">For Sell</div></li>
                                        <li><span>Time</span><div class="text-dark">7/4/2021</div></li>
                                    </ul>
                                </div>
                                <div class="entry-footer">
                                    <span class="listing-price">$345000<small>( Only )</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="property-grid-5 property-block rounded border transation-this bg-white hover-shadow">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                <a href="#" class="listing-ctg text-white"><span>Condo</span></a>
                                <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-2.png') }}" alt="Image Not Found!"></a>
                                <ul class="position-absolute quick-meta">
                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-3">
                                <h5 class="listing-title"><a href="property-single-v1.html">Condos Infront of River</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 3 Industrial Road, Boston, MA 5502, USA</span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>7 Bed</li>
                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>5 Bath</li>
                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                </ul>
                                <div class="agent">
                                    <ul class="d-flex justify-content-between">
                                        <li><span>Realtors</span><div class="text-dark">Albart Rone</div></li>
                                        <li><span>Status</span><div class="text-dark">For Sell</div></li>
                                        <li><span>Time</span><div class="text-dark">7/4/2021</div></li>
                                    </ul>
                                </div>
                                <div class="entry-footer">
                                    <span class="listing-price">$1221850<small>( Only )</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="property-grid-5 property-block rounded border transation-this bg-white hover-shadow">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                <a href="#" class="listing-ctg text-white"><span>Appartment</span></a>
                                <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-3.png') }}" alt="Image Not Found!"></a>
                                <ul class="position-absolute quick-meta">
                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-3">
                                <h5 class="listing-title"><a href="property-single-v1.html">Florida Sea View Appartment</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 3 Industrial Road, Boston, MA 5502, USA</span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>7 Bed</li>
                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>5 Bath</li>
                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                </ul>
                                <div class="agent">
                                    <ul class="d-flex justify-content-between">
                                        <li><span>Realtors</span><div class="text-dark">Albart Rone</div></li>
                                        <li><span>Status</span><div class="text-dark">For Rent</div></li>
                                        <li><span>Time</span><div class="text-dark">7/4/2021</div></li>
                                    </ul>
                                </div>
                                <div class="entry-footer">
                                    <span class="listing-price">$11250<small>( Monthly )</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="property-grid-5 property-block rounded border transation-this bg-white hover-shadow">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                <a href="#" class="listing-ctg text-white"><span>Appartment</span></a>
                                <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-4.png') }}" alt="Image Not Found!"></a>
                                <ul class="position-absolute quick-meta">
                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-3">
                                <h5 class="listing-title"><a href="property-single-v1.html">New Yourk City Appartment</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 3 Industrial Road, Boston, MA 5502, USA</span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>7 Bed</li>
                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>5 Bath</li>
                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                </ul>
                                <div class="agent">
                                    <ul class="d-flex justify-content-between">
                                        <li><span>Realtors</span><div class="text-dark">Albart Rone</div></li>
                                        <li><span>Status</span><div class="text-dark">For Rent</div></li>
                                        <li><span>Time</span><div class="text-dark">7/4/2021</div></li>
                                    </ul>
                                </div>
                                <div class="entry-footer">
                                    <span class="listing-price">$11250<small>( Monthly )</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="property-grid-5 property-block rounded border transation-this bg-white hover-shadow">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                <a href="#" class="listing-ctg text-white"><span>Appartment</span></a>
                                <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-4.png') }}" alt="Image Not Found!"></a>
                                <ul class="position-absolute quick-meta">
                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-3">
                                <h5 class="listing-title"><a href="property-single-v1.html">New Yourk City Appartment</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 3 Industrial Road, Boston, MA 5502, USA</span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>7 Bed</li>
                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>5 Bath</li>
                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                </ul>
                                <div class="agent">
                                    <ul class="d-flex justify-content-between">
                                        <li><span>Realtors</span><div class="text-dark">Albart Rone</div></li>
                                        <li><span>Status</span><div class="text-dark">For Rent</div></li>
                                        <li><span>Time</span><div class="text-dark">7/4/2021</div></li>
                                    </ul>
                                </div>
                                <div class="entry-footer">
                                    <span class="listing-price">$11250<small>( Monthly )</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="property-grid-5 property-block rounded border transation-this bg-white hover-shadow">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                <a href="#" class="listing-ctg text-white"><span>Villa</span></a>
                                <div class="owl-carousel single-carusel dot-disable nav-between-in">
                                    <div class="item">
                                        <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-5.png') }}" alt="Image Not Found!"></a>
                                    </div>
                                    <div class="item">
                                        <a href="property-single-v1.html"><img src="{{ asset('static/assets/images/property_grid/property-grid-4.png') }}" alt="Image Not Found!"></a>
                                    </div>
                                </div>
                                <ul class="position-absolute quick-meta">
                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-3">
                                <h5 class="listing-title"><a href="property-single-v1.html">Small Family House</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 3 Industrial Road, Boston, MA 5502, USA</span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>2 Bed</li>
                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>2 Bath</li>
                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1500 Sqft</li>
                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                </ul>
                                <div class="agent">
                                    <ul class="d-flex justify-content-between">
                                        <li><span>Realtors</span><div class="text-dark">Albart Rone</div></li>
                                        <li><span>Status</span><div class="text-dark">For Rent</div></li>
                                        <li><span>Time</span><div class="text-dark">7/4/2021</div></li>
                                    </ul>
                                </div>
                                <div class="entry-footer">
                                    <span class="listing-price">$3400<small>( Monthly )</small></span>
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
                                    <a class="page-link">Previous Page</a>
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
        <!--============== Property Tab End ==============-->


        <!--=============== Problem solving Section Start ===============-->
        <div class="full-row bg-light" style="padding: 150px 0; background-image: url(static/assets/images/background/vintage-horizin-bg-1.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 order-lg-1 text-white">
                        <span class="tagline mb-1 d-block text-white md-mt-40">Solve Problems</span>
                        <h1 class="mb-40 text-white">Easy and Trusted Progress</h1>
                        <p>Molestie donec curae nostra a natoque sit tellus, varius. Hendrerit netus cursus quam eu ultrices aenean amet quam platea nibh nostra hymenaeos eleifend. Elit gravida Taciti habitasse molestie gravida cras parturient. Fermentum
                            felis nullam viverra dolor. Viverra purus cras mauris</p>
                        <a href="#" class="btn btn-primary mt-5">Get Started <i class="flaticon-rocket flat-mini text-white"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <!--=============== Problem solving Section End ===============-->

        <!--============== Blog Section Start ==============-->
        <div class="full-row bg-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <span class="pb-2 d-table w-50 w-sm-100 text-primary m-auto text-center tagline">Our Learning Centre</span>
                        <h2 class="down-line w-50 w-sm-100 mx-auto text-center mb-5">Gain more insight on About Our Company Activities</h2>
                    </div>
                </div>
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                    <div class="col">
                        <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom">
                            <div class="post-image position-relative overlay-secondary">
                                <img src="{{ asset('static/assets/images/blog/1.png') }}" alt="Image not found!">
                                <div class="position-absolute xy-center">
                                    <div class="overflow-hidden text-center">
                                        <a class="text-white first-push-up transation font-large" href="#">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content p-35">
                                <h5 class="d-block mb-3"><a href="#" class="transation text-dark hover-text-primary font-400">Our latest development projects by develop.</a></h5>
                                <div class="post-meta text-uppercase font-fifteen">
                                    <a href="#"><span>By Robert Haven</span></a>
                                    <a href="#"><span>Dec 25, 2019</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom">
                            <div class="post-image position-relative overlay-secondary">
                                <img src="{{ asset('static/assets/images/blog/2.png') }}" alt="Image not found!">
                                <div class="position-absolute xy-center">
                                    <div class="overflow-hidden text-center">
                                        <a class="text-white first-push-up transation font-large" href="#">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content p-35">
                                <h5 class="d-block mb-3"><a href="#" class="transation text-dark hover-text-primary font-400">Cultivating market leadership from the inside.</a></h5>
                                <div class="post-meta text-uppercase font-fifteen">
                                    <a href="#"><span>By Robert Haven</span></a>
                                    <a href="#"><span>Dec 25, 2019</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom">
                            <div class="post-image position-relative overlay-secondary">
                                <img src="{{ asset('static/assets/images/blog/3.png') }}" alt="Image not found!">
                                <div class="position-absolute xy-center">
                                    <div class="overflow-hidden text-center">
                                        <a class="text-white first-push-up transation font-large" href="#">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content p-35">
                                <h5 class="d-block mb-3"><a href="#" class="transation text-dark hover-text-primary font-400">We are the next generation of the advertise.</a></h5>
                                <div class="post-meta text-uppercase font-fifteen">
                                    <a href="#"><span>By Robert Haven</span></a>
                                    <a href="#"><span>Dec 25, 2019</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Blog Section End ==============-->

        <div class="full-row bg-light">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-1 mb-5">
                    <div class="col mb-5">
                        <h4 class="mb-4">We're empowering the world to build wealth through modern real estate investing.</h4>
                        <p>Residential real estate has proven to be the best long term investment in modern history, providing returns in line with stocks, but with half the volatility. The problem is, the majority of people who want to invest in real estate aren't able to do it. Most people are prevented from participating due to the high initial investment needed for down-payments and the many operational requirements of managing a property.</p> 
                        <p>Our goal is to make real estate investing as simple as investing in stocks or crypto. Diversification is key to any investment strategy, but the barrier to entry for real estate investing has always been so high. We don't believe that should be the case.</p>
                        <p>We're on a mission to make property investing accessible to everyone with strong technical background and legal expertise.</p>
                        <!-- <a href="#" class="btn-link mt-4 d-table">Development Service</a> -->
                    </div>
                    <div class="col">
                        <div class="capability-avg">
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="higlight-font">UI/UX Design</span>
                                <div class="progress bg-white count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent higlight-font"><span class="count-num" data-speed="3000" data-stop="80">0</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="80" aria-valuemax="100"> </div>
                                </div>
                            </div>
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="higlight-font">Java Development</span>
                                <div class="progress bg-white count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent higlight-font"><span class="count-num" data-speed="3000" data-stop="51">0</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="51" aria-valuemax="100"> </div>
                                </div>
                            </div>
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="higlight-font">PHP Programming</span>
                                <div class="progress bg-white count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent higlight-font"><span class="count-num" data-speed="3000" data-stop="95">0</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="95" aria-valuemax="100"> </div>
                                </div>
                            </div>
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="higlight-font">CMS Website</span>
                                <div class="progress bg-white count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent higlight-font"><span class="count-num" data-speed="3000" data-stop="72">0</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="72" aria-valuemax="100"> </div>
                                </div>
                            </div>
                            <div class="bar-progress fact-counter text-secondary position-relative mb-4">
                                <span class="higlight-font">Mobile App</span>
                                <div class="progress bg-white count wow fadeIn" data-wow-duration="0ms">
                                    <div class="skill-percent higlight-font"><span class="count-num" data-speed="3000" data-stop="90">0</span>%</div>
                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="90" aria-valuemax="100"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row row-cols-md-5 row-cols-sm-2 row-cols-2 g-4 ">
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
                                <img src="assets/images/partner/client-4.png" alt="creative template">
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
                                <img src="assets/images/partner/client-7.1.png" alt="creative template">
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="hover-img-upshow overflow-hidden pe-5 d-block">
                                <img src="{{ asset('static/assets/images/partner/client-6.png') }}" alt="creative template">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="row row-cols-xl-4 row-cols-lg-4 row-cols-sm-3 row-cols-1 g-4">
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-1.png') }}" alt="partner logo">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-2.png') }}" alt="partner logo">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-3.png') }}" alt="partner logo">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-4.png') }}" alt="partner logo">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-5.png') }}" alt="partner logo">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-9.png') }}" alt="partner logo">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-8.png') }}" alt="partner logo">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="hover-img-upshow overflow-hidden d-table d-sm-block my-20">
                            <img class="w-auto" src="{{ asset('static/assets/images/partner/client-7.png') }}" alt="partner logo">
                        </a>
                    </div>
                </div> -->
            </div>
        </div>

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
