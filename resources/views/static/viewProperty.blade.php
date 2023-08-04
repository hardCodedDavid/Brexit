@extends('layouts.static')

@section('title', __('Properties'))

@section('content')



<div id="page_wrapper" class="bg-light">

@include('components.header')

@if($property)
<div class="full-row pt-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 order-xl-1 sm-mb-30">
                
                <div class="single-post border summary rounded bg-white p-30 mb-30">
                    <div class="p-10 mb-30" style="max-width: 600px;">
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
                                <div class="carousel-item @if($key==0) active @endif post-image">
                                    <img src="/{{ $image->img_url }}" alt="{{ $image->title }}" class="d-block w-100" alt="...">
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
                    <div class="single-post-title">
                        <span class="d-inline-block text-primary">{{ $property->type }}</span>
                        <h3 class="mb-2 text-secondary">{{ $property->name }}</h3>
                        <ul class="d-flex quantity font-fifteen">
                            <li title="Leverage"><span><i class="fa-solid fa-house"></i></span> {{ $property->rental }}</li>
                            <li title="Shares"><span><i class="fa-solid fa-house-circle-check"></i></span> {{ $property->shares }}</li>
                            <li title="Investors"><span><i class="fa-solid fa-users"></i></span> {{ $property->investors }}</li>
                            <li title="funding"><span><i class="fa-solid fa-money-check-dollar"></i></span> ${{ number_format($property->price, 2) }}</li>
                        </ul>
                    </div>
                        <p>{!! $property->body !!} </p>
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
    </div>
</div>
@endif

@endsection