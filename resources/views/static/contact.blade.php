@extends('layouts.static')

@section('title', __('Contact Us'))

@section('content')

<div id="page_wrapper" class="bg-light">

    @include('components.header')
    
    <!--============== Page title Start ==============-->
        <div class="full-row py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-secondary">Contact</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 bg-transparent p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Page title End ==============-->

        <!--============== Contact form Start ==============-->
        <div class="full-row pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 order-md-2">
                        <h4 class="down-line mb-4">Get In Touch</h4>
                        {{-- <p>Nullam vel enim risus. Integer rhoncus hendrerit sem egestas porttitor.</p> --}}
                        <div class="mb-3">
                            <ul>
                                <li class="mb-3">
                                    <h6 class="mb-0">Office Address :</h6> 
                                    308 E 38th St, New York, NY 10016, United States
                                    <br>
                                    308 Clyde St, Glasgow G1 4NP, United Kingdom
                                </li>
                                <li class="mb-3">
                                    <h6>Contact Us :</h6> On the home page, you can schedule a call with our team using the live chat feature
                                </li>
                                <li class="mb-3">
                                    <h6>Email Address :</h6> info@vantagehorizon.com, support@vantagehorizon.com
                                </li>
                            </ul>
                        </div>
                        {{-- <h5 class="mb-2">Career Info</h5>
                        <p>If you’re interested in employment opportunities at Unicoder, please email us:<br> <a href="#">support@unicoderbd.com</a></p> --}}
                    </div>
                    <div class="col-md-7 order-md-1">
                        <h4 class="down-line mb-4">Send Message</h4>
                        <div class="form-simple">
                            <form id="contact-form" action="#" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-6 mb-20">
                                        <label class="mb-2">Full Name:</label>
                                        <input type="text" class="form-control bg-white" name="name" required="">
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label class="mb-2">Your Email:</label>
                                        <input type="email" class="form-control bg-white" name="email" required="">
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label class="mb-2">Subject:</label>
                                        <input type="text" class="form-control bg-white" name="subject" required="">
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label class="mb-2">Message:</label>
                                        <textarea class="form-control bg-white" name="message" rows="8" required=""></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" name="submit" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Contact form End ==============-->

</div>

@endsection