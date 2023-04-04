@php
    use Ichtrojan\Location\Models\Country;
@endphp
@extends('layouts.auth')

@section('title', __('Sign Up'))

@section('content')
<div class="c-card u-mb-xsmall">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: red">
        <img src="{{ asset('brexits-platform-logo-2.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">Get started by creating an account.</h1>
    </header>

    <form class="c-card__body" method="post" action="{{ route('register') }}">
        @csrf
        <div class="c-field u-mb-small">
            <label class="c-field__label">Plan <small class="u-text-danger">*</small></label>
            <select class="c-select has-search" name="plan" required="">
                <option value="">Please select....</option>
                <option value="individual">Indivdual</option>
                <option value="minor">Minor</option>
                <option value="corporate body">Corporate Body</option>
                <option value="other legal person">Other legal person</option>
            </select>
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">First name <small class="u-text-danger">*</small></label>
            <input class="c-input" type="text" name="firstname" value="{{ old('firstname') }}" required>
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Surname <small class="u-text-danger">*</small></label>
            <input class="c-input" type="text" name="lastname" value="{{ old('firstname') }}" required>
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Email Address <small class="u-text-danger">*</small></label>
            <input class="c-input" type="email" name="email" required="">
            @error('email')
            <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Gender <small class="u-text-danger">*</small></label>
            <select class="c-select" name="gender" required="">
                <option value="">Please select....</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Country of Residence <small class="u-text-danger">*</small></label>
            <select class="c-select" name="countryR" required="">
                @foreach(Country::all() as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Nationality <small class="u-text-danger">*</small></label>
            <select class="c-select" name="countryN" required="">
                @foreach(Country::all() as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Username</label>
            <input class="c-input" type="text" name="username" required="">
            @error('username')
            <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Password</label>
            <input class="c-input" type="password" name="password" required="">
            @error('password')
                <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Retype Password</label>
            <input class="c-input" type="password" name="password_confirmation" required="">
            @error('password')
                <small class="u-block u-text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Security Question <small class="u-text-danger">*</small></label>
            <select class="c-select has-search" name="securityQ" required="">
                <option value="">Please Select...</option>
                <option value="What is the name of your pet?">What is the name of your pet?</option>
                <option value="What is your mother&#39;s maiden name? ">What is your mother&#39;s maiden name?</option>
                <option value="What is the name of your birth city/town?">What is the name of your birth city/town?</option>
            </select>
        </div>
        <div class="c-field u-mb-small">
            <label class="c-field__label">Security Answer <small class="u-text-danger">*</small></label>
            <input class="c-input" type="text" name="SecurityQuestionAnswer_" required="">
        </div>
        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Create Account</button>
    </form>
</div>
<div class="o-line">
    <a class="u-text-mute u-text-small" href="/login"><i class="fa fa-long-arrow-left u-mr-xsmall"></i>Already have an account? Login instead.</a>
</div>
@endsection
