@extends('layouts.static')

@section('title', __('Properties'))

@section('content')



<div id="page_wrapper" class="bg-light">

@include('components.header')

        <!--============== Page title Start ==============-->
        <div class="full-row py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-secondary">Properties</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 bg-transparent p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Properties</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Page title End ==============-->

        <!--============== Property Grid View Start ==============-->
        <div class="full-row pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="listing-sidebar">
                            <div class="widget advance_search_widget">
                                <h5 class="mb-30">Search Property</h5>
                                <form class="rounded quick-search form-icon-right" action="#" method="post">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword...">
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control">
                                                <option>Property Types</option>
                                                <option>House</option>
                                                <option>Office</option>
                                                <option>Appartment</option>
                                                <option>Condos</option>
                                                <option>Villa</option>
                                                <option>Small Family</option>
                                                <option>Single Room</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control">
                                                <option>Property Status</option>
                                                <option>For Rent</option>
                                                <option>For Sale</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="location" placeholder="Location">
                                                <i class="flaticon-placeholder flat-mini icon-font y-center text-dark"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="position-relative">
                                                <button class="form-control price-toggle toggle-btn" data-target="#data-range-price">Price <i class="fas fa-angle-down font-mini icon-font y-center text-dark"></i></button>
                                                <div id="data-range-price" class="price_range price-range-toggle w-100">
                                                    <div class="area-filter price-filter">
                                                        <span class="price-slider">
                                                            <input class="filter_price" type="text" name="price" value="0;10000000" />
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control">
                                                <option>Bathrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control">
                                                <option>Garage</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="keyword" placeholder="Min Area">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="keyword" placeholder="Max Area">
                                        </div>
                                        <div class="col-12">
                                            <div class="position-relative">
                                                <button class="form-control text-start toggle-btn" data-target="#aditional-features">Advanced <i class="fas fa-ellipsis-v font-mini icon-font y-center text-dark"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <div id="aditional-features" class="aditional-features visible-static p-5">
                                                <h5 class="mb-3">Aditional Options</h5>
                                                <ul class="row row-cols-1 custom-check-box mb-4">
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">Garage Facility</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck3">
                                                        <label class="custom-control-label" for="customCheck3">Swiming Pool</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck4">
                                                        <label class="custom-control-label" for="customCheck4">Fire Security</label>
                                                    </li>

                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck5">
                                                        <label class="custom-control-label" for="customCheck5">Fire Place Facility</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck6">
                                                        <label class="custom-control-label" for="customCheck6">Play Ground</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck7">
                                                        <label class="custom-control-label" for="customCheck7">Ferniture Include</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck8">
                                                        <label class="custom-control-label" for="customCheck8">Marbel Floor</label>
                                                    </li>

                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck9">
                                                        <label class="custom-control-label" for="customCheck9">Store Room</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck10">
                                                        <label class="custom-control-label" for="customCheck10">Hight Class Door</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck11">
                                                        <label class="custom-control-label" for="customCheck11">Floor Heating System</label>
                                                    </li>
                                                    <li class="col">
                                                        <input type="checkbox" class="custom-control-input hide" id="customCheck12">
                                                        <label class="custom-control-label" for="customCheck12">Garden Include</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--============== Feature Property Widget Start ==============-->
                            <div class="widget property_carousel_widget">
                                <h5 class="mb-30">Feature Property</h5>
                                <div class="single-carusel owl-carousel nav-disable">
                                    <div class="item">
                                        <div class="property-grid-2 property-block transation mb-3">
                                            <div class="overflow-hidden position-relative transation thumbnail-img rounded bg-secondary hover-img-zoom">
                                                <div class="cata position-absolute">
                                                    <span class="sale bg-secondary text-white">For Sale</span>
                                                </div>
                                                <a href="property-single-v1.html"><img src="assets/images/property_grid/property-grid-5.png" alt="Image Not Found!"></a>
                                                <ul class="position-absolute quick-meta">
                                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="post-content py-3">
                                                <div class="post-meta font-small text-uppercase list-color-primary">
                                                    <a href="#" class="listing-ctg"><i class="fa-solid fa-building"></i><span>Villa</span></a>
                                                </div>
                                                <h5 class="listing-title"><a href="property-single-v1.html">Gorgeous Villa Bay View</a></h5>
                                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 2305 Tree Frog Lane Overlandpk</span>
                                                <ul class="d-flex quantity font-fifteen">
                                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>3</li>
                                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>2</li>
                                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                                </ul>
                                                <span class="listing-price">$12000<small> ( Monthly )</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="property-grid-2 property-block transation mb-3">
                                            <div class="overflow-hidden position-relative transation thumbnail-img rounded bg-secondary hover-img-zoom">
                                                <div class="cata position-absolute">
                                                    <span class="sale bg-secondary text-white">For Sale</span>
                                                </div>
                                                <a href="property-single-v1.html"><img src="assets/images/property_grid/property-grid-6.png" alt="Image Not Found!"></a>
                                                <ul class="position-absolute quick-meta">
                                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="post-content py-3">
                                                <div class="post-meta font-small text-uppercase list-color-primary">
                                                    <a href="#" class="listing-ctg"><i class="fa-solid fa-building"></i><span>Appartment</span></a>
                                                </div>
                                                <h5 class="listing-title"><a href="property-single-v1.html">Luxury Condos</a></h5>
                                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 2305 Tree Frog Lane Overlandpk</span>
                                                <ul class="d-flex quantity font-fifteen">
                                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>3</li>
                                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>2</li>
                                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                                </ul>
                                                <span class="listing-price">$1205500 <del>$1210000</del><small> ( Price Only )</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="property-grid-2 property-block transation mb-3">
                                            <div class="overflow-hidden position-relative transation thumbnail-img rounded bg-secondary hover-img-zoom">
                                                <div class="cata position-absolute">
                                                    <span class="sale bg-secondary text-white">For Rent</span>
                                                </div>
                                                <a href="property-single-v1.html"><img src="assets/images/property_grid/property-grid-7.png" alt="Image Not Found!"></a>
                                                <ul class="position-absolute quick-meta">
                                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="post-content py-3">
                                                <div class="post-meta font-small text-uppercase list-color-primary">
                                                    <a href="#" class="listing-ctg"><i class="fa-solid fa-building"></i><span>Appartment</span></a>
                                                </div>
                                                <h5 class="listing-title"><a href="property-single-v1.html">New Developed Condos</a></h5>
                                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 2305 Tree Frog Lane Overlandpk</span>
                                                <ul class="d-flex quantity font-fifteen">
                                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>3</li>
                                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>2</li>
                                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                                </ul>
                                                <span class="listing-price">$17500 <del>$21000</del><small> ( Monthly )</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="property-grid-2 property-block transation mb-3">
                                            <div class="overflow-hidden position-relative transation thumbnail-img rounded bg-secondary hover-img-zoom">
                                                <div class="cata position-absolute">
                                                    <span class="sale bg-secondary text-white">For Rent</span>
                                                </div>
                                                <a href="property-single-v1.html"><img src="assets/images/property_grid/property-grid-8.png" alt="Image Not Found!"></a>
                                                <ul class="position-absolute quick-meta">
                                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="post-content py-3">
                                                <div class="post-meta font-small text-uppercase list-color-primary">
                                                    <a href="#" class="listing-ctg"><i class="fa-solid fa-building"></i><span>Condos</span></a>
                                                </div>
                                                <h5 class="listing-title"><a href="property-single-v1.html">Residensial Appartment</a></h5>
                                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 2305 Tree Frog Lane Overlandpk</span>
                                                <ul class="d-flex quantity font-fifteen">
                                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>3</li>
                                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>2</li>
                                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                                </ul>
                                                <span class="listing-price">$22000 <del>$26200</del><small> ( Monthly )</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="property-grid-2 property-block transation mb-3">
                                            <div class="overflow-hidden position-relative transation thumbnail-img rounded bg-secondary hover-img-zoom">
                                                <div class="cata position-absolute">
                                                    <span class="sale bg-secondary text-white">For Sale</span>
                                                </div>
                                                <a href="property-single-v1.html"><img src="assets/images/property_grid/property-grid-5.png" alt="Image Not Found!"></a>
                                                <ul class="position-absolute quick-meta">
                                                    <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                                    <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                                    <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="post-content py-3">
                                                <div class="post-meta font-small text-uppercase list-color-primary">
                                                    <a href="#"><span>Villa</span></a>
                                                </div>
                                                <h5 class="listing-title"><a href="property-single-v1.html">Gorgeous Villa Bay View</a></h5>
                                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> 2305 Tree Frog Lane Overlandpk</span>
                                                <ul class="d-flex quantity font-fifteen">
                                                    <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>3</li>
                                                    <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>2</li>
                                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                                    <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                                </ul>
                                                <span class="listing-price">$12000 <del>$15000</del><small> ( Monthly )</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--============== Feature Property Widget End ==============-->

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
                            <!--============== Recent Property Widget End ==============-->
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7 order-lg-1">
                        <div class="row">
                            <div class="col">
                                <div class="woo-filter-bar p-3 d-flex flex-wrap justify-content-between">
                                    <div class="d-flex flex-wrap">
                                        <form class="woocommerce-ordering" method="get">
                                            <select name="orderby1">
                                                <option>Any Status</option>
                                                <option>For Rent</option>
                                                <option>For Sale</option>
                                            </select>
                                            <select name="orderby2">
                                                <option>Default</option>
                                                <option>Most Popular</option>
                                                <option>Top Rated</option>
                                                <option>Newest Items</option>
                                                <option>Price low to high</option>
                                                <option>Price hight to low</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="d-flex">
                                        <span class="woocommerce-ordering-pages me-4 font-fifteen">Showing at 15 result of 15933 Property</span>
                                        <form class="view-category" method="get">
                                            <button title="List" class="list-view" value="list" name="display" type="submit"><i class="flaticon-grid-1 flat-mini"></i></button>
                                            <button title="Grid" class="grid-view active" value="grid" name="display" type="submit"><i class="flaticon-grid flat-mini"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 g-4">
                        @foreach($plans as $property)
                            <div class="col">
                                <!-- Property Grid -->
                                <div class="property-list-2 p-2 bg-white property-block border transation-this hover-shadow">
                                    <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                        <div class="cata position-absolute"><span class="sale bg-secondary text-white">{{ $property->type }}</span></div>
                                        {{-- <div class="owl-carousel single-carusel dot-disable nav-between-in"> --}}
                                            <div class="item">
                                                <a href="property-single-v1.html"><img src="{{ $property->property_img }}" alt="Image Not Found!"></a>
                                            </div>
                                        {{-- </div> --}}
                                        {{-- <a href="#" class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>Apartment</span></a> --}}
                                        <ul class="position-absolute quick-meta">
                                            <li><a href="#" title="Add Compare"><i class="flaticon-transfer flat-mini"></i></a></li>
                                            <li><a href="#" title="Add Favourite"><i class="flaticon-like-1 flat-mini"></i></a></li>
                                            <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="property_text px-3">
                                        <span class="listing-price">${{ number_format($property->price, 2) }}<small> ( Monthly )</small></span>
                                        <h5 class="listing-title"><a href="property-single-v1.html">{{ $property->name }}</a></h5>
                                         <span class="listing-location"><i class="fas fa-map-marker-alt"></i> {{ $property->location }}</span>
                                        <ul class="d-flex quantity font-fifteen">
                                            <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>5</li>
                                            <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>3</li>
                                            <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1100 Sqft</li>
                                            <li title="Gas"><span><i class="fa-solid fa-fire"></i></span>Yes</li>
                                        </ul>
                                        <p>Beautiful house for residence, very charming green view aroung the building.  <a href="#" class="btn-link">More Info...</a></p>
                                        <div class="d-flex align-items-center post-meta mt-2">
                                            <div class="agent">
                                                <a href="#" class="btn btn-primary">Invest Now <i class="fas fa-arrow-right-long me-1"></i></a>

                                            </div>
                                            <div class="post-date ms-auto"><span>{{ date('Y-F-d', strtotime($property->created_at)) }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
            </div>
        </div>
        <!--============== Property Grid View End ==============-->
        

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
                            <span>Copyright © 2022 Uniland All right reserved</span>
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