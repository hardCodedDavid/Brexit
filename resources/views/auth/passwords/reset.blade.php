@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content')
<div class="c-card u-mb-xsmall">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: white">
        <img style="width:80%" src="{{ asset('brexits-asset-logo-only.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">RESET YOUR PASSWORD</h1>
    </header>
    <form class="c-card__body" method="post" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Email</label> 
            <input class="c-input" type="text" name="email" value="{{ $email ?? old('email') }}" id="input1"> 
            @error('email')
            <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror 
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Password</label> 
            <input class="c-input" type="password" name="password"> 
            @error('password')
                <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror 
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Confirm Password</label> 
            <input class="c-input" type="password" name="password_confirmation"> 
        </div>
        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit" style="background: #CC2B22;">Reset Password</button>
    </form>
</div>
@endsection
