@php

@endphp



<div id="page_wrapper" class="bg-light">

        @include('components.header')

        <!--============== Signup Form Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="bg-white xs-p-20 p-30 border rounded">
                            <h4 class="mb-4 down-line">Registration</h4>
                            <div class="form-icon-left form-boder">
                                <form action="{{route('register.indv')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="plan" value="{{$type}}">

                                    <div class="row row-cols-1 g-3">
                                        <div class="col">
                                            <label class="mb-2">First Name</label>
                                            <input type="text" class="form-control bg-light" name="firstname" value="{{ old('firstname') }}" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Surname</label>
                                            <input type="text" class="form-control bg-light" name="lastname" value="{{ old('lastname') }}" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Username</label>
                                            <input type="text" name="username" class="form-control bg-light" name="username" value="{{ old('username') }}" required="">
                                             @error('username')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Nationality</label>
                                            <select class="form-control bg-light" name="countryN" required="">
                                                @foreach(App\Country::all() as $country)
                                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Email Address</label>
                                            <input type="email" name="email" class="form-control bg-light" value="{{ old('email') }}" required="">
                                            @error('email')
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
                                            <label class="mb-2">Re-enter Password</label>
                                            <input type="password" name="password_confirmation" class="form-control bg-light" value="" required="">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="custom-check-box-2">
                                                <input class="d-none" type="checkbox" value="" id="defaultCheck1" name="remember">
                                                <label for="defaultCheck1">Accept Terms and Conditions</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary mb-3">Sign Up Now</button>
                                        </div>
                                        <div class="col">
                                            <a href="terms-and-condition.html" class="btn-link text-dark">View Terms and Condition</a>
                                            <a href="signin.html" class="text-dark d-table py-1"><u>I already have account.</u></a>
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
