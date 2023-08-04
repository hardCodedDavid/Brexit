<!--============== Header Section Start ==============-->
        <header class="header-style nav-on-top bg-white">
            <div class="main-nav xs-p-0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-expand-lg nav-secondary nav-primary-hover nav-line-active">
                                <a class="navbar-brand" href="{{ route('index') }}"><img class="nav-logo" src="{{ asset('static/assets/images/logo/Vantage-horizon-logo-large.png') }}" alt="Image not found !"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon flaticon-menu flat-small text-primary"></span>
                                  </button>
                                <div class="collapse navbar-collapse sm-ml-0" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('index') }}">Home</a>
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
                                                <li> <a class="dropdown-item" href="{{ route('vacation') }}">Vacation Rental</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('web') }}">Web 3 Properties</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('historical') }}">Historical Performance</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('stakeholder') }}">Stakeholder Commitment</a></li>
                                                {{-- <li> <a class="dropdown-item" href="{{ route('sellHome') }}">Sell Your Home</a></li> --}}
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#">Learn</a>
                                            <ul class="dropdown-menu">
                                                <li> <a class="dropdown-item" href="{{ route('how-it-works') }}">How it works</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('faq') }}">Help & FAQ</a>
                                                <li> <a class="dropdown-item" href="{{ route('learning') }}">Learning Center</a></li>
                                                <li><a class="dropdown-item" href="{{ route('privacy') }}">Privacy Policy</a></li>
                                                <li> <a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
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
                                        <a href="/logout" class="btn">Logout</a>
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