@php

@endphp

<div class="container">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: red; top:60px">
            <img src="{{ asset('brexits-platform-logo-2.png') }}">
        </a>
        <!-- <h1 class="u-h3 u-text-center u-mb-zero">Create Individual Account</h1> -->
        <h1 class="u-h3 u-text-center u-mb-zero">Create an Account</h1>
    </header>
    <form action="{{route('register.indv')}}" method="POST">
        @csrf

        <input type="hidden" name="plan" value="{{$type}}">

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-10 offset-md-1">
                        <div class="form-row">
                            <div class="row u-mb-small">
                                <div class="col-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">First name <small class="u-text-danger">*</small></label>
                                        <input class="c-input" type="text" name="firstname" value="{{ old('firstname') }}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Surname <small class="u-text-danger">*</small></label>
                                        <input class="c-input" type="text" name="lastname" value="{{ old('firstname') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-6">
                                    <label class="c-field__label">Email Address <small class="u-text-danger">*</small></label>
                                    <input class="c-input" type="email" name="email" required="">
                                    @error('email')
                                    <small class="u-block u-text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- <div class="col-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Gender <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="gender" required="">
                                            <option value="">Please select....</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div> -->
                            <!-- </div>

                            <div class="row u-mb-small"> -->
                                <!-- <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country of Residence <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="countryR" required="">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Nationality <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="countryN" required="">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Username</label>
                                        <input class="c-input" type="text" name="username" required="">
                                        @error('username')
                                        <small class="u-block u-text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Password</label>
                                        <input class="c-input" type="password" name="password" required="">

                                        @error('password')
                                        <small class="u-block u-text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Retype Password</label>
                                        <input class="c-input" type="password" name="password_confirmation" required="">
                                        @error('password')
                                        <small class="u-block u-text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Security Question <small class="u-text-danger">*</small></label>
                                        <select class="c-select has-search" name="securityQ" required="">
                                            <option value="">Please Select...</option>
                                            <option value="What is the name of your pet?">What is the name of your pet?</option>
                                            <option value="What is your mother&#39;s maiden name? ">What is your mother&#39;s maiden name?</option>
                                            <option value="What is the name of your birth city/town?">What is the name of your birth city/town?</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Security Answer <small class="u-text-danger">*</small></label>
                                        <input class="c-input" type="text" name="SecurityQuestionAnswer_" required="">
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p class="u-mb-medium">I hereby confirm *</p>

                        <ol class="u-mb-medium">
                            <li class="u-mb-small"><p>1. This is an online trading platform and all communications will be done electronically. I agree to receive all communications via email.</p></li>
                            <li class="u-mb-small"><p>2. I have read, understood, and agreed to be bound by ALL the Terms and Conditions as set out in the {{env('APP_NAME')}} website and all related platforms, products and services.</p></li>
                            <li class="u-mb-small"><p>3. I am of legal age in the country in which I reside and confirm that all the details given in this form are correct. I will inform {{env('APP_NAME')}} in writing if there are any changes to these details.</p></li>
                            <li class="u-mb-small"><p>4. I confirm that I will trade only in my own name and will not use this account to trade on behalf of another individual.</p></li>
                            <li class="u-mb-small"><p>5. I confirm that I am liable for all costs set out in the Cost Profile published on the website (open to edits). I agree to meet my payment obligations and all other terms applicable to my Account as set out in the Cost Profile.</p></li>
                        </ol>

                        <div class="c-choice c-choice--checkbox">
                            <input class="c-choice__input" id="checkbox1" name="remember" type="checkbox" required>
                            <label class="c-choice__label" for="checkbox1">I confirm</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="u-flex u-justify-end u-mb-medium">
            <!-- <button> -->
            <button class="c-btn c-btn--success" type="submit">Register</button>
        </div>
    </form>

</div>
