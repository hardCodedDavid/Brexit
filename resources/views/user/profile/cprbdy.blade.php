@php
use App\Http\Controllers\Globals as Utils;
@endphp

<div class="row u-mb-large">
    <div class="col-12">
        <div class="c-tabs">
            <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist" style="width: 100%; overflow-x: scroll">
                <li class="c-tabs__item"><a class="c-tabs__link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal" role="tab" aria-controls="nav-personal" aria-selected="true">Coperate Details</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-address-tab" data-toggle="tab" href="#nav-address" role="tab" aria-controls="nav-address" aria-selected="false">Address Information</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank" role="tab" aria-controls="nav-bank" aria-selected="false">Bank Details</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-tax-tab" data-toggle="tab" href="#nav-tax" role="tab" aria-controls="nav-tax" aria-selected="false">Tax</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-identity-tab" data-toggle="tab" href="#nav-identity" role="tab" aria-controls="nav-identity" aria-selected="false">Authorized Person Identity / KYC</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-guardian-tab" data-toggle="tab" href="#nav-guardian" role="tab" aria-controls="nav-guardian" aria-selected="false">Authorized Person Details</a></li>
            </ul>
            <div class="c-tabs__content tab-content" id="nav-tabContent">
                <div class="c-tabs__pane active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
                    <form action="{{ route('updatePersonalCprBdy') }}" method="post">
                        @csrf
                        <div class="row">
                        <!--<div class="col-lg-2 u-text-center">
								<div class="c-avatar c-avatar--xlarge u-inline-block">
									@if($user->id_card != '')
                            <img class="c-avatar__img" src="{{ asset($user->id_card) }}" alt="Avatar">
									@else
                            <img class="c-avatar__img" src="{{ Gravatar::get($user->email) }}" alt="Avatar">
									@endif
                            </div>
                        </div>-->

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Trade Name *</label>
                                    <input class="c-input" type="text" name="trade_name" value="{{ $user->coporate->tradename }}" readonly="">
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <label class="c-field__label">Registration Date *</label>
                                <div class="c-field has-addon-right u-mb-small">
                                    <input class="c-input" data-toggle="datepicker" name="entityRegistration" id="input-calendar" value="{{$user->coporate->entityRegistration}}" type="text" placeholder="Date Of Entity Registration">
                                    <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Country where Principal Office housed *</label>
                                    <select class="c-select" name="principalCountry">
                                        @foreach(App\Country::all() as $country)
                                            <option value="{{$country->name}}"  {{ ($user->coporate->principalCountry == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Management Country *</label>
                                        <select class="c-select" name="managementCountry">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}" {{ ($user->coporate->managementCountry == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Sector</label>
                                        <select class="c-select" name="sector">
                                            <option value="">Please select....</option>
                                            <option value="Coporate" {{$user->coporate->sector == "Coporate" ? 'selected' : ''}}>Coporate</option>
                                            <option value="State Owned" {{$user->coporate->sector == "State Owned" ? 'selected' : ''}}>State Owned</option>
                                            <option value="Mining" {{$user->coporate->sector == "Mining" ? 'selected' : ''}}>Mining</option>
                                            <option value="Defence" {{$user->coporate->sector == "Defence" ? 'selected' : ''}}>Defence</option>
                                            <option value="Construction" {{$user->coporate->sector == "Construction" ? 'selected' : ''}}>Construction</option>
                                            <option value="Others" {{$user->coporate->sector == "Others" ? 'selected' : ''}}>Others</option>
                                        </select>
                                    </div>
                                </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Registration Type *</label>
                                    <select class="c-select" name="idType">
                                        <option value="id no" {{ ($user->coporate->idType == 'id no')? 'selected': '' }}>ID No.</option>
                                        <option value="passport no" {{ ($user->coporate->idType == 'passport no')? 'selected': '' }}>Passport No.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Registration Number *</label>
                                    <input class="c-input" type="text" name="registrationNumber" value="{{ $user->coporate->registrationNumber }}" required="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Email *</label>
                                    <input class="c-input" type="email" name="email" value="{{ $user->email }}" readonly="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">GIIN</label>
                                    <input class="c-input" type="text" name="giin" value="{{ $user->coporate->giin }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Entity Source of Funds <small class="u-text-danger">*</small></label>
                                    <select class="c-select" name="fundsSource" required="">
                                        <option value="">Please select....</option>
                                        <option value="profits" {{$user->coporate->fundsSource == 'profits' ? 'selected' : ''}}>Profits</option>
                                        <option value="sales" {{$user->coporate->fundsSource == 'sales' ? 'selected' : ''}}>Sales of Shares</option>
                                        <option value="investments" {{$user->coporate->fundsSource == 'investments' ? 'selected' : ''}}>Investments</option>
                                        <option value="cp" {{$user->coporate->fundsSource == 'cp' ? 'selected' : ''}}>Corporate Dividends</option>
                                        <option value="savings" {{$user->coporate->fundsSource == 'savings' ? 'selected' : ''}}>Savings</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- // second tabs -->
                <div class="c-tabs__pane" id="nav-address" role="tabpanel" aria-labelledby="nav-address-tab">
                    <form action="{{ route('updateAddressCprBdy') }}" method="post">
                        @csrf
                        <div class="row">
                            @if($user->coporate->entityRegistration != null)
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Unit number</label>
                                        <input class="c-input" type="text" name="unit_number" value="{{ $user->coporate->businessUnitNumber }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Complex Name</label>
                                        <input class="c-input" type="text" name="complex_name" value="{{ $user->coporate->businessComplexName }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Street Number *</label>
                                        <input class="c-input" type="text" name="street_number" value="{{ $user->coporate->businessStreetNumber }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Street Name *</label>
                                        <input class="c-input" type="text" name="street_name" value="{{ $user->coporate->businessStreetName }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Suburb *</label>
                                        <input class="c-input" type="text" name="suburb" value="{{ $user->coporate->businessSurburb }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">City *</label>
                                        <input class="c-input" type="text" name="city" value="{{ $user->coporate->businessCity }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Postal *</label>
                                        <input class="c-input" type="text" name="businessPostal" value="{{ $user->coporate->businessPostal }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Province *</label>
                                        <input class="c-input" type="text" name="businessProvince" value="{{ $user->coporate->businessProvince }}" required="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country *</label>
                                        <select class="c-select" name="addressCountry">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}" {{ ($user->coporate->addressCountry == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                                </div>
                            @else
                                <div class="u-text-danger u-text-center">Please update your personal details to update this address information</div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- // third tabs -->
                <div class="c-tabs__pane" id="nav-identity" role="tabpanel" aria-labelledby="nav-identity-tab">
                    <form action="{{ route('updateIdentity') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if($user->coporate->businessStreetName != null)
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Passport</label>
                                        <input class="c-input" type="file" name="passport">
                                    </div>

{{--                                    @if($user->id_card)--}}
{{--                                        <img src="{{asset($user->id_card)}}" alt="Id Card" style="width:100%; height:auto;">--}}
{{--                                    @endif--}}
                                </div>

                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Proof of Residence</label>
                                        <input class="c-input" type="file" name="residence_image">
                                    </div>
{{--                                    @if($user->residence_image)--}}
{{--                                        <img src="{{asset($user->residence_image)}}" alt="Id Card" style="width:100%; height:auto;">--}}
{{--                                    @endif--}}
                                </div>

                                <div class="col-lg-12">
                                    <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                                </div>
                            @else
                                <div class="u-text-danger u-text-center">Please update your address information to update Identity / KYC form.</div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- // fifth tabs -->
                <div class="c-tabs__pane" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">
                    <form action="{{ route('updateBankCprBdy') }}" method="post">
                        @csrf
                        <div class="row">
                            @if($user->coporate->businessStreetName != null)
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Bank Name *</label>
                                        <input class="c-input" type="text" name="bank_name" value="{{ $user->coporate->bankName }}" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Account Type *</label>
                                        <input class="c-input" type="text" name="account_type" value="{{ $user->coporate->bankType }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Branch Name *</label>
                                        <input class="c-input" type="text" name="branch_name" value="{{ $user->coporate->bankBranch }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Branch Code *</label>
                                        <input class="c-input" type="text" name="branch_code" value="{{ $user->coporate->bankBranchCode }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Account Number *</label>
                                        <input class="c-input" type="text" name="account_number" value="{{ $user->coporate->bankAccountNumber }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Account Holder *</label>
                                        <input class="c-input" type="text" name="account_holder" value="{{ $user->coporate->bankAccountHolder }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Entity Bank IBAN number</label>
                                        <input class="c-input" id="input1" name="iban" type="text" placeholder="IBAN Number" value="{{$user->coporate->iban}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Entity Bank SWIFT number</label>
                                        <input class="c-input" id="input1" name="swift" type="text" placeholder="Swift Number" value="{{$user->coporate->swift}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Bank Country <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="bank_country" required="">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}" {{$user->coporate->bankCountry == $country->name ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 offset-lg-3">
                                    <span class="c-divider has-text c-divider--small u-mv-medium">Other Details</span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Bitcoin Address</label>
                                        <input class="c-input" type="text" name="bitcoin_address" value="{{ $user->bitcoin_address }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                                </div>
                            @else
                                <div class="u-text-danger u-text-center">Please update your Address to update Bank details form.</div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- // fourth tabs -->
                <div class="c-tabs__pane" id="nav-guardian" role="tabpanel" aria-labelledby="nav-guardian-tab">
                    <form action="{{ route('updateGuardianDetailsCprBdy') }}" method="POST">
                        @csrf
                        @if($user->coporate->businessStreetName != null)
                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">First Name <small class="u-text-danger">*</small></label>
                                        <input class="c-input" id="input1" type="text" value="{{$user->coporate->guardian->firstname}}" readonly placeholder="First Name" name="a_firstname">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Last Name <small class="u-text-danger">*</small></label>
                                        <input class="c-input" id="input1" type="text" placeholder="Last Name" name="a_lastname" readonly value="{{$user->coporate->guardian->lastname}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Preferred Name</label>
                                        <input class="c-input" id="input1" type="text" name="a_preferredName" readonly value="{{$user->coporate->guardian->preferred_name}}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label"> Gender <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="a_gender" required="">
                                            <option value="">Please select....</option>
                                            <option value="male" {{$user->coporate->guardian->gender == 'male' ? 'selected' : ''}}>Male</option>
                                            <option value="female" {{$user->coporate->guardian->gender == 'female' ? 'selected' : ''}}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Authorized Person Date of Birth</label>

                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" name="dob" id="input-calendar" type="text" placeholder="Date Of Birth" value="{{$user->coporate->guardian->dob}}">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label"> Marital Status <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="a_marital" required="">
                                            <option value="married" {{$user->coporate->guardian->maritalStatus == 'married' ? 'selected' : ''}}>Married</option>
                                            <option value="single" {{$user->coporate->guardian->maritalStatus == 'single' ? 'selected' : ''}}>Single</option>
                                            <option value="divorced" {{$user->coporate->guardian->maritalStatus == 'divorced' ? 'selected' : ''}}>Divorced</option>
                                            <option value="widowed" {{$user->coporate->guardian->maritalStatus == 'widowed' ? 'selected' : ''}}>Widowed</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Identification Type<small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="a_idType" required="">
                                            <option value="">Please select....</option>
                                            <option value="sai" {{$user->coporate->guardian->idType == 'sai' ? 'selected' : ''}}>South African Id</option>
                                            <option value="bc" {{$user->coporate->guardian->idType == 'bc' ? 'selected' : ''}}>Birth Certificate</option>
                                            <option value="fp" {{$user->coporate->guardian->idType == 'fp' ? 'selected' : ''}}>Foreign Passport</option>
                                            <option value="fi" {{$user->coporate->guardian->idType == 'fi' ? 'selected' : ''}}>Foreign ID</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Foreign Passport / ID Number </label>
                                        <input class="c-input" id="input1" type="text" name="a_passportNumber" value="{{$user->coporate->guardian->passportNumber}}" placeholder="Passport Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Foreign Passport / ID Country of Issue</label>
                                        <select class="c-select" name="a_passportC">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}" {{$user->coporate->guardian->passportCountry == $country->name ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 u-mb-small">
                                    <label class="c-field__label">Authorized Person Passport Expiry Date</label>
                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" value="{{$user->coporate->guardian->passportExpiry}}" name="a_passportExpiry" id="input-calendar" type="text" placeholder="Guardian Passport Expiry Date">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country of Residence <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="a_countryR" required="">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}" {{$user->coporate->guardian->countryResidence == $country->name ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Citizenship <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="a_countryN" required="">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}" {{$user->coporate->guardian->countryCitizen == $country->name ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Dialing Code <small class="u-text-danger">*</small></label>
                                        <input class="c-input" type="text" name="a_dailingCode" required="" placeholder="Intl. dial code preceded by + (eg. +27)" value="{{$user->coporate->guardian->dialingCode}}">

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Mobile Number <small class="u-text-danger">*</small></label>
                                        <input class="c-input" type="text" name="a_mobileNumber" required="" placeholder="10 digits (eg. 0791234567)" value="{{$user->coporate->guardian->phone}}">
                                    </div>
                                </div>
                            </div>

                            <h3>Address Information</h3>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Unit number</label>
                                        <input class="c-input" type="text" name="unit_number" value="{{ $user->coporate->guardian->businessUnitNumber }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Complex Name</label>
                                        <input class="c-input" type="text" name="complex_name" value="{{ $user->coporate->guardian->businessComplexName }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Street Number *</label>
                                        <input class="c-input" type="text" name="street_number" value="{{ $user->coporate->guardian->businessStreetNumber }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Street Name *</label>
                                        <input class="c-input" type="text" name="street_name" value="{{ $user->coporate->guardian->businessStreetName }}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Suburb *</label>
                                        <input class="c-input" type="text" name="suburb" value="{{ $user->coporate->guardian->businessSurburb }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">City *</label>
                                        <input class="c-input" type="text" name="city" value="{{ $user->coporate->guardian->businessCity }}" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Postal *</label>
                                        <input class="c-input" type="text" name="businessPostal" value="{{ $user->coporate->guardian->businessPostal }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Province *</label>
                                        <input class="c-input" type="text" name="businessProvince" value="{{ $user->coporate->guardian->businessProvince }}" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country *</label>
                                        <select class="c-select" name="addressCountry">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}" {{ ($user->coporate->guardian->addressCountry == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                            </div>

                            @else
                                <div class="u-text-danger u-text-center">Please update your address information to update Identity / KYC form.</div>
                            @endif
                    </form>
                </div>

                <div class="c-tabs__pane" id="nav-tax" role="tabpanel" aria-labelledby="nav-tax-tab">
                    <form action="{{ route('updateTaxCprBdy') }}" method="POST">
                        @csrf
                        <div class="row" style="padding:0 2em">
                            @if($user->coporate->bankName != null)
                                    <div class="col-12 col-md-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Tax Identification Type <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="taxType" required="">
                                                <option value="">Please select....</option>
                                                <option value="sa_tax" {{$user->coporate->taxType == 'sa_tax'? 'selected' : ''}}>SA: Tax Number</option>
                                                <option value="sa_vat" {{$user->coporate->taxType == 'sa_vat'? 'selected' : ''}}>SA: VAT Registration Number</option>
                                                <option value="ss" {{$user->coporate->taxType == 'ss'? 'selected' : ''}}>US: Social Security No. (SSN)</option>
                                                <option value="us_employer" {{$user->coporate->taxType == 'us_employer'? 'selected' : ''}}>US: Employer Identification No. (EIN)</option>
                                                <option value="us_indv" {{$user->coporate->taxType == 'us_indv'? 'selected' : ''}}>US: Individual Taxpayer ID No. (ITIN)</option>
                                                <option value="us_tax" {{$user->coporate->taxType == 'us_tax'? 'selected' : ''}}>US: Tax ID No. Pending US Adoption (ATIN)</option>
                                                <option value="us_preparer" {{$user->coporate->taxType == 'us_preparer'? 'selected' : ''}}>US: Preparer Taxpayer ID No. (PTIN)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label class="c-field__label">Tax Identification Number</label>
                                        <input class="c-input" type="text" name="taxNumber" value="{{$user->coporate->taxNumber}}" required="">
                                    </div>

                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Tax Residence <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="countryTax" required="">
                                                @foreach(App\Country::all() as $country)
                                                    <option value="{{$country->name}}" {{$user->coporate->countryTax == $country->name ? 'selected' : ''}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">VAT Registered? <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="vat" required="">
                                                <option value="">Please select....</option>
                                                <option value="yes" {{$user->coporate->vat == 'yes' ? 'selected' : 'no'}}>Yes</option>
                                                <option value="no" {{$user->coporate->vat == 'no' ? 'selected' : 'no'}}>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">FATCA Classification <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="fatca" required="">
                                                <option value="">Please select....</option>
                                                <option value="intl_org" {{$user->coporate->fatca == 'intl_org' ? 'selected' : ''}}>Intl Organization</option>
                                                <option value="pension" {{$user->coporate->fatca == 'pension' ? 'selected' : ''}}>Pension Fund</option>
                                                <option value="gov" {{$user->coporate->fatca == 'gov' ? 'selected' : ''}}>Government Agency</option>
                                                <option value="lnfe" {{$user->coporate->fatca == 'lnfe' ? 'selected' : ''}}>Listed Non Financial Entity</option>
                                                <option value="nfe" {{$user->coporate->fatca == 'nfe' ? 'selected' : ''}}>Non Financial Entity</option>
                                                <option value="anfe" {{$user->coporate->fatca == 'anfe' ? 'selected' : ''}}>Active Non Financial Entity</option>
                                                <option value="pnfe" {{$user->coporate->fatca == 'pnfe' ? 'selected' : ''}}>Passive Non Financial Entity</option>
                                                <option value="fe" {{$user->coporate->fatca == 'fe' ? 'selected' : ''}}>Financial Entity</option>
                                            </select>
                                        </div>
                                    </div>

                                <div class="col-lg-12">
                                    <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                                </div>
                            @else
                                <div class="u-text-danger u-text-center">Please update your address information to update Identity / KYC form.</div>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

