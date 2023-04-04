@php
use App\Http\Controllers\Globals as Utils;
@endphp

<div class="row u-mb-large">
    <div class="col-12">
        <div class="c-tabs">
            <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist" style="width: 100%; overflow-x: scroll">
                <li class="c-tabs__item"><a class="c-tabs__link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal" role="tab" aria-controls="nav-personal" aria-selected="true">Minor Details</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-address-tab" data-toggle="tab" href="#nav-address" role="tab" aria-controls="nav-address" aria-selected="false">Minor Address Information</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-identity-tab" data-toggle="tab" href="#nav-identity" role="tab" aria-controls="nav-identity" aria-selected="false">Minor Identity / KYC</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank" role="tab" aria-controls="nav-bank" aria-selected="false">Minor Bank Details</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-tax-tab" data-toggle="tab" href="#nav-tax" role="tab" aria-controls="nav-tax" aria-selected="false">Authorized Person Details</a></li>
            </ul>
            <div class="c-tabs__content tab-content" id="nav-tabContent">
                <div class="c-tabs__pane active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
                    <form action="{{ route('updatePersonalMinr') }}" method="post">
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
                                    <label class="c-field__label">First Name *</label>
                                    <input class="c-input" type="text" name="firstname" value="{{ $user->firstname }}" readonly="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Surname *</label>
                                    <input class="c-input" type="text" name="lastname" value="{{ $user->surname }}" readonly="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Username*</label>
                                    <input class="c-input" type="text" name="username" value="{{ $user->username }}" readonly="">
                                </div>
                            </div>

                            <div class="col-6">

                                <label class="c-field__label">Date of Birth *</label>
                                <div class="c-field has-addon-right u-mb-small">
                                    <input class="c-input" data-toggle="datepicker" name="dob" id="input-calendar" type="text" placeholder="Date of Birth" value="{{$user->minor->dob}}">
                                    <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Identification Type *</label>
                                    <select class="c-select" name="id_type">
                                        <option value="id no" {{ ($user->minor->idType == 'id no')? 'selected': '' }}>ID No.</option>
                                        <option value="passport no" {{ ($user->minor->idType == 'passport no')? 'selected': '' }}>Passport No.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Identification Number *</label>
                                    <input class="c-input" type="text" name="id_number" value="{{ $user->minor->passportNumber }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Identification Country of Issue *</label>
                                    <select class="c-select"  id="passportCountry" name="passportCountry" required="">
                                        @foreach(App\Country::all() as $country)
                                            <option value="{{$country->name}}"  {{ ($user->minor->passportCountry == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">

                                <label class="c-field__label">Foreign Passport / ID Expiry Date</label>
                                <div class="c-field has-addon-right u-mb-small">
                                    <input class="c-input" data-toggle="datepicker" name="m_passport_expiry" id="input-calendar" type="text" placeholder="Foreign Passport / ID Expiry Date" value="{{$user->minor->passportExpiry}}">
                                    <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
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
                                    <label class="c-field__label">Gender <small class="u-text-danger">*</small></label>
                                    <select class="c-select" name="gender" required="">
                                        <option value="">Please select....</option>
                                        <option value="male" {{$user->minor->gender == 'male'? 'selected' : ''}}>Male</option>
                                        <option value="female" {{$user->minor->gender == 'female' ? 'selected' : ''}}>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Country of Birth *</label>
                                    <select class="c-select" name="country_birth" required="">
                                        @foreach(App\Country::all() as $country)
                                            <option value="{{$country->name}}"  {{ ($user->minor->countryB == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">City of birth *</label>
                                    <input class="c-input" type="text" name="city" value="{{ $user->minor->cityB }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Country of Residence *</label>
                                    <select class="c-select"  id="country" name="country_residence" required="" onchange="getPhoneCode(this)">
                                        @foreach(App\Country::all() as $country)
                                            <option value="{{$country->name}}" data-code="{{$country->phonecode}}" {{ ($user->minor->countryR == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label class="c-field__label">Mobile Number *</label>

                                <div class="c-field has-addon-left">
                                    <span class="c-field__addon u-bg-twitter u-color-white" style="padding: 0 .5em;">
                                        + <span id="phone_code">{{$phoneCode}}</span>
                                    </span>
                                    <input type="text" class="c-input" name="phone" value="{{ $user->minor->phone }}" required="" >

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Citizenship</label>
                                    <select class="c-select" name="nationality" required="">
                                        @foreach(App\Country::all() as $country)
                                            <option value="{{$country->name}}"  {{ ($user->minor->countryN == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
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
                    <form action="{{ route('updateAddressMinr') }}" method="post">
                        @csrf
                        <div class="row">
                            @if($user->minor->dob != null)
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Unit number</label>
                                        <input class="c-input" type="text" name="unit_number" value="{{ $user->minor->addressUnitNumber }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Complex Name</label>
                                        <input class="c-input" type="text" name="complex_name" value="{{ $user->minor->addressComplexNumber }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Street Number *</label>
                                        <input class="c-input" type="text" name="street_number" value="{{ $user->minor->addressStreetNumber }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Street Name *</label>
                                        <input class="c-input" type="text" name="street_name" value="{{ $user->minor->addressStreetName }}" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Suburb *</label>
                                        <input class="c-input" type="text" name="suburb" value="{{ $user->minor->addressSurburb }}" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">City *</label>
                                        <input class="c-input" type="text" name="city" value="{{ $user->minor->addressCity }}" required="">
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
                            @if($user->minor->addressStreetName != null)

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
{{--                                        <img src="{{asset($user->residence_image)}}" alt="Residence Image" style="width:100%; height:auto;">--}}
{{--                                    @endif--}}
                                </div>

                                <div class="col-lg-12 u-mt-medium">
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
                    <form action="{{ route('updateBankMinr') }}" method="post">
                        @csrf
                        <div class="row">
                            @if($user->minor->addressStreetName != null)
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Bank Name *</label>
                                        <input class="c-input" type="text" name="bank_name" value="{{ $user->minor->bankName }}" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Account Type *</label>
                                        <input class="c-input" type="text" name="account_type" value="{{ $user->minor->bankAccountType }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Branch Name *</label>
                                        <input class="c-input" type="text" name="branch_name" value="{{ $user->minor->bankBranchName }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Branch Code *</label>
                                        <input class="c-input" type="text" name="branch_code" value="{{ $user->minor->bankBranchCode }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Account Number *</label>
                                        <input class="c-input" type="text" name="account_number" value="{{ $user->minor->bankAccountNumber }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Account Holder *</label>
                                        <input class="c-input" type="text" name="account_holder" value="{{ $user->minor->bankAccountHolder }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Bank Country *</label>
                                        <input class="c-input" type="text" name="bank_country" value="{{ $user->minor->bankCountry }}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
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
                <div class="c-tabs__pane" id="nav-tax" role="tabpanel" aria-labelledby="nav-tax-tab">
                    <form action="{{ route('updateGuardianDetailsMinr') }}" method="POST">
                        @csrf
                        @if($user->minor->addressStreetName != null)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Relationship to Minor <small class="u-text-danger">*</small>
                                            </label>
                                            <input class="c-input" type="text" name="g_relationship" value="{{$user->minor->guardian->relationship}}" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-12 col-md-4">
                                        <div class="c-field">
                                            <label class="c-field__label" for="input1">Guardian First Name <small class="u-text-danger">*</small></label>
                                            <input class="c-input"  type="text" name="g_firstname" value="{{$user->minor->guardian->firstname}}" readonly placeholder="Guardian First Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="c-field">
                                            <label class="c-field__label" for="input1">Guardian Last Name <small class="u-text-danger">*</small></label>
                                            <input class="c-input" type="text" name="g_lastname" value="{{$user->minor->guardian->lastname}}" readonly placeholder="Guardian Last Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Gender <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_gender"  readonly required="">
                                                <option value="">Please select....</option>
                                                <option value="male" @if($user->minor->guardian->gender == 'male') selected @endif>Male</option>
                                                <option value="female" @if($user->minor->guardian->gender == 'female') selected @endif>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-md-6 col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Country of Birth <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_countryBirth" required="">
                                                @foreach(App\Country::all() as $country)
                                                    <option value="{{$country->name}}" {{ ($user->minor->guardian->countryBirth == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Country of Residence <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_countryResidence" required="">
                                                @foreach(App\Country::all() as $country)
                                                    <option value="{{$country->name}}" {{ ($user->minor->guardian->countryResidence == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-12 col-md-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Citizenship <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_countryCitizen" required="">
                                                @foreach(App\Country::all() as $country)
                                                    <option value="{{$country->name}}" {{ ($user->minor->guardian->countryCitizen == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label class="c-field__label">Guardian Date Of Birth</label>
                                        <div class="c-field has-addon-right">
                                            <input class="c-input" data-toggle="datepicker" value="{{$user->minor->guardian->dob}}" name="g_dob" id="input-calendar" type="text" placeholder="Guardian Date Of Birth">
                                            <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Marital Status <small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_maritalStatus" required="">
                                                <option value="married" {{($user->minor->guardian->maritalStatus == 'married' ? 'selected' : '')}}>Married</option>
                                                <option value="single" {{($user->minor->guardian->maritalStatus == 'single' ? 'selected' : '')}}>Single</option>
                                                <option value="divorced" {{($user->minor->guardian->maritalStatus == 'divorced' ? 'selected' : '')}}>Divorced</option>
                                                <option value="widowed" {{($user->minor->guardian->maritalStatus == 'widowed' ? 'selected' : '')}}>Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Identification Type<small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_idType" required="">
                                                <option value="">Please select....</option>
                                                <option value="sai" {{($user->minor->guardian->idType == 'sai' ? 'selected' : '')}}>South African Id</option>
                                                <option value="bc" {{($user->minor->guardian->idType == 'bc' ? 'selected' : '')}}>Birth Certificate</option>
                                                <option value="fp" {{($user->minor->guardian->idType == 'fp' ? 'selected' : '')}}>Foreign Passport</option>
                                                <option value="fi" {{($user->minor->guardian->idType == 'fi' ? 'selected' : '')}}>Foreign ID</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 u-mb-small">
                                        <div class="c-field">
                                            <label class="c-field__label" for="input1">Guardian Passport Number <small class="u-text-danger">*</small></label>
                                            <input class="c-input" id="input1" type="text" name="g_passportNumber" value="{{$user->minor->guardian->passportNumber}}" placeholder="Guardian Passport Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Passport Country</label>
                                            <select class="c-select" name="g_passportC">
                                                @foreach(App\Country::all() as $country)
                                                    <option value="{{$country->name}}" {{ ($user->minor->guardian->passportCountry == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 u-mb-small">
                                        <label class="c-field__label">Guardian Passport Expiry Date</label>
                                        <div class="c-field has-addon-right">
                                            <input class="c-input" data-toggle="datepicker" name="g_passportExpiry" id="input-calendar" type="text" value="{{$user->minor->guardian->passportExpiry}}" placeholder="Guardian Passport Expiry Date">
                                            <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-12 col-md-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Dialing Code <small class="u-text-danger">*</small></label>
                                            <input class="c-input" type="text" name="g_dailingCode" required="" value="{{$user->minor->guardian->dialingCode}}" placeholder="Intl. dial code preceded by + (eg. +27)">

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Mobile Number <small class="u-text-danger">*</small></label>
                                            <input class="c-input" type="text" name="g_mobileNumber" required="" value="{{$user->minor->guardian->phone}}" placeholder="10 digits (eg. 0791234567)">

                                        </div>
                                    </div>
                                </div>

                                <h1 class="u-mb-medium">Occupation of Authorised Person</h1>

                                <div class="row u-mb-small">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Employment Status<small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_employment" required="">
                                                <option value="">Please select....</option>
                                                <option value="Private Sector Employment" {{$user->minor->guardian->employment == "Private Sector Employment" ? 'selected' : ''}}>Private Sector Employment</option>
                                                <option value="Public Sector Employment" {{$user->minor->guardian->employment == "Public Sector Employment" ? 'selected' : ''}}>Public Sector Employment</option>
                                                <option value="Self Employed / Consultant / Entrepreneur" {{$user->minor->guardian->employment == "Self Employed / Consultant / Entrepreneur" ? 'selected' : ''}}>Self Employed / Consultant / Entrepreneur</option>
                                                <option value="Retired" {{$user->minor->guardian->employment == "Retired" ? 'selected' : ''}}>Retired</option>
                                                <option value="Student" {{$user->minor->guardian->employment == "Student" ? 'selected' : ''}}>Student</option>
                                                <option value="Unemployed" {{$user->minor->guardian->employment == "Unemployed" ? 'selected' : ''}}>Unemployed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Income Band<small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_income" required="">
                                                <option value="">Please select....</option>
                                                <option value="0 - 249,999" {{$user->minor->guardian->income == "0 - 249,999" ? 'selected' : ''}}>0 - 249,999</option>
                                                <option value="250,000 - 410,460" {{$user->minor->guardian->income == "250,000 - 410,460" ? 'selected' : ''}}>250,000 - 410,460</option>
                                                <option value="410,461 - 555,600" {{$user->minor->guardian->income == "410,461 - 555,600" ? 'selected' : ''}}>410,461 - 555,600</option>
                                                <option value="555,601 - 708,310" {{$user->minor->guardian->income == "555,601 - 708,310" ? 'selected' : ''}}>555,601 - 708,310</option>
                                                <option value="708,311 - 1,500,000" {{$user->minor->guardian->income == "708,311 - 1,500,000" ? 'selected' : ''}}>708,311 - 1,500,000</option>
                                                <option value="1,500,001 and above" {{$user->minor->guardian->income == "1,500,001 and above" ? 'selected' : ''}}>1,500,001 and above</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Guardian Source of Income<small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_incomeSource" required="">
                                                <option value="">Please select....</option>
                                                <option value="bonus" {{$user->minor->guardian->incomeSource == 'bonus'? 'selected' : ''}}>Bonus</option>
                                                <option value="savings" {{$user->minor->guardian->incomeSource == 'savings'? 'selected' : ''}}>Savings</option>
                                                <option value="commission" {{$user->minor->guardian->incomeSource == 'commission'? 'selected' : ''}}>Commission</option>
                                                <option value="fees" {{$user->minor->guardian->incomeSource == 'fees'? 'selected' : ''}}>Fees</option>
                                                <option value="gift" {{$user->minor->guardian->incomeSource == 'gift'? 'selected' : ''}}>Gift</option>
                                                <option value="inheritance" {{$user->minor->guardian->incomeSource == 'inheritance'? 'selected' : ''}}>Inheritance</option>
                                                <option value="interest" {{$user->minor->guardian->incomeSource == 'interest'? 'selected' : ''}}>Interest and Dividend</option>
                                                <option value="others" {{$user->minor->guardian->incomeSource == 'others'? 'selected' : ''}}>Others</option>
                                                <option value="sales" {{$user->minor->guardian->incomeSource == 'sales'? 'selected' : ''}}>Proceeds from Sales of Assets</option>
                                                <option value="rental" {{$user->minor->guardian->incomeSource == 'rental'? 'selected' : ''}}>Rental Income</option>
                                                <option value="retirement" {{$user->minor->guardian->incomeSource == 'retirement'? 'selected' : ''}}>Retirement Proceeds</option>
                                                <option value="salary" {{$user->minor->guardian->incomeSource == 'salary' ? 'selected' : ''}}>Salary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row u-mb-small">
                                    <div class="col-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label">Account Source of Funds<small class="u-text-danger">*</small></label>
                                            <select class="c-select" name="g_fundsSource" required="">
                                                <option value="">Please select....</option>
                                                <option value="bonus" {{$user->minor->guardian->fundSource == 'bonus'? 'selected' : ''}}>Bonus</option>
                                                <option value="savings" {{$user->minor->guardian->fundSource == 'savings'? 'selected' : ''}}>Savings</option>
                                                <option value="commission" {{$user->minor->guardian->fundSource == 'commission'? 'selected' : ''}}>Commission</option>
                                                <option value="fees" {{$user->minor->guardian->fundSource == 'fees'? 'selected' : ''}}>Fees</option>
                                                <option value="gift" {{$user->minor->guardian->fundSource == 'gift'? 'selected' : ''}}>Gift</option>
                                                <option value="inheritance" {{$user->minor->guardian->fundSource == 'inheritance'? 'selected' : ''}}>Inheritance</option>
                                                <option value="interest" {{$user->minor->guardian->fundSource == 'interest'? 'selected' : ''}}>Interest and Dividend</option>
                                                <option value="others" {{$user->minor->guardian->fundSource == 'others'? 'selected' : ''}}>Others</option>
                                                <option value="sales" {{$user->minor->guardian->fundSource == 'sales'? 'selected' : ''}}>Proceeds from Sales of Assets</option>
                                                <option value="rental" {{$user->minor->guardian->fundSource == 'rental'? 'selected' : ''}}>Rental Income</option>
                                                <option value="retirement" {{$user->minor->guardian->fundSource == 'retirement'? 'selected' : ''}}>Retirement Proceeds</option>
                                                <option value="salary" {{$user->minor->guardian->fundSource == 'salary' ? 'selected' : ''}}>Salary</option>
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
            </div>
        </div>
    </div>
</div>

