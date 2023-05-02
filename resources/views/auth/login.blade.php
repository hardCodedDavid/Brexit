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
    </div>
@endsection
