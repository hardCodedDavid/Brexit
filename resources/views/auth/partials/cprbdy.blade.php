
<div class="container">
    <header class="c-card__header u-pt-large">
        <a class="c-card__icon" href="#!" style="background: red; top:60px">
            <img src="{{ asset('brexits-platform-logo-2.png') }}">
        </a>
        <h1 class="u-h3 u-text-center u-mb-zero">Create Corporate Account</h1>
    </header>
    <form action="{{route('register.cprbdy')}}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10 offset-md-1 u-mb-medium">

                    </div>
                    <div class="col-10 offset-md-1">
                        <div class="form-row">
                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Trade Name <small class="u-text-danger">*</small></label>
                                        <input class="c-input" id="input1" type="text" placeholder="Trade Name" required name="trade_name">

                                        @error('trade_name')
                                        <small class="u-block u-text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <br>
                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" name="entityRegistration" id="input-calendar" type="text" placeholder="Date Of Entity Registration">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row u-mb-small">
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country where Principal Office housed <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="principalCountry" required="">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Management Country <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="managementCountry" required="">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Sector</label>
                                        <select class="c-select" name="sector">
                                            <option value="">Please select....</option>
                                            <option value="Coporate" >Coporate</option>
                                            <option value="State Owned" >State Owned</option>
                                            <option value="Mining" >Mining</option>
                                            <option value="Defence" >Defence</option>
                                            <option value="Construction" >Construction</option>
                                            <option value="Others" >Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Registration Type</label>
                                        <select class="c-select" name="idType">
                                            <option value="">Please select....</option>
                                            <option value="company">SA company/cc registration no.</option>
                                            <option value="internal">Internal identification no.</option>
                                            <option value="trust">SA trust registration no.</option>
                                            <option value="partnership">Partnerships</option>
                                            <option value="proprietary">Sole Proprietary</option>
                                            <option value="investment">Investment or savings clubs</option>
                                            <option value="stokvels">Stokvels</option>
                                            <option value="burial">Burial societies</option>
                                            <option value="schools">Schools</option>
                                            <option value="churches">Churches</option>
                                            <option value="f_company">Foreign company registration no.</option>
                                            <option value="f_trust">Foreign trust registration no.</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Registration Number</label>
                                        <input class="c-input" type="text" name="registrationNumber">
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">GIIN
                                            <small class="">(Global Intermediary Identification Number eg. 1A2B3C.1A2B3.AB.123)</small>
                                        </label>
                                        <input class="c-input" id="input1" type="text" placeholder="Global Intermediary Identification Number" name="giin">
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Source of Funds <small class="u-text-danger">*</small></label>
                                        <select class="c-select" name="fundsSource" required="">
                                            <option value="">Please select....</option>
                                            <option value="profits">Profits</option>
                                            <option value="sales">Sales of Shares</option>
                                            <option value="investments">Investments</option>
                                            <option value="cp">Corporate Dividends</option>
                                            <option value="savings">Savings</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <h3 class="u-mt-medium">Tax Details</h3>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Tax Identification Type </label>
                                        <select class="c-select" name="taxType" >
                                            <option value="">Please select....</option>
                                            <option value="sa_tax">SA: Tax Number</option>
                                            <option value="sa_vat">SA: VAT Registration Number</option>
                                            <option value="ss">US: Social Security No. (SSN)</option>
                                            <option value="us_employer">US: Employer Identification No. (EIN)</option>
                                            <option value="us_indv">US: Individual Taxpayer ID No. (ITIN)</option>
                                            <option value="us_tax">US: Tax ID No. Pending US Adoption (ATIN)</option>
                                            <option value="us_preparer">US: Preparer Taxpayer ID No. (PTIN)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Tax Identification Number</label>
                                    <input class="c-input" type="text" name="taxNumber" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Tax Residence </label>
                                        <select class="c-select" name="countryTax" >
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">VAT Registered? </label>
                                        <select class="c-select" name="vat" >
                                            <option value="">Please select....</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">FATCA Classification </label>
                                        <select class="c-select" name="fatca" >
                                            <option value="">Please select....</option>
                                            <option value="intl_org">Intl Organization</option>
                                            <option value="pension">Pension Fund</option>
                                            <option value="gov">Government Agency</option>
                                            <option value="lnfe">Listed Non Financial Entity</option>
                                            <option value="nfe">Non Financial Entity</option>
                                            <option value="anfe">Active Non Financial Entity</option>
                                            <option value="pnfe">Passive Non Financial Entity</option>
                                            <option value="fe">Financial Entity</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h3 class="u-mt-medium">Business Address</h3>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Unit Number</label>
                                    <input class="c-input" type="text" name="businessUnitNumber">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Complex Name</label>
                                    <input class="c-input" type="text" name="businessComplexName">
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Street Number </label>
                                    <input class="c-input" type="text" name="businessStreetNumber">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Street Name</label>
                                    <input class="c-input" type="text" name="businessStreetName">
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Surburb  </label>
                                    <input class="c-input" type="text" name="businessSurburb">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress City</label>
                                    <input class="c-input" type="text" name="businessCity">

                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Postal Code</label>
                                    <input class="c-input" type="text" name="businessPostal">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Province </label>
                                    <input class="c-input" type="text" name="businessProvince">
                                </div>
                            </div>

                            <div class="row u-mb-medium">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">BusAddress Country</label>
                                        <select class="c-select" name="addressCountry">
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <h3>
                                Details of Authorised / controlling person opening the account
                            </h3>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account except email and password.</i></p>


                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">First Name </label>
                                        <input class="c-input" id="input1" type="text" placeholder="First Name" name="a_firstname">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Last Name </label>
                                        <input class="c-input" id="input1" type="text" placeholder="Last Name" name="a_lastname">
                                    </div>
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Preferred Name</label>
                                        <input class="c-input" id="input1" type="text" name="a_preferredName">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label"> Gender </label>
                                        <select class="c-select" name="a_gender" >
                                            <option value="">Please select....</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <br>
                                    <div class="c-field has-addon-right">
                                        <input class="c-input" data-toggle="datepicker" name="a_dob" id="input-calendar" type="text" placeholder="Date Of Birth">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label"> Marital Status</label>
                                        <select class="c-select" name="a_marital">
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
                                        <label class="c-field__label">Identification Type</label>
                                        <select class="c-select" name="a_idType">
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
                                        <label class="c-field__label" for="input1">Foreign Passport / ID Number </label>
                                        <input class="c-input" id="input1" type="text" name="a_passportNumber" placeholder="Passport Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Foreign Passport / ID Country of Issue</label>
                                        <select class="c-select" name="a_passportC">
                                            @foreach(App\Country::all() as $country)
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
                                        <input class="c-input" data-toggle="datepicker" name="a_passportExpiry" id="input-calendar" type="text" placeholder="Guardian Passport Expiry Date">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
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

                            <div class="row u-mb-small">
                                <div class="col-md-6 col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country of Residence </label>
                                        <select class="c-select" name="a_countryR" >
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Citizenship </label>
                                        <select class="c-select" name="a_countryN">
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
                                        <label class="c-field__label">Dialing Code </label>
                                        <input class="c-input" type="text" name="a_dailingCode" placeholder="Intl. dial code preceded by + (eg. +27)">

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Mobile Number </label>
                                        <input class="c-input" type="text" name="a_mobileNumber" placeholder="10 digits (eg. 0791234567)">

                                    </div>
                                </div>
                            </div>


                            <h3 >
                                Address of Authorised / controlling person
                            </h3>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>


                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Unit Number</label>
                                    <input class="c-input" type="text" name="a_UnitNumber">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Complex Name</label>
                                    <input class="c-input" type="text" name="a_ComplexName">
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Street Number </label>
                                    <input class="c-input" type="text" name="a_StreetNumber">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Street Name</label>
                                    <input class="c-input" type="text" name="a_StreetName">
                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Address Surburb </label>
                                    <input class="c-input" type="text" name="a_Surburb">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">City </label>
                                    <input class="c-input" type="text" name="a_City" >

                                </div>
                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">Postal Code </label>
                                    <input class="c-input" type="text" name="a_Postal">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="c-field__label">BusAddress Province </label>
                                    <input class="c-input" type="text" name="a_Province" >
                                </div>
                            </div>

                            <div class="row u-mb-medium">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Country </label>
                                        <select class="c-select" name="a_Country" >
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <h3 class="u-mt-medium">
                                Entity Bank Details
                            </h3>
                            <p class="u-mb-medium"><i>PLEASE NOTE: Information in this section are optional and can be provided after registering your account.</i></p>



                            <p class="u-mb-small">
                                PLEASE NOTE:
                            </p>

                            <p class="u-mb-small">
                                For withdrawals, the name of the bank account (account holder) must match the name of the legal entity.
                            </p>
                            <p class="u-mb-small">
                                We are unable to make payments into third party accounts.
                            </p>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Bank Name </label>
                                        <input class="c-input" type="text" name="bankName">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Account Holder </label>
                                        <input class="c-input" type="text" name="bankAccountHolder">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Account Type </label>
                                        <input class="c-input" type="text" name="bankType" >
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Bank Branch Code  </label>
                                        <input class="c-input" type="text" name="bankBranchCode" >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                  <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Bank Branch Name</label>
                                        <input class="c-input" type="text" name="bankBranch">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Bank Country </label>
                                        <select class="c-select" name="bankCountry" >
                                            @foreach(App\Country::all() as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                      <div class="c-field u-mb-small">
                                        <label class="c-field__label">Entity Bank Account Number </label>
                                        <input class="c-input" type="text" name="bankAccountNumber" >
                                    </div>
                                </div>

                            </div>

                            <div class="row u-mb-small">
                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Entity Bank IBAN number</label>
                                        <input class="c-input" id="input1" name="iban" type="text" placeholder="IBAN Number">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Entity Bank SWIFT number</label>
                                        <input class="c-input" id="input1" name="swift" type="text" placeholder="Swift Number">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h3 class="u-mb-medium">Declarations</h3>
                                    <p class="u-mb-medium">PLEASE NOTE: If you do not check all four boxes below, we cannot open an account for you.</p>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Auth. User Declaration 1*</p>
                                        <input class="c-choice__input" id="checkbox1" name="checkboxes" type="checkbox" required>
                                        <label class="c-choice__label" for="checkbox1">That all details given in this form are correct I am over 18 years of age and that I will inform {{env('APP_NAME')}} immediately in writing of any changes to the details contained herein.</label>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Auth. User Declaration 2*</p>
                                        <input class="c-choice__input" id="checkbox2" name="checkboxes" type="checkbox" required>
                                        <label class="c-choice__label" for="checkbox2">I have read and understood and agree to be bound to all Terms and Conditions as set out on the {{env('APP_NAME')}} website and all related platforms, products and services.</label>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Auth. User Declaration 3*</p>
                                        <input class="c-choice__input" id="checkbox3" name="checkboxes" type="checkbox" required>
                                        <label class="c-choice__label" for="checkbox3">I confirm that I will invest in the case of individuals only, in my own name and will not use my Account to invest on behalf of any other person and in the case of Corporate Bodies only, Authorised Users will invest on the account.</label>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="c-choice c-choice--checkbox">
                                        <p class="u-mb-small">Auth. User Declaration 4*</p>
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
