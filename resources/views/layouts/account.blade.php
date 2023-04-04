<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e88ff2635bcbb0c9aaddc6f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

@php
use App\Http\Controllers\Globals as Utils;
$me = Utils::getUser();
@endphp
<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/main.min3661.css?v=2.0') }}">

        @yield('head')
    </head>
    <body class="o-page">
        <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="o-page__sidebar js-page-sidebar">
            <div class="c-sidebar">
                <a class="c-sidebar__brand" href="/home">
                <img class="c-sidebar__brand-img" src="{{ asset('brexits-asset-logo-medium.png') }}" alt="Logo">
                </a>
                <h4 class="c-sidebar__title">Overview</h4>
                <ul class="c-sidebar__list">
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('overview')" href="/home">
                        <i class="fa fa-home u-mr-xsmall"></i>Overview
                        </a>
                    </li>
                </ul>
                <h4 class="c-sidebar__title">My Investments</h4>
                <ul class="c-sidebar__list">
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('investnow')" href="/invest-noww">
                        <i class="fa fa-dollar u-mr-xsmall"></i> Properties
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('transfer')" href="/transfer">
                        <i class="fa fa-repeat u-mr-xsmall"></i>Inter Account Transfer
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('transfer-trx')" href="/transfer-transactions">
                            <i class="fa fa-repeat u-mr-xsmall"></i>Inter Account Transactions
                        </a>
                    </li>
                    <!--<li class="c-sidebar__item">-->
                    <!--    <a class="c-sidebar__link" href="#">-->
                    <!--    <i class="fa fa-calendar u-mr-xsmall"></i>Recurring-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="c-sidebar__item">-->
                    <!--    <a class="c-sidebar__link" href="#">-->
                    <!--    <i class="fa fa-shopping-cart u-mr-xsmall"></i>Sell-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="c-sidebar__item">-->
                    <!--    <a class="c-sidebar__link" href="#">-->
                    <!--    <i class="fa fa-comments-o u-mr-xsmall"></i>New ETF Listings-->
                    <!--    </a>-->
                    <!--</li>-->
                </ul>
                <h4 class="c-sidebar__title">My Funds</h4>
                <ul class="c-sidebar__list">
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('deposits')" href="/deposit">
                        <i class="fa fa-arrow-right u-mr-xsmall"></i>Deposits
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('withdrawals')" href="/withdrawals">
                        <i class="fa fa-arrow-left u-mr-xsmall"></i>Withdrawals
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('card')" href="/credit-card">
                        <i class="fa fa-credit-card u-mr-xsmall"></i>Manage Credit Card
                        </a>
                    </li>
                </ul>
                <h4 class="c-sidebar__title">My Vouchers</h4>
                <ul class="c-sidebar__list">
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('statements')" href="/statements">
                        <i class="fa fa-mouse-pointer u-mr-xsmall"></i>Statements
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('transactions')" href="/transactions">
                        <i class="fa fa-file-text-o u-mr-xsmall"></i>Transaction History
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <main class="o-page__content">
            <header class="c-navbar u-mb-medium">
                <button class="c-sidebar-toggle js-sidebar-toggle">
                <span class="c-sidebar-toggle__bar"></span>
                <span class="c-sidebar-toggle__bar"></span>
                <span class="c-sidebar-toggle__bar"></span>
                </button>
                <h2 class="c-navbar__title u-mr-auto">@yield('page')</h2>
                <div class="c-dropdown dropdown">
                    <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="c-avatar__img" src="{{ asset('brexits-user-avatar-2.png') }}" alt="User's Profile Picture">
                    </a>
                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                        <a class="c-dropdown__item dropdown-item" href="/edit_profile">Edit Profile</a>
                        <a class="c-dropdown__item dropdown-item" href="/edit_profile#nav-identity">Identity/KYC Doc</a>
                        {{-- <a class="c-dropdown__item dropdown-item" href="/edit_profile#nav-tax">TAX info</a> --}}
                        <a class="c-dropdown__item dropdown-item" href="/password/reset">Reset Password</a>
                        <a class="c-dropdown__item dropdown-item" href="/logout">Logout</a>
                    </div>
                </div>
            </header>
            <div class="container">
                @if(auth()->user()->status == null)
                <div class="row">
                    <div class="col-12">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content">
                                   <p style="color:darkred;text-align: center; font-size: 1.15em;">
                                       Thank you, we just need a few more details to get your account set up. Once you’ve completed the Personal Info, Address Info and Identity/KYC tabs, you should be ready to start investing. You can also complete your Tax and Bank info now, otherwise leave these for later. Our support team will gladly assist at {{\App\Settings::first() ? \App\Settings::first()->email : ''}} if there are any issues with verification of your identity.
                                   </p>
                                </div>
                            </div>
                    </div>

                </div>
                @elseif(auth()->user()->isWaitingApproval())
                    <div class="row">
                        <div class="col-12">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content text-center">
                                    <p style="color:darkgreen;font-size: 1.15em;">
                                        Your Account is pending admin approval.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    @else
                @endif
                <div class="row">
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <a href="">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content">
                                    <h6 class="c-state-card__number u-h3">BREXITS Unit Trust</h6>
                                    <p class="c-state-card__meta">Your funds to invest <span class="u-text-danger">${{ number_format(Utils::getInvestmentSum('brexist-trust-funds'),2) }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <a href="">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content">
                                    <h6 class="c-state-card__number u-h3">Tax Free Savings Account</h6>
                                    <p class="c-state-card__meta">Your funds to invest <span class="u-text-danger">${{ number_format(Utils::getInvestmentSum('tax-free-savings-account'),2) }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <a href="">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content">
                                    <h6 class="u-h3 c-state-card__number">Offshore Account </h6>
                                    <p class="c-state-card__meta">Your funds to invest <span class="u-text-danger">${{ number_format(Utils::getInvestmentSum('offshore-account'),2) }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                @if(session()->has('message'))
                    {!! session()->get('message') !!}
                @endif
                @yield('content')

                    <div class="row">
                        <div class="col-12">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content">
                                    <p style="text-align: center; font-size: 12px">
                                        Brexits Managers (RF) (Pty) Ltd (Brexits) a registered and approved Manager in Collective Investment Schemes in Securities and an authorised financial services provider in terms of the FAIS. Collective investment schemes are generally medium- to long-term investments. Unit Trusts and ETFs the investor essentially owns a “proportionate share” (in proportion to the participatory interest held in the fund) of the underlying investments held by the fund. With Unit Trusts, the investor holds participatory units issued by the fund while in the case of an ETF, the participatory interest, while issued by the fund, comprises a listed security traded on the stock exchange. ETFs are index tracking funds, registered as a Collective Investment and can be traded by any stockbroker on the stock exchange or via Investment Plans and online trading platforms. ETFs may incur additional costs due to it being listed on the JSE. Past performance is not necessarily a guide to future performance and the value of investments / units may go up or down. A schedule of fees and charges, and maximum commissions are available on the Minimum Disclosure Document or upon request from the Manager. Collective investments are traded at ruling prices and can engage in borrowing and scrip lending. Should the respective portfolio engage in scrip lending, the utility percentage and related counterparties can be viewed on the ETF Minimum Disclosure Document. The Manager does not provide any guarantee either with respect to the capital or the return of a portfolio. The index, the applicable tracking error and the portfolio performance relative to the index can be viewed on the ETF Minimum Disclosure Document and or on the Brexits website.
                                        Performance is based on NAV to NAV calculations of the portfolio. Individual performance may differ to that of the portfolio as a result of initial fees, actual investment date, dividend withholding tax and income reinvestment date. The reinvestment of income is calculated based on actual distributed amount and factors such as payment date and reinvestment date must be considered.
                                        * Note exchange prices are delayed in accordance with regional exchange rules. South African prices are delayed by 15 minutes; North American prices are delayed by 15 minutes; Australian prices are delayed by 20 minutes.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
        </main>
        <script src="{{ asset('js/main.min3661.js?v=2.0') }}"></script>


        @yield('foot')
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
