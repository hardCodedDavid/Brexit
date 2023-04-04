@extends('layouts.auth')

@section('title', __('Forget Password'))

@section('content')
<div class="c-card u-mb-xsmall">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: white">
        <img style="width:80%" src="{{ asset('brexits-asset-logo-only.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">PASSWORD RECOVERY</h1>
    </header>
    <form class="c-card__body" method="post" action="{{ route('password.email') }}">
        @csrf
        @if (session('status'))
            <div class="c-alert c-alert--success">
            <i class="c-alert__icon fa fa-check-circle"></i> {{ session('status') }}
            </div>
        @endif
        <div class="c-field u-mb-small">
            <label class="c-field__label">Email</label> 
            <input class="c-input" type="email" name="email" required="" value="{{ old('email') }}"> 
            @error('email')
            <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror 
        </div>
        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit" style="background: #CC2B22;">Send Reset Link</button>
    </form>
</div>
@endsection
