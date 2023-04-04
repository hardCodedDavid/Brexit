@extends('layouts.auth')

@section('title', __('Verify Your Email Address'))

@section('content')
<div class="c-card u-mb-xsmall">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: red">
        <img src="{{ asset('brexits-platform-logo-2.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">Verify Your Email Address</h1>
    </header>
    <form class="c-card__body" method="post" action="{{ route('verification.resend') }}">
        @csrf
        <div class="c-alert c-alert--success">
        <i class="c-alert__icon fa fa-check-circle"></i> {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">{{ __('click here to request another') }}</button>
    </form>
</div>
@endsection
