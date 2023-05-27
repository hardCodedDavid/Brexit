@extends('layouts.static')

@section('title', __('FAQ'))

@section('content')

<div id="page_wrapper" class="bg-light">
        
    @include('components.header')

    <!--============== Page Banner Start ==============-->
    <div class="page-banner-simple bg-secondary py-50" style="background-image: url({{ asset('static/works/001.jpg') }}); background-repeat: no-repeat; background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="banner-title text-white">Frequently Asked Question</h3>
                    <span class="banner-tagline font-medium text-white">We make strategies, design & development.</span>
                </div>
            </div>
        </div>
    </div>
    <!--============== Page Banner End ==============-->

    <!--============== Faqs Start ==============-->
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block">Who legally has ownership of the house?</span>
                        <div class="panel" style="">
                            <p>
                                When you purchase shares in an Vantage Horizon home offering, you directly buy
                                ownership in the individual Series of a Series LLC that owns that home asset. For example, if you
                                purchase 1% of the shares in a single home offering, you would then be entitled to 1% of the
                                economic interests of the asset over time, which may include income from rent or property value
                                appreciation.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> Will I have any responsibilities for managing properties I invest in? If not, who is responsible? </span>
                        <div class="panel">
                            <p>
                                No, Vantage Horizon takes care of all the homeownership responsibilities, including the
                                selection, purchase, and renovation of the home or vacation rental, as well as finding tenants,
                                managing bookings, and dealing with maintenance requests. Vantage Horizon works with
                                experienced property managers that take care of the day-to-day management responsibility – our
                                property managers have many years of experience, which allows them to maximize returns and
                                minimize operating costs.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> What is the minimum Initial Investment?</span>
                        <div class="panel">
                            <p> 
                                Our mission at Vantage Horizon is to make investing in rental homes accessible to
                                everyone. As such, the minimum amount required to invest is just $500 USD.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block">What happens if I want to liquidate my investment before the holding period ends?</span>
                        <div class="panel">
                            <p>
                                We’ve designed Vantage Horizon offerings for investors who want to invest in real estate
                                for several years to maximize return potential. We understand that plans change, and some
                                investors may want to liquidate their investments after a shorter period. We are working on a
                                program that, subject to the compliance and transfer restrictions described in our Offering Circular,
                                would allow investors to request to redeem their shares and liquidate their investments. Disclaimer:
                                There may be penalties associated with redeeming shares depending on when the request is made.
                                We cannot guarantee that any redemptions will be possible.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============== Faqs End ==============-->
</div>

@endsection

