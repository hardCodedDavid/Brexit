@extends('layouts.static')

@section('title', __('Historical Perfoemance'))

@section('content')

<div id="page_wrapper" class="bg-light">
        
        @include('components.header')

        <!--============== Page Banner Start ==============-->
        <div class="page-banner-simple bg-secondary py-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="banner-title text-white">Historical Performance</h3>
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
                        <h2 class="main-title down-line w-50 mx-auto mb-4 w-sm-100">Delivering On Client Investments.</h2>
                        <span class="d-table w-50 w-sm-100 sub-title mx-auto">How have we delivered on client returns? Below, you'll find the current performance of all our properties, hand-picked by our investment team. Rental home returns are obtained both through rental income and property value appreciation.</span>
                            <p></p>
                        <span class="d-table w-50 w-sm-100 sub-title mx-auto">So go ahead - be inspired by The Lierly or emboldened by The Salem. Vantage Horizon aims to provide optimal returns for every client's investment goals.</span>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Property Tab End ==============-->



        <!--============== Statistics Section Start ==============-->
        <div class="full-row pb-0 ba">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
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
                                        <span class="text-secondary h1">$</span><span class="count-num text-secondary h1" data-speed="3000" data-stop="65">39</span><span class="text-secondary h1">+</span>

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
</div>

@endsection