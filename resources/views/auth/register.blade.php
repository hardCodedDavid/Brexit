@php
    use Ichtrojan\Location\Models\Country;
@endphp
@extends('layouts.auth')

@section('title', __('Sign Up'))

@section('content')
<div class="c-card u-mb-xsmall">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: #ffffff">
        <img style="width:80%" src="{{ asset('brexits-asset-logo-only.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">GET STARTED</h1><br>
        <div class="u-h3 u-text-mute u-text-small u-text-center" style="text-align: center;">SELECT AN ACCOUNT TYPE</div>
    </header>

    <form class="c-card__body" method="post" action="{{ route('register') }}">
        @csrf
        <a class="c-btn c-btn--secondary c-btn--fullwidth u-mb-small" href="{{route('account.type','indv')}}">Individual</a>
        <a class="c-btn c-btn--secondary c-btn--fullwidth u-mb-small" href="{{route('account.type','minr')}}">Minor</a>
        <a class="c-btn c-btn--secondary c-btn--fullwidth u-mb-small" href="{{route('account.type','cprbdy')}}">Corporate Body</a>
        <a class="c-btn c-btn--secondary c-btn--fullwidth u-mb-small" href="{{route('account.type','othrs')}}">Other Legal Person</a>
    </form>
</div>
<div class="o-line">
    <a class="u-text-mute u-text-small" href="/login"><i class="fa fa-long-arrow-left u-mr-xsmall"></i>Already have an account? Login instead.</a>
</div>
@endsection
