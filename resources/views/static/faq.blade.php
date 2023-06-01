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
                        <span class="accordion text-secondary d-block">What is Vantage Horizon?</span>
                        <div class="panel" style="">
                            <p>
                                Vantage Horizon is a way to invest in Real Estate for everyone. Investors can purchase shares of
                                our carefully selected vacation rental properties with just a few simple clicks. Vantage Horizon
                                takes care of everything including buying, renovating, repairing, maintaining, cleaning and listing
                                these properties to maximize their income. Our mission is to reduce entry barriers and help more
                                people earn passive income through vacation rental investing.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block">How does Vantage Horizon make money?</span>
                        <div class="panel" style="">
                        There are two major source of income:
                            <p>
                               - Vantage Horizon makes money by sourcing the top family home, web 3 properties and vacation rental properties. making them ready for rent
                            </p>
                            <p>
                               - Vantage Horizon charges fees for property management and assets management services
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block">Who is Vantage Horizon for?</span>
                        <div class="panel" style="">
                            <p>
                                Vantage Horizon is for everyone. Investing in real estate is historically one of the best ways to
                                build wealth and generate passive income. Our goal is to make family home, web 3 properties
                                and vacation rental properties rental investments accessible to everyone. Investors can spend as
                                little as $500 to buy a short-term rental property the same way they might buy stocks.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block">How does Vantage horizon works?</span>
                        <div class="panel" style="">
                            <p>
                                Vantage Horizon was built with the goal of making property investment process simple and
                                streamlined. It shall take 5 minutes to sign up, create your profile, and complete the first
                                investment. Once the investment is completed, you can just sit back and relax. Our team will take
                                care of all the management work or manage your portfolio individually. Besides the rental
                                dividends return, the investors also have exclusive benefits based on their investment amount.
                            </p>
                        </div>
                    </div>
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
                        <span class="accordion text-secondary d-block">Why should I invest in Vantage Horizon?</span>
                        <div class="panel" style="">
                            <p>
                                1. Different from other real estate investment platforms, Vantage Horizon focuses on family
                                homes, web 3 properties and short term vacation rentals. Which makes it easy for clients
                                to be more diversified.
                            </p>
                            <p>
                                2. We conduct extensive financial analysis and market research on our properties, and also
                                provide the actual Airbnb listing to show investors exactly what they are investing in.
                            </p>
                            <p>
                                3. In contrast to traditional real estate investments like real estate investment trusts (REITs),
                                Vantage Horizon have complete transparency of information. Investors know exactly which
                                property they are investing in and the information about the house is specific to the
                                address of the house and the monthly rental income and expenses of the house.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> Will I lose my investment if Vantage Horizon stops operating? </span>
                        <div class="panel">
                            <p>
                                No, we have structured our investments so they continue to operate even in the event that
                                Vantage Horizon is no longer in operation. Each property is housed in its own standalone series
                                LLC, which has its own bank account, and separate ownership structure.
                            </p>
                            <p>
                                Because the investors own the property directly through the series LLC, your investment will
                                continue to hold value as long as the underlying property retains its value. Vantage Horizon
                                retains no material ownership stake and there is a clear separation between the company and the
                                investment properties. In the unlikely event that Vantage Horizon ceases to operate, we would
                                simply assign a new custodian that would make all major decisions (like what property manager
                                to use, when to liquidate the property, etc.).
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> How are dividends amount determined? </span>
                        <div class="panel">
                            <p>
                                Dividends reflect how much income was left after collecting rent and paying all applicable 
                                expenses.
                                Long term rentals generally have consistent income, expenses, and dividends. Whereas,
                                Vacation rentals will vary based on the performance of the property. For example, some vacation
                                rentals will have higher income during the busy seasons and lower income during the less
                                popular times to visit.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> How is rent determined?  </span>
                        <div class="panel">
                            <p>
                                Vantage Horizon typically acquires homes 10 years old or less, which means because we’re
                                purchasing a newer asset, there is less maintenance, and lower overall costs to operate the
                                property. Our market rent is priced to match the quality of the home and stay competitive to
                                comparable properties in the area. We feel that Vantage homes fill a need for prospective
                                tenants and the price is set to reflect this.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> What fees do investors pay to property managers? </span>
                        <div class="panel">
                            <p>
                                Currently the property management fee for long term rental properties is 7% of the gross rental
                                income.
                                <br>
                                For vacations terms rentals and web 3 properties the property management fee is between
                                9-15% depending on the market, which are specified on each property page.
                                <br>
                                Property managers may also charge one-time expenses for items like lease-ups, renewals, or
                                rehab & turn support.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> Can I cancel my trade? </span>
                        <div class="panel">
                            <p>
                                Instructions on how to cancel a purchase or investment
                                <br>
                                Yes, depending on a few items you can either cancel your trade yourself or you may have to
                                contact support.
                                <br>
                                If your payment has not been completed (ie it does not show settled in your transactions tab)
                                and the property is not yet fully funded, then you can select the trade in the transactions tab and
                                there should be a cancel button. That cancel button will null the trade and if the payment has
                                initiated then the system will refund your payment.
                                <br>
                                If the payment has been completed and the property is already fully funded, then you will need
                                to email us at support@vantagehorizon.com so that we can look into cancelling the trade for you.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> As an investor am I liable if any lawsuits / accidents occur at the property? </span>
                        <div class="panel">
                            <p>
                                No. Each home is owned through a limited liability company structure to protect shareholders
                                from personal liability.
                            </p>
                        </div>
                    </div>
                    <div class="simple-collaps px-4 py-3 bg-white border rounded mb-3">
                        <span class="accordion text-secondary d-block"> How do I get updated on the progress of my investments? </span>
                        <div class="panel">
                            <p>
                                You can access your current account balance by logging into your investment dashboard.
                                Vantage Horizon will periodically update your account balance with the details of your
                                investment value. This includes notifications of estimated earnings from rent payments,
                                estimated appreciation, and any processed Free Cash Flow distributions.
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

