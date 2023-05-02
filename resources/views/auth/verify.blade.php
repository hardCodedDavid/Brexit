@extends('layouts.static')

@section('title', __('Verify Your Email Address'))

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
                                <h4 class="mb-4">Verify Your Email Address</h4>
                                <form  method="post" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <div class="row row-cols-1 g-3">
                                        <div class="c-alert c-alert--success">
                                            <i class="c-alert__icon fa fa-check-circle"></i> {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary mb-3">{{ __('Click here to request another') }}</button>
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
    </div>
@endsection