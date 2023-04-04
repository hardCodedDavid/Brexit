@php
use App\Country;
@endphp

<div class="container">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: red; top:60px">
            <img src="{{ asset('brexits-platform-logo-2.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">Create Minor Account</h1>
    </header>
{{--    {{dd($errors->all())}}--}}
    <form action="{{route('register.mnrs')}}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10 offset-md-1 u-mb-medium">

                        <h1>
                            Section A: Minor Account Holder Details
                        </h1>
                        <p>
                            Please capture full details of the Minor in the fields below.
                        </p>
                    </div>
                    <div class="col-10 offset-md-1">
                        <div class="form-row">
                            <div class="row u-mb-small">
                                <div class="col-12 col-md-4">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">First Name <small class="u-text-danger">*</small></label>
                                        <input class="c-input" id="input1" name="m_firstname" type="text" placeholder="Minor First Name" required>

                                        @error('m_firstname')
                                            <small class="u-block u-text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Last Name <small class="u-text-danger">*</small></label>
                                        <input class="c-input" id="input1" type="text" name="m_lastname" placeholder="Minor Last Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Preferred Name <small class="u-text-danger">*</small></label>
                                        <input class="c-input" id="input1" type="text" name="m_username" placeholder="Minor Username" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Gender <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="m_gender" required="">
                                            <option value="">Please select....</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Date Of Birth</label>
                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" name="m_dob" id="input-calendar" type="text" placeholder="Date Of Birth">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country of Residence <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="countryR" required="">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Nationality <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="countryN" required="">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-md-6 col-12">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">City of Birth <small class="u-text-danger">*</small></label>
                                        <input class="c-input" id="input1" type="text" placeholder="City of Birth" name="cityB" required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country of Birth <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="countryB" required="">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Identification <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="m_id" required="">
                                            <option value="">Please select....</option>
                                            <option value="sai">South African Id</option>
                                            <option value="bc">Birth Certificate</option>
                                            <option value="fp">Foreign Passport</option>
                                            <option value="fi">Foreign ID</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Foreign Passport / ID Number</label>
                                        <input class="c-input" id="input1" type="text" name="m_passport_number" placeholder="Foreign Passport / ID Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12  u-mb-small">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Foreign Passport / ID Country of Issue</label>
                                        <select class="c-select" name="m_passportC">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12 u-mb-small">
                                    <br>
                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" name="m_passport_expiry" id="input-calendar" type="text" placeholder="Foreign Passport / ID Expiry Date">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>


                            <h3 class="u-mb-medium u-mt-medium">Contact details - should be that of Authorised User if managing the account for the minor.</h3>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Dialing Code <small class="u-text-danger">*</small></label>
                                        <input class="c-input" type="text" name="dialingCode" required="" placeholder="Intl. dial code preceded by + (eg. +27)">

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Mobile Phone Number <small class="u-text-danger">*</small></label>
                                        <input class="c-input" type="tel" name="phone" required="" placeholder="10 digits (eg. 0791234567)">
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <label class="c-field__label">Email Address <small class="u-text-danger">*</small></label>
                                    <input class="c-input" type="email" name="email" required="">
                                    @error('email')
                                        <small class="u-block u-text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 u-mb-small">
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

                            <h3 class=" u-mt-medium">Address of Minor.</h3>
                            <p class="">Please ensure that when you complete the "Confirmation of Address" form, that you confirm that the minor lives with you at the address you specify below.</p>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Unit Number</label>
                                    <input class="c-input" type="text" name="addressUnitNumber">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Complex Numbers</label>
                                    <input class="c-input" type="text" name="addressComplexNumber">
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Street Number</label>
                                    <input class="c-input" type="text" name="addressStreetNumber">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Street Name</label>
                                    <input class="c-input" type="text" name="addressStreetName">
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Surburb </label>
                                    <input class="c-input" type="text" name="addressSurburb">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">City </label>
                                    <input class="c-input" type="text" name="addressCity">
                                </div>
                            </div>

                            <h2 class="u-mt-medium">Minor Bank Details</h2>
                            <p class="u-mb-small"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>

                            <p class="u-mb-medium">
                                This sub-section is for the details of a bank account in the minor's name (account holder).
                            </p>
                            <p class="u-mb-medium">
                                It is not mandatory, so if the Minor does not have a bank account in his / her personal name at this time, you can ignore this section and we will still open an account.
                            </p>
                            <p class="u-mb-medium">
                                However, for future reference, it is important to note that {{env('APP_NAME')}} can only pay funds out to a bank account in the name of the account holder so should you ever wish to withdraw funds in future, a bank account will have to be opened in the name of the minor account holder.
                            </p>
                            <p class="u-mb-medium">
                                If you would like to set up a regular debit order to fund your child's account, please download and complete the Debit order authority form,  accessible from the confirmation page that follows and send it to us with the other required documents.
                            </p>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Minor Bank Name</label>
                                        <input class="c-input" type="text" name="m_bankName">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Minor Account Type</label>
                                        <input class="c-input" type="text" name="m_bankType">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Minor Bank Branch Name</label>
                                        <input class="c-input" type="text" name="m_bankBranch">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Minor Bank Branch Code</label>
                                        <input class="c-input" type="text" name="m_bankBranchCode">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Minor Bank Account Number</label>
                                        <input class="c-input" type="text" name="m_bankAccountNumber">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Minor Bank Account Holder Details</label>
                                        <input class="c-input" type="text" name="m_bankAccountHolder">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Minor Bank Country</label>
                                        <select class="c-select" name="bankCountry">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <h1 class="u-mt-medium">Section B: Authorized Person</h1>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>

                            <p class="u-mb-medium">
                                Please capture full details of the Person authorised to act on behalf of the Minor (Guardian / Parent)
                            </p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Relationship to Minor
                                        </label>
                                        <input class="c-input" type="text" name="g_relationship" >
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-4">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Guardian First Name </label>
                                        <input class="c-input"  type="text" name="g_firstname" placeholder="Guardian First Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Guardian Last Name </label>
                                        <input class="c-input" type="text" name="g_lastname" placeholder="Guardian Last Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Gender </label>
                                        <select class="c-select" name="g_gender">
                                            <option value="">Please select....</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Email </label>
                                        <input class="c-input" type="email" name="g_email">
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Country of Birth </label>
                                        <select class="c-select" name="g_countryBirth" required="">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Country of Residence </label>
                                        <select class="c-select" name="g_countryResidence">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Citizenship </label>
                                        <select class="c-select" name="g_countryCitizen">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Guardian Date Of Birth</label>
                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" name="g_dob" id="input-calendar" type="text" placeholder="Guardian Date Of Birth">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Marital Status </label>
                                        <select class="c-select" name="g_maritalStatus">
                                            <option value="married">Married</option>
                                            <option value="single">Single</option>
                                            <option value="divorced">Divorced</option>
                                            <option value="widowed">Widowed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Identification Type</label>
                                        <select class="c-select" name="g_idType">
                                            <option value="">Please select....</option>
                                            <option value="sai">South African Id</option>
                                            <option value="bc">Birth Certificate</option>
                                            <option value="fp">Foreign Passport</option>
                                            <option value="fi">Foreign ID</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Guardian Passport Number </label>
                                        <input class="c-input" id="input1" type="text" name="g_passportNumber" placeholder="Guardian Passport Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Passport Country</label>
                                        <select class="c-select" name="g_passportC">
                                            @foreach(Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 u-mb-small">
                                    <label class="c-field__label">Guardian Passport Expiry Date</label>

                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" name="g_passportExpiry" id="input-calendar" type="text" placeholder="Guardian Passport Expiry Date">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Dialing Code </label>
                                        <input class="c-input" type="text" name="g_dailingCode" placeholder="Intl. dial code preceded by + (eg. +27)">

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Mobile Number </label>
                                        <input class="c-input" type="text" name="g_mobileNumber" placeholder="10 digits (eg. 0791234567)">

                                    </div>
                                </div>
                            </div>

                            <h1 class="">Occupation of Authorised Person</h1>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Employment Status</label>
                                        <select class="c-select" name="g_employment">
                                            <option value="">Please select....</option>
                                            <option value="Private Sector Employment">Private Sector Employment</option>
                                            <option value="Public Sector Employment">Public Sector Employment</option>
                                            <option value="Self Employed / Consultant / Entrepreneur">Self Employed / Consultant / Entrepreneur</option>
                                            <option value="Retired">Retired</option>
                                            <option value="Student">Student</option>
                                            <option value="Unemployed">Unemployed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Income Band</label>
                                        <select class="c-select" name="g_income">
                                            <option value="">Please select....</option>
                                            <option value="0 - 249,999">0 - 249,999</option>
                                            <option value="250,000 - 410,460">250,000 - 410,460</option>
                                            <option value="410,461 - 555,600">410,461 - 555,600</option>
                                            <option value="555,601 - 708,310">555,601 - 708,310</option>
                                            <option value="708,311 - 1,500,000">708,311 - 1,500,000</option>
                                            <option value="1,500,001 and abovei">1,500,001 and above</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Guardian Source of Income</label>
                                        <select class="c-select" name="g_incomeSource">
                                            <option value="">Please select....</option>
                                            <option value="bonus">Bonus</option>
                                            <option value="savings">Savings</option>
                                            <option value="commission">Commission</option>
                                            <option value="fees">Fees</option>
                                            <option value="gift">Gift</option>
                                            <option value="inheritance">Inheritance</option>
                                            <option value="inheritance">Interest and Dividend</option>
                                            <option value="others">Others</option>
                                            <option value="sales">Proceeds from Sales of Assets</option>
                                            <option value="rental">Rental Income</option>
                                            <option value="retirement">Retirement Proceeds</option>
                                            <option value="salary">Salary</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Account Source of Funds</label>
                                        <select class="c-select" name="g_fundsSource">
                                            <option value="">Please select....</option>
                                            <option value="bonus">Bonus</option>
                                            <option value="savings">Savings</option>
                                            <option value="commission">Commission</option>
                                            <option value="fees">Fees</option>
                                            <option value="gift">Gift</option>
                                            <option value="inheritance">Inheritance</option>
                                            <option value="inheritance">Interest and Dividend</option>
                                            <option value="others">Others</option>
                                            <option value="sales">Proceeds from Sales of Assets</option>
                                            <option value="rental">Rental Income</option>
                                            <option value="retirement">Retirement Proceeds</option>
                                            <option value="salary">Salary</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <h1 class="u-mb-medium">Declarations</h1>
                                    <p class="u-mb-medium">PLEASE NOTE: If you do not check all four boxes below, we cannot open an account for you.</p>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Guardian Declaration 1</p>
                                        <input class="c-choice__input" id="checkbox1" name="checkboxes" type="checkbox" required>
                                        <label class="c-choice__label" for="checkbox1">That all details given in this form are correct I am over 18 years of age and that I will inform {{env('APP_NAME')}} immediately in writing of any changes to the details contained herein.</label>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Guardian Declaration 2</p>
                                        <input class="c-choice__input" id="checkbox2" name="checkboxes" type="checkbox" required>
                                        <label class="c-choice__label" for="checkbox2">I have read and understood and agree to be bound to all Terms and Conditions as set out on the {{env('APP_NAME')}} website and all related platforms, products and services.</label>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Guardian Declaration 3</p>
                                        <input class="c-choice__input" id="checkbox3" name="checkboxes" type="checkbox" required>
                                        <label class="c-choice__label" for="checkbox3">I confirm that I will invest in the case of individuals only, in my own name and will not use my Account to invest on behalf of any other person and in the case of Minors only, Authorised Users will invest on the Account.</label>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Guardian Declaration 4</p>
                                        <input class="c-choice__input" id="checkbox4" name="checkboxes" type="checkbox" required>
                                        <label class="c-choice__label" for="checkbox4">I confirm that I am liable for all costs set out in the Cost Profile published on the website and amended from time to time and I agree to meet my payment obligations and the other terms applicable to my Account as set out in the Cost Profile.</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="u-flex u-justify-start u-mb-medium">
            <!-- <button> -->
            <button class="c-btn c-btn--success" type="submit">Register</button>
        </div>
    </form>

</div>
