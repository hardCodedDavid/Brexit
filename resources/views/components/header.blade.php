<!--============== Header Section Start ==============-->
        <header class="header-style nav-on-top bg-white">
            <div class="main-nav xs-p-0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-expand-lg nav-secondary nav-primary-hover nav-line-active">
                                <a class="navbar-brand" href="{{ route('home') }}"><img class="nav-logo" src="{{ asset('static/assets/images/logo/logo2.png') }}" alt="Image not found !"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon flaticon-menu flat-small text-primary"></span>
                                  </button>
                                <div class="collapse navbar-collapse sm-ml-0" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('home') }}">Home</a>
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