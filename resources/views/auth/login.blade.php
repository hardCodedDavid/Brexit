@extends('layouts.static')

@section('title', __('Login'))

@section('content')
<div id="page_wrapper" class="bg-light">
        
        @include('components.header')

        <!--============== Signup Form Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 mx-auto">
                        <div class="bg-white xs-p-20 p-30 border rounded">
                            <div class="form-icon-left rounded form-boder">
                                <h4 class="mb-4">User Login</h4>
                                <form  method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row row-cols-1 g-3">
                                        <div class="col">
                                            <label class="mb-2">Username</label>
                                            <input type="text" name="username" class="form-control bg-light" value="" required="">
                                            @error('username')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror 
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Password</label>
                                            <input type="password" name="password" class="form-control bg-light" value="" required="">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror 
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary mb-3">Login</button>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('password.request') }}" class="text-dark d-table py-1">Forgot Password or Username</a>
                                            <a href="{{ route('account.type') }}" class="text-dark d-table py-1"><u>Don't have account? Click here.</u></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Signup Form End ==============-->

        <!--============== Footer Section Start ==============-->
        <footer class="full-row footer-default-dark bg-footer" style="padding-bottom: 30px">
            <div class="container">
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="footer-widget mb-4">
                            <div class="footer-logo mb-4">
                                <a href="#"><img src="{{ asset('static/assets/images/logo/logo-full-white.png') }}" alt="Image not found!" /></a>
                            </div>
                            <p>Risus commodo congue augue phas ellus morbi hymenaeos ante tincidu eu orci dictum bibe ndum lacus pla tea primis mi lacinia</p>
                        </div>
                        <div class="footer-widget media-widget mb-4">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-widget contact-widget mb-4">
                            <h3 class="widget-title mb-4">Contact Info</h3>
                            <ul>
                                <li>Unicoder Design Agency 301 The Greenhouse, Custard Factory, London, E3 8DY.</li>
                                <li>+1 246-345-0695</li>
                                <li>helpline@homex.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-widget footer-nav mb-4">
                            <h3 class="widget-title mb-4">Quick Links</h3>
                            <ul>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Investment Solution</a></li>
                                <li><a href="#">Frequenly Ask Question</a></li>
                                <li><a href="#">How It Work</a></li>
                                <li><a href="#">Become a Member</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-widget newslatter-widget mb-4">
                            <h4 class="widget-title mb-4">Appointment</h4>
                            <p>Litora ligula dapibus scelerisque vitae, fermentum aenean gravida lobortis mus pulvinar magna turient primis.</p>
                            <a href="#" class="btn btn-primary w-100">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--============== Footer Section End ==============-->

        <!--============== Copyright Section Start ==============-->
        <div class="copyright bg-footer text-default py-4">
            <div class="container">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <span class="text-white">© 2022 Uniland All right reserved</span>
                    </div>
                    <div class="col">
                        <ul class="line-menu float-end list-color-gray">
                            <li><a href="#">Privacy & Policy </a></li>
                            <li>|</li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Copyright Section End ==============-->

        <!-- Scroll to top -->
        <a href="#" class="text-general scroll-top-vertical xs-mx-none" id="scroll">Scroll to top</a>
        <!-- End Scroll To top -->
    </div>
@endsection
