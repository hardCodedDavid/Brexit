@php
use App\Http\Controllers\Globals as Utils;
$me = Utils::getAdmin();
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
		<title>@yield('title')</title>
		<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
		<script src="{{ asset('assets/js/loader.js') }}"></script>
		<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
		<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('lineicons/LineIcons.min.css') }}" rel="stylesheet">
		@yield('head')
	</head>
	<body>
        <div id="load_screen">
            <div class="loader">
                <div class="loader-content">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 792 723" style="enable-background:new 0 0 792 723;" xml:space="preserve">
                        <g>
                            <g>
                                <path class="st0" d="M213.9,584.4c-47.4-25.5-84.7-60.8-111.8-106.1C75,433.1,61.4,382,61.4,324.9c0-57,13.6-108.1,40.7-153.3 S166.5,91,213.9,65.5s100.7-38.2,159.9-38.2c49.9,0,95,8.8,135.3,26.3s74.1,42.8,101.5,75.7l-85.5,78.9 c-38.9-44.9-87.2-67.4-144.7-67.4c-35.6,0-67.4,7.8-95.4,23.4s-49.7,37.4-65.4,65.4c-15.6,28-23.4,59.8-23.4,95.4 s7.8,67.4,23.4,95.4s37.4,49.7,65.4,65.4c28,15.6,59.7,23.4,95.4,23.4c57.6,0,105.8-22.7,144.7-68.2l85.5,78.9 c-27.4,33.4-61.4,58.9-102,76.5c-40.6,17.5-85.8,26.3-135.7,26.3C314.3,622.7,261.3,809.9,213.9,584.4z"/>
                            </g>
                            <circle class="st1" cx="375.4" cy="322.9" r="100"/>
                        </g>
                        <g>
                            <circle class="st2" cx="275.4" cy="910" r="65"></circle>
                            <circle class="st4" cx="475.4" cy="910" r="65"></circle>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <div class="header-container fixed-top">
            <header class="header navbar navbar-expand-sm">
                <ul class="navbar-item theme-brand flex-row  text-center">
                    <!--<li class="nav-item theme-logo">
                        <a href="/">
                        <img src="{{ asset('brexits-asset-logo-large-inverse.png') }}" class="navbar-logo" alt="logo">
                        </a>
                    </li>-->
                    <li class="nav-item theme-text">
                        <a href="/" class="nav-link"> <img src="{{ asset('brexits-asset-logo-large-inverse.png') }}" width="160" class="navbar-logo" alt="logo"> </a>
                    </li>
                </ul>
                <ul class="navbar-item flex-row ml-md-auto">
                    <li class="nav-item dropdown user-profile-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{ Gravatar::get($me->email) }}" alt="avatar">
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="">
                                <div class="dropdown-item">
                                    <a href="/admin/logout">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
                @yield('breadcrumb')
            </header>
        </div>
        <!--  END NAVBAR  -->
        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>
            <div class="sidebar-wrapper sidebar-theme">
                <nav id="sidebar">
                    <div class="shadow-bottom"></div>
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu">
                            <a href="/admin/home" data-active="@yield('dashboard')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-home"></i>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="/admin/users" data-active="@yield('users')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-users"></i>
                                    <span>User</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="/admin/investments" data-active="@yield('investments')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-dollar"></i>
                                    <span>Investments</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="/admin/property" data-active="@yield('property')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-home"></i>
                                    <span>Property</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{route('allPortfolio')}}" data-active="@yield('portfolio')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-home"></i>
                                    <span>Portfolio</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="/admin/static" data-active="@yield('static')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-pie-chart"></i>
                                    <span>Static Funds</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="#app" data-toggle="collapse" data-active="@yield('funds')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-wallet"></i>
                                    <span>Funds</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
                                <li>
                                    <a href="/admin/transactions"> Transactions </a>
                                </li>
                                <li>
                                    <a href="/admin/payouts"> Payouts  </a>
                                </li>
                                <li>
                                    <a href="/admin/deposits"> Deposits </a>
                                </li>

                                <li>
                                    <a href="/admin/transfers"> Transfers </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu">
                            <a href="/admin/settings" data-active="@yield('investments')" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="lni-dollar"></i>
                                    <span>Settings</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                	@if(session()->has('message'))
                        {!! session()->get('message') !!}
                    @endif
                    <div class="row layout-top-spacing">
                        @yield('content')
                    </div>
                </div>
                <div class="footer-wrapper">
                    <div class="footer-section f-section-1">
                        <p class="">Copyright © 2020 <a target="_blank" href="/">BREXITS</a></p>
                    </div>
                </div>
            </div>
        </div>
		<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('assets/js/app.js') }}"></script>
		<script>
			$(document).ready(function() {
			    App.init();
			});
		</script>
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		@yield('foot')
	</body>
</html>
