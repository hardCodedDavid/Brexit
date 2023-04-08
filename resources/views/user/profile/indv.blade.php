@php
use App\Http\Controllers\Globals as Utils;
@endphp


<div class="row u-mb-large">
    <div class="col-12">
        <div class="c-tabs">
            <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist"
                style="width: 100%; overflow-x: scroll">
                <li class="c-tabs__item"><a class="c-tabs__link active" id="nav-personal-tab" data-toggle="tab"
                        href="#nav-personal" role="tab" aria-controls="nav-personal" aria-selected="true">Personal
                        Details</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-address-tab" data-toggle="tab"
                        href="#nav-address" role="tab" aria-controls="nav-address" aria-selected="false">Address
                        Information</a></li>
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-identity-tab" data-toggle="tab"
                        href="#nav-identity" role="tab" aria-controls="nav-identity" aria-selected="false">Identity /
                        KYC</a></li>
                {{-- <li class="c-tabs__item"><a class="c-tabs__link" id="nav-tax-tab" data-toggle="tab" href="#nav-tax"
                        role="tab" aria-controls="nav-tax" aria-selected="false">Tax</a></li> --}}
                <li class="c-tabs__item"><a class="c-tabs__link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank"
                        role="tab" aria-controls="nav-bank" aria-selected="false">Bank Details</a></li>
            </ul>
            <div class="c-tabs__content tab-content" id="nav-tabContent">
                <div class="c-tabs__pane active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
                    <form action="{{ route('updatePersonal') }}" method="post">
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
                                    <input class="c-input" type="text" name="firstname" value="{{ $user->firstname }}"
                                        readonly="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Surname *</label>
                                    <input class="c-input" type="text" name="lastname" value="{{ $user->surname }}"
                                        readonly="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Username*</label>
                                    <input class="c-input" type="text" name="username" value="{{ $user->username }}"
                                        readonly="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Date of Birth *</label>
                                    <input class="c-input" type="date" name="dob" value="{{ $user->dob }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Identification Type *</label>
                                    <select class="c-select" name="id_type">
                                        <option value="id no" {{ ($user->id_type == 'id_no')? 'selected': '' }}>ID No.
                                        </option>
                                        <option value="passport no" {{ ($user->id_type == 'passport no')? 'selected': ''
                                            }}>Passport No.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Identification Number</label>
                                    <input class="c-input" type="text" name="id_number" value="{{ $user->id_number }}"
                                        required="">
                                </div>
                            </div><div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Social Security Number</label>
                                    <input class="c-input" type="text" name="ssn" value="{{ '' }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Address *</label>
                                    <input class="c-input" type="text" name="address" value="{{ '' }}">
                                </div>
                            </div><div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Address2 (Optional)</label>
                                    <input class="c-input" type="text" name="address" value="{{ '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Email *</label>
                                    <input class="c-input" type="email" name="email" value="{{ $user->email }}"
                                        readonly="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Gender <small class="u-text-danger">*</small></label>
                                    <select class="c-select" name="gender" required="">
                                        <option value="">Please select....</option>
                                        <option value="male" {{$user->gender == 'male'? 'selected' : ''}}>Male</option>
                                        <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>Female
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Country *</label>
                                    <select class="c-select" name="country" required="">
                                        @foreach(App\Country::all() as $country)
                                        <option value="{{$country->name}}" {{ ($user->country_birth == $country->name)?
                                            'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Zip code *</label>
                                    <input class="c-input" type="text" name="zip_code" value="{{ '' }}" required="">
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Country of Birth *</label>
                                    <select class="c-select" name="country_birth" required="">
                                        @foreach(App\Country::all() as $country)
                                        <option value="{{$country->name}}" {{ ($user->country_birth == $country->name)?
                                            'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">City *</label>
                                    <input class="c-input" type="text" name="city" value="{{ $user->city_birth }}"
                                        required="">
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Country of Residence *</label>
                                    <select class="c-select" id="country" name="country_residence" required=""
                                        onchange="getPhoneCode(this)">
                                        @foreach(App\Country::all() as $country)
                                        <option value="{{$country->name}}" data-code="{{$country->phonecode}}" {{
                                            ($user->country_residence == $country->name)? 'selected': ''
                                            }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Marital Status *</label>
                                    <select class="c-select" name="marital_status">
                                        <option value="single" {{ ($user->marital_status == 'single')? 'selected': ''
                                            }}>Single</option>
                                        <option value="married" {{ ($user->marital_status == 'married')? 'selected': ''
                                            }}>Married</option>
                                        <option value="divorced" {{ ($user->marital_status == 'divorced')? 'selected':
                                            '' }}>Divorced</option>
                                        <option value="widowed" {{ ($user->marital_status == 'widowed')? 'selected': ''
                                            }}>Widowed</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-lg-6">
                                <label class="c-field__label">Phone *</label>

                                <div class="c-field has-addon-left">
                                    <span class="c-field__addon u-bg-twitter u-color-white" style="padding: 0 .5em;">
                                        + <span id="phone_code">{{$phoneCode}}</span>
                                    </span>
                                    <input type="text" class="c-input" name="phone" value="{{ $user->phone }}"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Annual Income</label>
                                    <input class="c-input" type="text" name="annual_income" value="{{ $user->work_number }}">
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Work Number</label>
                                    <input class="c-input" type="text" name="work_number"
                                        value="{{ $user->work_number }}">
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Citizenship</label>
                                    <select class="c-select" name="nationality" required="">
                                        @foreach(App\Country::all() as $country)
                                        <option value="{{$country->name}}" {{ ($user->nationality == $country->name)?
                                            'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-lg-12" style="margin-top:30px;">
                                <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- // second tabs -->
                <div class="c-tabs__pane" id="nav-address" role="tabpanel" aria-labelledby="nav-address-tab">
                    <form action="{{ route('updateAddress') }}" method="post">
                        @csrf
                        <div class="row">
                            @if($user->dob != null)
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Unit number</label>
                                    <input class="c-input" type="text" name="unit_number"
                                        value="{{ $user->unit_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Complex Name</label>
                                    <input class="c-input" type="text" name="complex_name"
                                        value="{{ $user->complex_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Street Number *</label>
                                    <input class="c-input" type="text" name="street_number"
                                        value="{{ $user->street_number }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Street Name *</label>
                                    <input class="c-input" type="text" name="street_name"
                                        value="{{ $user->street_name }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Suburb *</label>
                                    <input class="c-input" type="text" name="suburb" value="{{ $user->suburb }}"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">City *</label>
                                    <input class="c-input" type="text" name="city" value="{{ $user->city }}"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Code *</label>
                                    <input class="c-input" type="text" name="code" value="{{ $user->code }}"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Country *</label>
                                    <select class="c-select" name="country" required="" onchange="getPhoneCode(this)">
                                        @foreach(App\Country::all() as $country)
                                        <option value="{{$country->name}}" data-code="{{$country->phonecode}}" {{
                                            ($user->country_residence == $country->name)? 'selected': ''
                                            }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">State *</label>
                                    <input class="c-input" type="text" name="state" value="{{ $user->state }}"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                            </div>
                            @else
                            <div class="u-text-danger u-text-center">Please update your personal details to update this
                                address information</div>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- // third tabs -->
                <div class="c-tabs__pane" id="nav-identity" role="tabpanel" aria-labelledby="nav-identity-tab">
                    <form action="{{ route('updateIdentity') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if($user->street_name != null)

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Passport</label>
                                    <input class="c-input" type="file" name="passport">
                                </div>

                                {{-- @if($user->id_card)
                                <img src="{{asset($user->id_card)}}" alt="Id Card" style="width:100%; height:auto;">
                                @endif--}}
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Proof of Residence</label>
                                    <input class="c-input" type="file" name="residence_image">
                                </div>

                                {{-- @if($user->residence_image)--}}
                                {{-- <img src="{{asset($user->residence_image)}}" alt="Residence Image"
                                    style="width:100%; height:auto;">--}}
                                {{-- @endif--}}
                            </div>

                            <div class="col-lg-12 u-mt-medium">
                                <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                            </div>
                            @else
                            <div class="u-text-danger u-text-center">Please update your address information to update
                                Identity / KYC form.</div>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- // fourth tabs -->
                <div class="c-tabs__pane" id="nav-tax" role="tabpanel" aria-labelledby="nav-tax-tab">
                    <form action="{{ route('updateTax') }}" method="POST">
                        @csrf
                        <div class="row" style="padding:0 2em">
                            @if($user->street_name != null)
                            <div class="col-12">
                                <div class="u-text-center">
                                    <h4 class="u-mb-xsmall">Tax Information.</h4>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox1" name="registered" type="checkbox"
                                        {{$user->registered == 'on' ? 'checked' : ''}}>
                                    <label class="c-choice__label" for="checkbox1">Are you registered for tax
                                        purposes?</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <p class="big-text c-fileitem__name">
                                    Legislation means we need to know where you pay tax. If you only pay tax in South
                                    Africa, then please just add your Tax Identification Number.
                                </p>
                                <br>
                                <p class="big-text c-fileitem__name">
                                    If however:
                                </p>
                                <p class="big-text">
                                    You pay tax somewhere other than South Africa, then please click on the dropdown and
                                    select the country where you pay it, and enter your tax identification number and
                                    type for that country.

                                    You pay tax in more than one country, then please enter the correct country, the
                                    corresponding tax identification number and type then click on the '+ Add Another
                                    Tax Residence' link to add the other country.
                                </p>
                                <br>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Tax Identification Type*</label>
                                    <select class="c-select" name="tax_type" required="">
                                        <option>Please Select...</option>
                                        <option {{$user->tax_type == 'sa_tax' ? 'selected' : ''}} value="sa_tax">SA: Tax
                                            No.</option>
                                        <option {{$user->tax_type == 'sa_vat' ? 'selected' : ''}} value="sa_vat">SA: VAT
                                            Registration No.</option>
                                        <option {{$user->tax_type == 'us_social' ? 'selected' : ''}}
                                            value="us_social">US: Social Security No.</option>
                                        <option {{$user->tax_type == 'us_employer' ? 'selected' : ''}}
                                            value="us_employer">US: Employer Identification No.</option>
                                        <option {{$user->tax_type == 'us_indv' ? 'selected' : ''}} value="us_indv" >US:
                                            Individual Taxpayer ID No.</option>
                                        <option {{$user->tax_type == 'us_tax' ? 'selected' : ''}} value="us_tax" >US:
                                            Tax ID No. Pending US adoption</option>
                                        <option {{$user->tax_type == 'us_prep' ? 'selected' : ''}} value="us_prep" >US:
                                            Preparer Taxpayer ID No.</option>
                                        <option {{$user->tax_type == 'others' ? 'selected' : ''}} value="others" >Other
                                            Tax No.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">What is your tax number? (TIN for US
                                        Citizens)*</label>
                                    <input class="c-input" type="text" name="tax_number" value="{{ $user->tax_number }}"
                                        required="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Tax Residence *</label>
                                    <select class="c-select" name="tax_residence" required="">
                                        @foreach(App\Country::all() as $country)
                                        <option value="{{$country->name}}" {{ ($user->tax_residence == $country->name)?
                                            'selected': '' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            </div>

                            <div class="col-12">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox2" name="primary_residence"
                                        type="checkbox" {{$user->primary_residence == 'on' ? 'checked' : ''}}>
                                    <label class="c-choice__label" for="checkbox2">Primary residence?</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                            </div>
                            @else
                            <div class="u-text-danger u-text-center">Please update your address information to update
                                Identity / KYC form.</div>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- // fourth tabs -->
                <div class="c-tabs__pane" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">
                    <form action="{{ route('updateBank') }}" method="post">
                        @csrf
                        <div class="row">
                            {{-- @if($user->tax_residence != null) --}}
                            @if($user->street_name != null)
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Bank Name *</label>
                                    <input class="c-input" type="text" name="bank_name" value="{{ $user->bank_name }}"
                                        required="">
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Account Type *</label>
                                    <input class="c-input" type="text" name="account_type"
                                        value="{{ $user->account_type }}" required="">
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Branch Name *</label>
                                    <input class="c-input" type="text" name="branch_name"
                                        value="{{ $user->branch_name }}" required="">
                                </div>
                            </div> --}}
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Account Name *</label>
                                    <input class="c-input" type="text" name="account_holder"
                                        value="{{ $user->account_number }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Account Number *</label>
                                    <input class="c-input" type="text" name="account_number"
                                        value="{{ $user->account_holder }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Routing Number *</label>
                                    <input class="c-input" type="text" name="branch_code"
                                        value="{{ $user->branch_code }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Address *</label>
                                    <input class="c-input" type="text" name="bank_country"
                                        value="{{ $user->bank_country }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                            </div>
                            {{-- <div class="col-lg-6 offset-lg-3">
                                <span class="c-divider has-text c-divider--small u-mv-medium">Other Details</span>
                            </div>
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label">Bitcoin Address</label>
                                    <input class="c-input" type="text" name="bitcoin_address"
                                        value="{{ $user->bitcoin_address }}">
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Update</button>
                            </div>
                            @else
                            <div class="u-text-danger u-text-center">Please update your Tax to update Bank details form.
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script src="{{ asset('js/scrolling-tabs.js')}}"></script>

<script src="{{ asset('js/demo.js')}}"></script>
<script>
    const hash = window.location.hash;
    if(hash) {
const targetTab = document.querySelector(`${hash}-tab`)
const currentActiveTab = document.querySelector('.c-tabs__item > .active')
currentActiveTab.classList.remove('active')
targetTab.classList.add('active')
targetTab.click()
    }
    
</script>