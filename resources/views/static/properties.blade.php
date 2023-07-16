@extends('layouts.static')

@section('title', __('Properties'))

@section('content')
<style>
.text-truncate-container {
    width: 50%;
}
.text-truncate-container p {
    -webkit-line-clamp: 1;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<div id="page_wrapper" class="bg-light">
@include('components.header')
        <!--============== Page title Start ==============-->
        <div class="full-row py-5" style="margin-top: 30px;">
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
                                <form class="rounded quick-search form-icon-right" action="{{ route('search') }}" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword...">
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control" name="type">
                                                <option value="">Property Types</option>
                                                @foreach(['Vacation rental','Web3 properties', 'Single family residential'] as $type)
                                                    <option value="{{ $type }}">{{ ucwords($type) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="location" placeholder="Location">
                                                <i class="flaticon-placeholder flat-mini icon-font y-center text-dark"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" name="min_price" placeholder="Min Price...">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" name="max_price" placeholder="Max Price...">
                                        </div>
                                        {{-- <div class="col-12">
                                            <select class="form-control">
                                                <option>Property Status</option>
                                                <option>For Rent</option>
                                                <option>For Sale</option>
                                            </select>
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
                                        </div> --}}
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-100">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7 order-lg-1">
                        <div class="row">
                            <div class="col">
                                <div class="woo-filter-bar p-3 d-flex flex-wrap justify-content-between">
                                    <div class="d-flex flex-wrap">
                                        {{-- <form class="woocommerce-ordering" method="get">
                                            
                                            <select name="orderby2">
                                                <option>Default</option>
                                                <option>Featured</option>
                                                <option>Top Rated</option>
                                                <option>Newest Items</option>
                                                <option>Price low to high</option>
                                                <option>Price hight to low</option>
                                            </select>
                                        </form> --}}
                                    </div>
                                    <div class="d-flex">
                                        <span class="woocommerce-ordering-pages me-4 font-fifteen">Showing at {{$plans->count()}} results of {{$count}} Property</span>
                                        <form class="view-category" method="get">
                                            {{-- <button title="List" class="list-view" value="list" name="display" type="submit"><i class="flaticon-grid-1 flat-mini"></i></button>
                                            <button title="Grid" class="grid-view active" value="grid" name="display" type="submit"><i class="flaticon-grid flat-mini"></i></button> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-xl-2 row-cols-lg-1 row-cols-md-2 row-cols-1 g-4">
                            @foreach($plans as $property)
                                <div class="col">
                                    <!-- Property Grid -->
                                    <div class="property-grid-1 property-block bg-white transation-this hover-shadow">
                                        <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                            <div class="cata position-absolute"><span class="sale bg-secondary text-white">{{ $property->type }}</span></div>
                                                @php
                                                    $property_img = App\PropertyImage::where('plan_id', $property->id)->get();
                                                @endphp


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

                                            </div>
                                        <div class="property_text p-3">
                                            <span class="listing-price">${{ number_format($property->shares, 2) }}<small> /share</small></span>
                                            <h5 class="listing-title"><a href="{{ route('showProperty', $property->id) }}" target="_blank">{{ $property->name }}</a></h5>
                                            <span class="listing-location"><i class="fas fa-map-marker-alt"></i> {{ $property->location }}</span>
                                            <ul class="d-flex quantity font-fifteen">
                                                <li title="Leverage"><span><i class="fa-solid fa-house"></i></span>{{ $property->rental }}</li>
                                                <li title="Funding Percent"><span><i class="fa-solid fa-percentage"></i></span>{{ $property->funding }}</li>
                                                <li title="Investors"><span><i class="fa-solid fa-users"></i></span>{{ $property->investors }}</li>
                                                <li title="Price"><span><i class="fa-solid fa-money-check-dollar"></i></span>${{ number_format($property->price, 2) }}</li>
                                            </ul>
                                            <style>
                                                .editor-wrapper {
                                                    max-height: 5.2em; /* Three lines with line height */
                                                    overflow: hidden;
                                                    margin-bottom: 20px;
                                                }

                                                .editor-content {
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 3; /* Number of lines to display */
                                                    -webkit-box-orient: vertical;
                                                    overflow: hidden;
                                                }
                                            </style>
                                            <div class="editor-wrapper">
                                                <div class="editor-content">
                                                {{ $property->body }}
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center post-meta mt-2">
                                                <div class="agent">
                                                    <a href="/invest-noww/invest/{{ $property->slug }}" class="btn btn-primary">Invest Now <i class="fas fa-arrow-right-long me-1"></i></a>

                                                </div>
                                                {{-- <div class="post-date ms-auto"><span>{{ date('d M, Y', strtotime($property->created_at)) }}</span></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if($plans->count() == 0)
                                <p class="text-center">No result found</P>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col mt-5">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-dotted-active justify-content-center">
                                        {{ $plans }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Property Grid View End ==============-->
    </div>
@endsection