@extends('layouts.admin_auth')

@section('title', __('Admin Login'))

@section('content')
    <h1 class="">Log In to <a href="/"><span class="brand-name">BREXITS</span></a></h1>
    <form class="text-left" method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="form">
            <div id="email-field" class="field-wrapper input">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="" value="">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
            <div id="password-field" class="field-wrapper input mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
            <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper toggle-pass">
                    <p class="d-inline-block">Show Password</p>
                    <label class="switch s-primary">
                    <input type="checkbox" id="toggle-password" class="d-none">
                    <span class="slider round"></span>
                    </label>
                </div>
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                </div>
            </div>
            <div class="field-wrapper text-center keep-logged-in">
                <div class="n-chk new-checkbox checkbox-outline-primary">
                    <label class="new-control new-checkbox checkbox-outline-primary">
                    <input type="checkbox" class="new-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="new-control-indicator"></span>Keep me logged in
                    </label>
                </div>
            </div>
            <div class="field-wrapper">
                <a href="{{ route('admin.password.request') }}" class="forgot-pass-link">Forgot Password?</a>
            </div>
        </div>
    </form>
@endsection
