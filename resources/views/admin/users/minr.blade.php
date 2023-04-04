@php
    use App\Http\Controllers\Globals as Utils;

    $country = App\Country::whereName($user->country_residence)->first();
    $phoneCode = $country ? $country->phonecode : " ";
@endphp

<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
    <div class="user-profile layout-spacing">
        <div class="widget-content widget-content-area">
            <div class="text-center user-info">
                @if($user->id_card == null)
                    <img src="{{ Gravatar::get($user->email) }}" alt="avatar">
                @else
                    <img src="{{ asset($user->id_card) }}" width="160" height="160" alt="avatar">
                @endif
                <p class="">{{ ucwords($user->minor->firstname." ".$user->minor->lastname) }}</p>
            </div>
            <div class="user-info-list">
                <div class="">
                    <ul class="contacts-block list-unstyled">
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            {{ date('Y-F-d', strtotime($user->created_at)) }}
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            {{ ucwords($user->minor->cityB) }}, {{ ucwords($user->minor->countryR) }}
                        </li>
                        <li class="contacts-block__item">
                            <a href="mailto:{{ $user->email }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                {{ $user->email }}
                            </a>
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            {{ $user->minor->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="user-profile layout-spacing">
        <div class="widget-content widget-content-area">
            <h4 class="text-center">KYC/ Identity</h4>
            <br>
            <h4 class="text-center">Id Card</h4>
            <div class="text-center user-info">
                @if($user->id_card != null)
                    <img src="{{ asset($user->id_card) }}" width="160" height="160" alt="avatar">
                @else
                    <p>Not Provided Yet</p>
                @endif
            </div>
            <br>
            <hr>
            <br>
            <h4 class="text-center">Proof of Residence</h4>

            <div class="text-center user-info">
                @if($user->residence_image != null)
                    <img src="{{ asset($user->residence_image) }}" width="160" height="160" alt="avatar">
                @else
                    <p>Not Provided Yet</p>
                @endif
            </div>
            <br>
            <hr>
            <br>
            <h4 class="text-center">User Funds</h4>

            <div class="mt-4">
                @if(sizeof($investments) > 0)
                    <table>
                        @foreach($investments as $investment)
                            <tr>
                                <td><b>{{ $investment->plan.': ' }} </b></td>
                                <td>&nbsp;&nbsp;&nbsp; {{ '$'.number_format($investment->amount, 2) }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    <p><b>Total: </b> {{ '$'.number_format(Utils::getInvestmentSum2($user->email), 2) }}</p>
                @else
                    <div class="text-center user-info">
                        <p>Account Not Funded Yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
    <div class="account-settings-container layout-top-spacing">
        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="general-info" class="section general-info px-5" action="{{ route('updatePersonal') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Personal Details</h6>

                                <div class="form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="firstname" value="{{ $user->minor->firstname }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="lastname" value="{{ $user->minor->lastname }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->minor->username }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date of Birth <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="dob" value="{{ $user->minor->dob }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Identification Type <span class="text-danger">*</span></label>
                                                <select class="form-control" name="id_type" disabled="">
                                                    <option value="id no" {{ ($user->id_type == 'id_no')? 'selected': '' }}>ID No.</option>
                                                    <option value="passport no" {{ ($user->id_type == 'passport no')? 'selected': '' }}>Passport No.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Identification Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="id_number" value="{{ $user->id_number }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="email" value="{{ $user->minor->email }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gender <span class="text-danger">*</span></label>
                                                <div class="radio radio-primary radio-inline"><input class="mr-2" name="gender" type="radio" value="male" {{ ($user->minor->gender == 'male')? 'checked': '' }} disabled=""><label>Male</label></div>
                                                <div class="radio radio-primary radio-inline"><input class="mr-2" name="gender" type="radio" value="female" {{ ($user->minor->gender == 'female')? 'checked': '' }} disabled=""><label>Female</label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="phone" value="+ {{$phoneCode}} {{$user->minor->phone }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Country of Residence <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="country_residence" value="{{ $user->minor->countryR}}" readonly="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Country of Birth <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="country_birth" value="{{ $user->minor->countryB }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>City of birth <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="city" value="{{ $user->minor->cityB }}" readonly="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Citizenship <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="nationality" value="{{ $user->minor->countryN}}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="about" class="section about px-5"  action="{{ route('updateAddress') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Address Information</h6>

                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Unit number</label>
                                                                <input type="text" class="form-control mb-4" name="unit_number" value="{{ $user->minor->addressUnitNumber }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Complex Name</label>
                                                                <input type="text" class="form-control mb-4" name="complex_name" value="{{ $user->minor->addressComplexNumber }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Street Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_number" value="{{ $user->minor->addressStreetNumber }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Street Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_name" value="{{ $user->minor->addressStreetName }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Suburb <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="suburb" value="{{ $user->minor->addressSurburb }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>City <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="city" value="{{ $user->minor->addressCity }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Country <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="country" value="{{ $user->minor->countryR }}" readonly="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="contact" class="section contact px-5" action="{{ route('updateBank') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Bank Details</h6>

                                <div class="form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Bank Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="bank_name" value="{{ $user->minor->bankName }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Account Type <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="account_type" value="{{ $user->minor->bankAccountType }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Branch Name </label>
                                                <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->minor->bankBranchName }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Branch Code </label>
                                                <input type="text" class="form-control mb-4" name="branch_code" value="{{ $user->minor->bankBranchCode }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Account Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="account_number" value="{{ $user->minor->bankAccountNumber }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Account Holder <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="account_holder" value="{{ $user->minor->bankAccountHolder }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Bank Country <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="bank_country" value="{{ $user->minor->bankCountry }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-12 text-center">
                                            <p>Other Details</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Bitcoin Address <span class="text-danger">*</span></label>
                                                <input class="form-control mb-4" type="text" name="bitcoin_address" value="{{ $user->bitcoin_address }}" readonly="">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="contact" class="section contact px-5" action="{{ route('updateBank') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Authorized Personnel Details</h6>

                                <div class="form">
                                    <div class="row">
                                        <div class="col-12">
                                                <label class="">Relationship To Minor</label>
                                                <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->minor->guardian->relationship }}" readonly="">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label class="">First Name</label>
                                            <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->minor->guardian->firstname }}" readonly="">
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="">Last Name</label>
                                            <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->minor->guardian->lastname }}" readonly="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Guardian Country of Birth <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->minor->guardian->countryBirth }}" readonly="">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Guardian Country of Residence <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->minor->guardian->countryResidence }}" readonly="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                                <div class="form-group">
                                                    <label>Guardian Citizenship <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control mb-4" name="username" value="{{ $user->minor->guardian->countryCitizen }}" readonly="">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="custom-select" name="vat" disabled>
                                                    <option value="">Please select....</option>
                                                    <option value="male" {{$user->minor->guardian->gender == 'male' ? 'selected' : ''}}>Male</option>
                                                    <option value="female" {{$user->minor->guardian->gender == 'female' ? 'selected' : ''}}>Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Authorized Person Date of Birth</label>
                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->minor->guardian->dob }}" readonly="">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <select class="custom-select" name="vat" disabled>
                                                    <option value="married" {{$user->minor->guardian->maritalStatus == 'married' ? 'selected' : ''}}>Married</option>
                                                    <option value="single" {{$user->minor->guardian->maritalStatus == 'single' ? 'selected' : ''}}>Single</option>
                                                    <option value="divorced" {{$user->minor->guardian->maritalStatus == 'divorced' ? 'selected' : ''}}>Divorced</option>
                                                    <option value="widowed" {{$user->minor->guardian->maritalStatus == 'widowed' ? 'selected' : ''}}>Widowed</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Identification Type</label>
                                                <select class="custom-select" name="vat" disabled>
                                                    <option value="">Please select....</option>
                                                    <option value="sai" {{$user->minor->guardian->idType == 'sai' ? 'selected' : ''}}>South African Id</option>
                                                    <option value="bc" {{$user->minor->guardian->idType == 'bc' ? 'selected' : ''}}>Birth Certificate</option>
                                                    <option value="fp" {{$user->minor->guardian->idType == 'fp' ? 'selected' : ''}}>Foreign Passport</option>
                                                    <option value="fi" {{$user->minor->guardian->idType == 'fi' ? 'selected' : ''}}>Foreign ID</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Foreign Passport / ID Number</label>
                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->minor->guardian->passportNumber }}" readonly="">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Foreign Passport / ID Country of Issue</label>
                                                <input type="text" class="form-control mb-4" name="country" value="{{ $user->minor->guardian->passportCountry }}" readonly="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Authorized Person Passport Expiry Date</label>
                                            <input type="text" class="form-control mb-4" name="country" value="{{ $user->minor->guardian->passportExpiry }}" readonly="">

                                        </div>

                                        <div class="col-sm-6">
                                            <label>Dialing Code</label>
                                            <input type="text" class="form-control mb-4" name="country" value="{{ $user->minor->guardian->dialingCode }}" readonly="">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <label>Mobile Phone</label>
                                            <input type="text" class="form-control mb-4" name="country" value="{{ $user->minor->guardian->phone }}" readonly="">
                                        </div>
                                    </div>

                                    <h6 class="">Occupation of Authorised Person</h6>

                                    <div class="form">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Guardian Employment Status</label>
                                                    <select class="custom-select" name="vat" disabled>
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

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Guardian Income Band</label>
                                                    <select class="custom-select" name="vat" disabled>
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
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Guardian Source of Income</label>
                                                    <select class="custom-select" name="vat" disabled>
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
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Account Source of Funds</label>
                                                    <select class="custom-select" name="vat" disabled>
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

                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                @if(isset($card) && $card->id != null)
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="contact" class="section contact" action="{{ route('updateBank') }}" method="post">
                                @csrf
                                <div class="info">
                                    <h6 class="">Card Details</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Card Pan <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" value="{{ $card->pan }}" readonly="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Valid Through <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="account_type" value="{{ $card->expiry }}" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
