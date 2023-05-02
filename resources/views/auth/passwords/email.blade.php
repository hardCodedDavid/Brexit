@extends('layouts.static')

@section('title', __('Forget Password'))

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
                                <h4 class="mb-4">PASSWORD RECOVERY</h4>
                                <form  method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    @if (session('status'))
                                        <div class="c-alert c-alert--success">
                                        <i class="c-alert__icon fa fa-check-circle"></i> {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="row row-cols-1 g-3">
                                        <div class="col">
                                            <label class="mb-2">Email</label>
                                            <input type="text" name="email" class="form-control bg-light" value="" required="">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror 
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary mb-3">Send Reset Link</button>
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