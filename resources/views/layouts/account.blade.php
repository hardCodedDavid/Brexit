<!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e88ff2635bcbb0c9aaddc6f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> --}}
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

        @stack('styles')

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
                <img class="c-sidebar__brand-img" src="{{ asset('static/assets/images/logo/Vantage-horizon-logo-large.png') }}" alt="Logo">
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
                        <svg class="u-mr-xsmall" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 20H6q-.425 0-.713-.288T5 19v-7H3.3q-.35 0-.475-.325t.15-.55l8.35-7.525q.275-.275.675-.275t.675.275L16 6.6V5q0-.425.288-.713T17 4h1q.425 0 .713.288T19 5v4.3l2.025 1.825q.275.225.15.55T20.7 12H19v7q0 .425-.288.713T18 20h-5v-6h-2v6Zm-4-2h2v-5q0-.425.288-.713T10 12h4q.425 0 .713.288T15 13v5h2v-7.8l-5-4.5l-5 4.5V18Zm3-7.975h4q0-.8-.6-1.313T12 8.2q-.8 0-1.4.513t-.6 1.312ZM10 12h4h-4Z"/></svg>
                        All Properties
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('portfolio')" href="/portfolio-manager">
                        <svg class="u-mr-xsmall" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><rect width="18" height="10" x="3" y="11" rx="2"/><circle cx="12" cy="5" r="2"/><path d="M12 7v4m-4 5h0m8 0h0"/></g></svg>
                        Add Portfolio Manager
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
                        <i class="fa fa-arrow-right u-mr-xsmall"></i>Request Deposit 
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
                <h4 class="c-sidebar__title">History</h4>
                <ul class="c-sidebar__list">
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('statements')" href="/statements">
                        <i class="fa fa-mouse-pointer u-mr-xsmall"></i>Investment
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link @yield('transactions')" href="/transactions">
                        <i class="fa fa-file-text-o u-mr-xsmall"></i>Transaction
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
                    {{-- <img class="c-avatar__img" src="{{ asset('brexits-user-avatar-2.png') }}" alt="User's Profile Picture"> --}}
                    @if($me->user_img)
                        <img class="c-avatar__img" src="{{ $me->user_img }}" alt="Avatar">
                    @else
                        <img class="c-avatar__img" src="{{ asset('brexits-user-avatar-2.png') }}" alt="User's Profile Picture">
                    @endif
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
                                    <h6 class="c-state-card__number u-h3">Individual</h6>
                                    <p class="c-state-card__meta">Available Funds <span class="u-text-danger">${{ number_format(Utils::getInvestmentSum('brexist-trust-funds'),2) }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <a href="">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content">
                                    <h6 class="c-state-card__number u-h3">Entity <p style="font-size: 20px;">(Trust fund, Cooperate)</p></h6>
                                    <p class="c-state-card__meta">Available Funds <span class="u-text-danger">${{ number_format(Utils::getInvestmentSum('tax-free-savings-account'),2) }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <a href="">
                            <div class="c-state-card" data-mh="state-cards">
                                <div class="c-state-card__content">
                                    <h6 class="u-h3 c-state-card__number">Retirement <p style="font-size: 20px;">(Check-book IRA)</p></h6>
                                    <p class="c-state-card__meta">Available Funds <span class="u-text-danger">${{ number_format(Utils::getInvestmentSum('offshore-account'),2) }}</span></p>
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
                                        All right Reserved Vantage Horizon 2023
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

        <script src="{{ asset('js/main.min3661.js?v=2.0') }}"></script>


        @yield('foot')
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
