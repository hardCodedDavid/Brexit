@extends('layouts.auth')

@section('title', __('Login'))

@section('content')
<div class="c-card u-mb-xsmall">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: white; " >
        <img style="width:80%" src="{{ asset('brexits-asset-logo-only.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">BREXITS ASSET MANAGEMENT</h1>
    </header>
    <form class="c-card__body" method="post" action="{{ route('login') }}">
        @csrf
        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Username</label> 
            <input class="c-input" type="text" name="username" id="input1"> 
            @error('username')
            <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror 
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input2">Password</label> 
            <input class="c-input" type="password" name="password" id="input2" placeholder=""> 
            @error('password')
                <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror 
        </div>
        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit"  style="background: #CC2B22;">Sign in</button>
    </form>
</div>
<div class="o-line">
    <a class="u-text-mute u-text-small" href="https://brexitsassetmanagement.com"><i class="fa fa-long-arrow-left u-mr-xsmall"></i>Back to Homepage </a><a class="u-text-mute u-text-small" href="/register"> Create a New Account</a>
    <a class="u-text-mute u-text-small" href="{{ route('password.request') }}">Forgot Password?</a>
</div>
@endsection
